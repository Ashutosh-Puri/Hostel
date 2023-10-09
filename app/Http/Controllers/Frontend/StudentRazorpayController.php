<?php

namespace App\Http\Controllers\Frontend;

use Razorpay\Api\Api;
use App\Models\Student;
use App\Models\StudentFine;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\StudentPayment;
use App\Http\Controllers\Controller;
use App\Notifications\PaymentFailNotification;
use App\Notifications\PaymentRefundNotification;
use App\Notifications\PaymentSuccessNotification;
use Razorpay\Api\Errors\SignatureVerificationError;

class StudentRazorpayController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
    }


    public function pay_fee($fee_id)
    {   

        session(['current_id' => $fee_id]);
        $student_payment= StudentPayment::find($fee_id);
        if($student_payment)
        {
            $orderData = [
                'amount' => ( $student_payment->total_amount * 100 ),
                'currency' => env('RAZORPAY_CURRENCY'),
                'receipt' => 'student_payment_'.$student_payment->id.'_'.$student_payment->academic_year_id.'_'.$student_payment->student_id.'_'.time(),
            ];

            try{

                $order = $this->api->order->create($orderData);
                if($order)
                {
                    $transaction= new Transaction;
                    if( $transaction)
                    {
    
                        $transaction->student_id =$student_payment->student_id;
                        $transaction->student_payment_id =$student_payment->id;
                        $transaction->order_id=$order->id;
                        $transaction->amount= $student_payment->total_amount;
                        $transaction->status=0;
                        $transaction->save();
                    }
    
                    $jsondata = [
                        "key" =>env('RAZORPAY_KEY_ID'), 
                        "amount"=> $student_payment->total_amount * 100, 
                        "currency"=> "INR",
                        "name"=>preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel')), 
                        "description"=> "Student Paymnet",
                        "order_id"=> $order->id,
                        "prefill"=> [
                            "name"=> $student_payment->student->name,
                            "email"=>  $student_payment->student->email,
                            "contact"=> $student_payment->student->mobile
                        ],
                        "notes"=> [
                            "address"=>  $student_payment->student->parent_address
                        ],
                        "theme"=> [
                            "color"=> "#32CD32" //lime
                        ]
                    ];
        
                    return view('livewire.frontend.razorpay.confirm_paymet',compact('order','jsondata'));
                }

            } catch (\Razorpay\Api\Errors\Error $e) {
                
                return redirect()->route('student.student_fee')->with('alert', ['type' => 'error', 'message' => 'Order Not Created.']);
            }
        }
    }

    public function fee_payment_verify(Request $request)
    { 
        try {
            
            $transaction = Transaction::where('order_id', $request->razorpay_order_id)->first();
            if( $transaction)
            {
                $transaction->status=1;
                $transaction->update();
            }
            
            $attributes= [
                'razorpay_order_id' =>  $request->razorpay_order_id, 
                'razorpay_payment_id' =>  $request->razorpay_payment_id,
                'razorpay_signature' =>  $request->razorpay_signature,
            ];
    
            $this->api->utility->verifyPaymentSignature($attributes);

            $transaction = Transaction::where('order_id', $request->razorpay_order_id)->first();
            if( $transaction)
            {
                $transaction->razorpay_payment_id= $request->razorpay_payment_id;
                $transaction->razorpay_signature= $request->razorpay_signature;
                $transaction->status=2;
                $transaction->update();

                $student_payment= StudentPayment::find(session('current_id'));
                if($student_payment)
                {   
                    $temp =$student_payment->total_amount;
                    $student_payment->total_amount=0;
                    $student_payment->deposite+=$temp;
                    $student_payment->status=1;
                    $student_payment->update();
                    session()->forget('current_id');
                    $student =Student::find($student_payment->student_id);
                    $student->notify(new PaymentSuccessNotification($this->api->payment->fetch($request->razorpay_payment_id)));

                    return redirect()->route('student.student_fee')->with('alert', ['type' => 'success', 'message' => 'Payment Success & Verification Success.']);
                }
            }
 
        } catch (SignatureVerificationError $e) { 
            session()->flash('message' , 'Verification Failed');
            return redirect()->route('student.student_fee');
        }
        
        
    }
    
    public function fee_payment_fail(Request $request)
    {   
      $transaction=Transaction::where('order_id',$request->error_razorpay_order_id)->first();
      if( $transaction)
      {
        $temp=$transaction->student_id;
        $transaction->razorpay_payment_id=$request->error_razorpay_payment_id;
        $transaction->status=4;
        $transaction->update();
        $student =Student::find($temp);
        $student->notify(new PaymentFailNotification($this->api->payment->fetch($request->error_razorpay_payment_id)));

        return redirect()->route('student.student_fee')->with('alert', ['type' => 'error', 'message' => 'Payment Failed.']);
      }
    }

    public function refund_fee($fee_id)
    {  
        session(['current_id' => $fee_id]);
        $transaction=Transaction::where('student_payment_id',$fee_id)->first();
        if( $transaction)
        {
            try { 

                $refund = $this->api->payment->fetch($transaction->razorpay_payment_id)->refund([
                    'amount' => $transaction->amount*100,
                    'speed' => 'optimum',
                    "receipt"=>"Student_Paymet_Receipt_".$transaction->student_payment_id
                ]);

                $transaction->razorpay_refund_id= $refund->id;
                $transaction->status=3;
                $transaction->update();
    
                $student_payment= StudentPayment::find(session('current_id'));
                if($student_payment)
                {
                    $student_payment->total_amount=$transaction->amount;
                    $student_payment->status=3;
                    $student_payment->update();
                    session()->forget('current_id');

                    $student =Student::find($student_payment->student_id);
                    $student->notify(new PaymentRefundNotification($this->api->payment->fetch($transaction->razorpay_payment_id)->fetchRefund($refund->id)));
                }

                return redirect()->route('all_student_payment')->with('alert', ['type' => 'success', 'message' => 'Payment refund was successful. Refund ID: '.$refund->id]);
           
            } catch (\Razorpay\Api\Error\BadRequest $e) {

                return redirect()->route('all_student_payment')->with('alert', ['type' => 'info','message' => 'This payment has already been fully refunded.',]);
        
            } catch (Exception $e) {

                return redirect()->route('all_student_payment')->with('alert', ['type' => 'error', 'message' => 'An error occurred while processing the refund. Please try again later.']);
            }
        }
    }

    public function pay_fine($fee_id)
    {   
        session(['current_id' => $fee_id]);
        $student_fine= StudentFine::find($fee_id);
        if($student_fine)
        {
            $orderData = [
                'amount' => ( $student_fine->amount * 100 ),
                'currency' => env('RAZORPAY_CURRENCY'),
                'receipt' => 'student_fine_'.$student_fine->id.'_'.$student_fine->academic_year_id.'_'.$student_fine->student_id.'_'.time(),
            ];

            try{

                $order = $this->api->order->create($orderData);
                if($order)
                {
                    $transaction= new Transaction;
                    if( $transaction)
                    {
    
                        $transaction->student_id =$student_fine->student_id;
                        $transaction->student_fine_id =$student_fine->id;
                        $transaction->order_id=$order->id;
                        $transaction->amount= $student_fine->amount;
                        $transaction->status=0;
                        $transaction->save();
                    }
    
                    $jsondata = [
                        "key" =>env('RAZORPAY_KEY_ID'), 
                        "amount"=> $student_fine->amount * 100, 
                        "currency"=> "INR",
                        "name"=>preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel')), 
                        "description"=> "Student Paymnet",
                        "order_id"=> $order->id,
                        "prefill"=> [
                            "name"=> $student_fine->student->name,
                            "email"=> $student_fine->student->email,
                            "contact"=>$student_fine->student->mobile
                        ],
                        "notes"=> [
                            "address"=> $student_fine->student->parent_address
                        ],
                        "theme"=> [
                            "color"=> "#32CD32" //lime
                        ]
                    ];
        
                    return view('livewire.frontend.razorpay.confirm_fine',compact('order','jsondata'));
                }

            } catch (\Razorpay\Api\Errors\Error $e) {
                
                return redirect()->route('student.student_fine')->with('alert', ['type' => 'error', 'message' => 'Order Not Created.']);
            }
        }
    }

    
    public function fine_payment_verify(Request $request)
    { 
        try {
            
            $transaction = Transaction::where('order_id', $request->razorpay_order_id)->first();
            if( $transaction)
            {
                $transaction->status=1;
                $transaction->update();
            }
            
            $attributes= [
                'razorpay_order_id' =>  $request->razorpay_order_id, 
                'razorpay_payment_id' =>  $request->razorpay_payment_id,
                'razorpay_signature' =>  $request->razorpay_signature,
            ];
    
            $this->api->utility->verifyPaymentSignature($attributes);
            $transaction = Transaction::where('order_id', $request->razorpay_order_id)->first();
            if( $transaction)
            {   
                $temp=$transaction->student_id;
                $transaction->razorpay_payment_id= $request->razorpay_payment_id;
                $transaction->razorpay_signature= $request->razorpay_signature;
                $transaction->status=2;
                $transaction->update();

                $student_fine= StudentFine::find(session('current_id'));
                if($student_fine)
                {   
                    $student_fine->status=1;
                    $student_fine->update();
                    session()->forget('current_id');
                    $student =Student::find($student_fine->student_id);
                    $student->notify(new PaymentSuccessNotification($this->api->payment->fetch($request->razorpay_payment_id)));
                    return redirect()->route('student.student_fine')->with('alert', ['type' => 'success', 'message' => 'Payment Success & Verification Success.']);
                }
            }
 
        } catch (SignatureVerificationError $e) { 
            session()->flash('message' , 'Verification Failed');
            return redirect()->route('student.student_fine');
        }
    }

    public function fine_payment_fail(Request $request)
    {   
      $transaction=Transaction::where('order_id',$request->error_razorpay_order_id)->first();
      if( $transaction)
      {
        $temp=$transaction->student_id;
        $transaction->razorpay_payment_id=$request->error_razorpay_payment_id;
        $transaction->status=4;
        $transaction->update();
        $student =Student::find($temp);
        $student->notify(new PaymentFailNotification($this->api->payment->fetch($request->error_razorpay_payment_id)));

        return redirect()->route('student.student_fine')->with('alert', ['type' => 'error', 'message' => 'Payment Failed.']);
      }
    }

     public function refund_fine($fee_id)
    {  
        session(['current_id' => $fee_id]);
        $transaction=Transaction::where('student_fine_id',$fee_id)->first();
        if( $transaction)
        {
            try { 

                $refund = $this->api->payment->fetch($transaction->razorpay_payment_id)->refund([
                    'amount' => $transaction->amount*100,
                    'speed' => 'optimum',
                    "receipt"=>"Student_fine_Receipt_".$transaction->student_fine_id
                ]);

                $transaction->razorpay_refund_id= $refund->id;
                $transaction->status=3;
                $transaction->update();
    
                $student_fine= StudentFine::find(session('current_id'));
                if($student_fine)
                {
                    $student_fine->amount=$transaction->amount;
                    $student_fine->status=3;
                    $student_fine->update();
                    session()->forget('current_id');
                    $student =Student::find($student_fine->student_id);
                    $student->notify(new PaymentRefundNotification($this->api->payment->fetch($transaction->razorpay_payment_id)->fetchRefund($refund->id)));
                }

                return redirect()->route('student.student_fine')->with('alert', ['type' => 'success', 'message' => 'Payment refund was successful. Refund ID: '.$refund->id]);
           
            } catch (\Razorpay\Api\Error\BadRequest $e) {

                return redirect()->route('student.student_fine')->with('alert', ['type' => 'info','message' => 'This payment has already been fully refunded.',]);
        
            } catch (Exception $e) {

                return redirect()->route('student.student_fine')->with('alert', ['type' => 'error', 'message' => 'An error occurred while processing the refund. Please try again later.']);
            }
        }
    }

}
