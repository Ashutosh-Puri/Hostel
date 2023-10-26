<?php

namespace App\Http\Controllers\Backend\PDF;

use Mpdf\Mpdf;
use App\Models\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentReportPdfController extends Controller
{
    public function view_pdf($array)
    {   

        $admission=Admission::WhereIn('id',json_decode($array))->get();
        $html = view('pdf.student_report', compact('admission'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
    
    public function download_pdf($array)
    {
        $admission=Admission::WhereIn('id',json_decode($array))->get();
        $html = view('pdf.student_report', compact('admission'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $filename = 'Student_Report_'.now().'.pdf';
        $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;
        exit();
    }
}
