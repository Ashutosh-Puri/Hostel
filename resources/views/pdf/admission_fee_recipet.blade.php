<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">

    <title>Admission Fee Recipet</title>
    <style>
         td{
            text-align: center;
        }
        tr{
            margin-top: 10px;
        }

        section{
               /* border: 2px solid red; */
               width: 225mm;
               height: 950mm;
               
        }
        table {
            background-repeat: no-repeat;
            background-size: contain;
            background-position:center center;
            background-color: rgba(255, 255, 255,0.5);
            background-image: url({{ asset('assets/images/shikshan-logo.png') }});          
        }
        
    </style>
</head>
<body>
<div >


    <section>
        <div >
            <table width="100%" style="margin: 0; border-collapse: collapse;">
                <tr>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                    <td  width="1%"></td>
                </tr>
                <tr>
                    <td colspan="100" style="font-family: 'Raleway', sans-serif; text-align: center;">
                        <p>SHIKSHAN PRASARAK SANSTHA'S</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="100" style="font-size: 16px; font-family: 'Archivo Black', sans-serif;">
                        <p><strong>ARTS, D.J. MALPANI COMMERCE & B.N. SARDA SCIENCE COLLEGE (AUTONOMOUS)</strong></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="100">
                        <p style="font-family: 'Raleway', sans-serif;">A/p.GHULEWADI SANGAMNER</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="100">
                        <hr style="color:black;" style="margin:0px; padding:0px;">
                    </td>
                </tr>
                <tr>
                    <td colspan="15" style="text-align: left; ">
                        Member Id : 
                    </td>
                    <td colspan="15" style="text-align: left; ">
                        <strong>{{ $studentpayment->student->member_id }}</strong>
                    </td>
                    <td colspan="70" style="text-align: right; ">
                        Regular Admission Fee Reciept ( Confirmed Admission - {{ $studentpayment->academicYear->year }} - {{ $studentpayment->academicYear->year+1 }} )
                    </td>
                </tr>
                <tr>
                    <td colspan="20" style="text-align: right;  border: 1px solid #000;">
                        <p>Name :&nbsp;</p>
                        <p>Class :&nbsp;</p>
                        <p>PRN :&nbsp;</p>
                        <p>Date :&nbsp;</p>
                        <p>Reciept ID:&nbsp;</p>
                        
                    </td>
                    <td colspan="30" style="text-align: left;  border-top: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000;">
                        <p><strong>&nbsp;{{ $studentpayment->student->name }}</strong></p>
                        <p><strong>&nbsp;{{ $studentpayment->admission->class->name }}</strong></p>
                        <p><strong>&nbsp;@if (isset($studentpayment->student->prn)){{ $studentpayment->student->prn }} @else N.A. @endif </strong></p>
                        <p><strong>&nbsp;{{ now()->format('d / m / Y'); }}</strong></p>
                        <p><strong>&nbsp;{{ $studentpayment->id }}</strong></p>
                    </td>
                    <td colspan="20" style="text-align: right;  border: 1px solid #000;">
                        <p>User ID :&nbsp;</p>
                        <p>Adm. ID :&nbsp;</p>
                        <p>Method :&nbsp;</p>
                        <p>Payment ID :&nbsp;</p>
                    </td>
                    <td colspan="30" style="text-align: left;  border: 1px solid #000;">
                        <p><strong>&nbsp;{{ $studentpayment->student_id }}</strong></p>
                        <p><strong>&nbsp;{{ $studentpayment->admission_id  }}</strong></p>
                        <p><strong>&nbsp; 
                            @if (isset($transaction))
                                @if (null!==($transaction->status==2)) Online @endif
                            @else  
                             Cash 
                            @endif
                        </strong></p>
                        <p>
                            <strong>&nbsp; 
                                @if (isset($transaction))
                                    @if (null!==($transaction->status==2)) {{ $transaction->razorpay_payment_id }}  @endif
                                @else  N.A.
                                @endif
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="34" style="text-align: left; border: 1px solid #000;">
                        Total Fee : <strong>{{ $studentpayment->amount  }}/-</strong>
                    </td>
                    
                    <td colspan="33" style="text-align: left; border: 1px solid #000;">
                        Total Pending Fee :  <strong>{{ $studentpayment->amount- $studentpayment->deposite }}/-</strong>
                    </td>
                    <td colspan="33" style="text-align: left; border: 1px solid #000;">
                        Paid Fee :  <strong>
                       {{ $studentpayment->deposite  }}/-</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="15" style="text-align: left; border-top: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000;">
                        Fees In Words :
                    </td>
                    <td colspan="85" style="text-align: left; border-right: 1px solid #000;  border-bottom: 1px solid #000;">
                        <strong>{{ $n_to_w }}</strong>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</div>
</body>
</html>