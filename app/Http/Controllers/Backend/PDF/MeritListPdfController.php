<?php

namespace App\Http\Controllers\Backend\PDF;

use Mpdf\Mpdf;
use App\Models\MeritList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeritListPdfController extends Controller
{
    public function view_pdf($array)
    {   

        $meritlist=MeritList::WhereIn('id',json_decode($array))->get();
        $html = view('pdf.merit_list', compact('meritlist'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
    
    public function download_pdf($array)
    {
        $meritlist=MeritList::WhereIn('id',json_decode($array))->get();
        $html = view('pdf.merit_list', compact('meritlist'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $filename = 'Merit_List_'.now().'.pdf';
        $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;
        exit();
    }
}
