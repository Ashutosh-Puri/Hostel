<?php

namespace App\Http\Controllers;


use Mpdf\Mpdf;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;




class temp extends Controller
{
   

    public function view_pdf()
    {   

       
  
          $data = [
        'admission_id'=>5555566,
        'title' => 'शिक्षण',
        'subtitle' => 'संगमनेर नगरपालिका कला, वाणिज्य, दा.ज.मालपाणी वाणिज्य आणि ब.ना. सारडा विज्ञान महाविद्यालय ( स्वायत्त ) संगमनेर',
        'heading' => 'विद्यार्थी वसतिगृह प्रवेश अर्ज ( २०२३-२४ )',
        ];


        $html = view('form_a', compact('data'));
        $pdf=new Mpdf;
    
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $pdf->Output();
       
       


       

    }



    public function download_pdf()
    {
       
       
        $data = [
            'admission_id' => 5555566,
            'title' => 'शिक्षण',
            'subtitle' => 'संगमनेर नगरपालिका कला, वाणिज्य, दा.ज.मालपाणी वाणिज्य आणि ब.ना. सारडा विज्ञान महाविद्यालय ( स्वायत्त ) संगमनेर',
            'heading' => 'विद्यार्थी वसतिगृह प्रवेश अर्ज ( २०२३-२४ )',
        ];
    
        $pdf = new Mpdf();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $html = view('form_a', compact('data'));
        $pdf->WriteHTML($html);
        $filename = 'Admission_Form_'.now().'.pdf';
        $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;
        exit();
       

    }



}
