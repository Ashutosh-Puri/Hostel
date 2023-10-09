<?php

namespace App\Http\Controllers\Frontend;

use Mpdf\Mpdf;
use App\Models\NightOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentNightOutFormPdfController extends Controller
{
    public function view_pdf($id)
    {   
        $nightout=NightOut::find($id);
        $html = view('pdf.nightout_form', compact('nightout'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
    
    public function download_pdf($id)
    {
        $nightout=NightOut::find($id);
        $html = view('pdf.nightout_form', compact('nightout'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $filename = 'Night_Out_Form_'.now().'.pdf';
        $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;
        exit();
    }
}
