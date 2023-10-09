<?php

namespace App\Http\Controllers\Frontend;

use Mpdf\Mpdf;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\StudentPayment;
use App\Http\Controllers\Controller;

class StudentFeeRecipetPdfController extends Controller
{
    public function view_pdf($id)
    {   
        $studentpayment=StudentPayment::find($id);
        $transaction=Transaction::where('student_payment_id', $id)->first();
        $n_to_w =  $this->convertCurrencyToWords($studentpayment->deposite);
        $html = view('pdf.admission_fee_recipet', compact('studentpayment','transaction','n_to_w'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
    
    public function download_pdf($id)
    {
        $studentpayment=StudentPayment::find($id);
        $transaction=Transaction::where('student_payment_id', $id)->first();
        $n_to_w =  $this->convertCurrencyToWords($studentpayment->deposite);
        $html = view('pdf.admission_fee_recipet', compact('studentpayment','transaction','n_to_w'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $filename = 'Admission__Fee_Recipet_'.now().'.pdf';
        $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;
        exit();
    }

    public function convertCurrencyToWords($number) 
    {
        $words = array(
            '0' => '', '1' => 'One', '2' => 'Two',
            '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
            '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
            '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
            '13' => 'Thirteen', '14' => 'Fourteen',
            '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
            '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
            '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
            '60' => 'Sixty', '70' => 'Seventy',
            '80' => 'Eighty', '90' => 'Ninety'
        );
        $digits = array('', '', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        
        $number = explode(".", $number);
        $result = array("", "");
        $j = 0;

        foreach ($number as $val) {
            for ($i = 0; $i < strlen($val); $i++) {
                $numberpart = str_pad($val[$i], strlen($val) - $i, "0", STR_PAD_RIGHT);
                if ($numberpart <= 20) {
                    $numberpart = 1 * substr($val, $i, 2);
                    $i++;
                    $result[$j] .= $words[$numberpart] ." ";
                } else {
                    if ($numberpart > 90) {
                        $result[$j] .= $words[$val[$i]] . " " . $digits[strlen($numberpart) - 1] . " "; 
                    } else if ($numberpart != 0) {
                        $result[$j] .= $words[str_pad($val[$i], strlen($val) - $i, "0", STR_PAD_RIGHT)] ." ";
                    }
                }
            }
            $j++;
        }
        
        $converted = "";
        if (trim($result[0]) != "") {
            $converted .= $result[0] . "Rupees ";
        }
        
        if ($result[1] != "" && $number[1] > 0) {
            $converted .= $result[1] . "Paise";
        }
        
        return trim($converted) . " Only";
    }
}
