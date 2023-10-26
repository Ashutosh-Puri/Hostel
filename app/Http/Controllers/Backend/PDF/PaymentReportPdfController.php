<?php

namespace App\Http\Controllers\Backend\PDF;

use Mpdf\Mpdf;
use Illuminate\Http\Request;
use App\Models\StudentPayment;
use App\Http\Controllers\Controller;

class PaymentReportPdfController extends Controller
{
    public function view_pdf($array)
    {   

        $payment=StudentPayment::WhereIn('id',json_decode($array))->get();
        $html = view('pdf.payment_report', compact('payment'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
    
    public function download_pdf($array)
    {
        $payment=StudentPayment::WhereIn('id',json_decode($array))->get();
        $html = view('pdf.payment_report', compact('payment'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $filename = 'Payment_Report_'.now().'.pdf';
        $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;
        exit();
    }
}
