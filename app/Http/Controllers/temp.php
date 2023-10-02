<?php

namespace App\Http\Controllers;


use Mpdf\Mpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;



class temp extends Controller
{


    public function pdf()
    {
        //   $data = [
        // 'admission_id'=>5555566,
        // 'title' => 'शिक्षण',
        // 'subtitle' => 'संगमनेर नगरपालिका कला, वाणिज्य, दा.ज.मालपाणी वाणिज्य आणि ब.ना. सारडा विज्ञान महाविद्यालय ( स्वायत्त ) संगमनेर',
        // 'heading' => 'विद्यार्थी वसतिगृह प्रवेश अर्ज ( २०२३-२४ )',
        // ];


        // $html = view('nightout_form', compact('data'));
        // $html = view('nightout_form');
        $html = view('fee_reciept');
        $pdf=new Mpdf;

        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        $pdf->WriteHTML($html);
        $pdf->Output();





    }



    // public function pdf()
    // {

    //     try {
    //         // Render the Blade view
    //         $html = view('form_a')->render();

    //         // Create an instance of the PDF class
    //         $pdf = app('dompdf.wrapper');

    //         // Load the HTML content
    //         $pdf->loadHTML($html);
    //         // $pdf->setPaper('A4', 'portrait');
    //         return $pdf->stream('form.pdf');
    //         // Download the PDF with a specific file name
    //         // return $pdf->download('form.pdf');//////////////////////////
    //     } catch (\Exception $e) {
    //         dd($e);
    //     }



    // }



}
