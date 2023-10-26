<?php

namespace App\Http\Controllers\Backend\PDF;

use Mpdf\Mpdf;
use App\Models\Fee;
use App\Models\Rule;
use App\Models\Admission;
use App\Models\Allocation;
use Illuminate\Http\Request;
use App\Models\StudentEducation;
use App\Http\Controllers\Controller;

class AdmissionFormPdfController extends Controller
{   
    public function view_pdf($id)
    {   

        $admission=Admission::find($id);
        $fee=Fee::where('academic_year_id', $admission->academic_year_id)->orderBy('seated_id','ASC')->get();
        $education=StudentEducation::where('admission_id', $admission->id)->first();
        $rules=Rule::where('status',0)->get();
        $section1Html = view('pdf.admission_form_p1', compact('admission','fee','education'));
        $section2Html = view('pdf.admission_form_p2', compact('admission','rules'));
        $section3Html = view('pdf.admission_form_p3', compact('admission'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        if($admission->status==1)
        {
            $pdf->WriteHTML($section1Html);
            $pdf->AddPage();
            $pdf->WriteHTML($section2Html);
            $pdf->AddPage();
            $pdf->WriteHTML($section3Html);
            $pdf->Output();
        }else
        {
            $pdf->WriteHTML($section1Html);
            $pdf->SetWatermarkImage(asset('assets/images/watermark.jpg'));
            $pdf->showWatermarkImage = true;
            $pdf->AddPage();
            $pdf->WriteHTML($section2Html);
            $pdf->SetWatermarkImage(asset('assets/images/watermark.jpg'));
            $pdf->showWatermarkImage = true;
            $pdf->AddPage();
            $pdf->WriteHTML($section3Html);
            $pdf->SetWatermarkImage(asset('assets/images/watermark.jpg'));
            $pdf->showWatermarkImage = true;
            $pdf->Output();
        }
    }
   
    public function download_pdf($id)
    {
        $admission=Admission::find($id);
        $fee=Fee::where('academic_year_id', $admission->academic_year_id)->orderBy('seated_id','ASC')->get();
        $education=StudentEducation::where('admission_id', $admission->id)->first();
        $rules=Rule::where('status',0)->get();
        $section1Html = view('pdf.admission_form_p1', compact('admission','fee','education'));
        $section2Html = view('pdf.admission_form_p2', compact('admission','rules'));
        $section3Html = view('pdf.admission_form_p3', compact('admission'));
        $pdf=new Mpdf;
        $pdf->autoScriptToLang=true;
        $pdf->autoLangToFont=true;
        if($admission->status==1)
        {
            $pdf->WriteHTML($section1Html);
            $pdf->AddPage();
            $pdf->WriteHTML($section2Html);
            $pdf->AddPage();
            $pdf->WriteHTML($section3Html);
            $filename = 'Admission_Form_'.now().'.pdf';
            $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . strlen($pdfContent));
            echo $pdfContent;
    
            exit();
        }else
        {
            $pdf->WriteHTML($section1Html);
            $pdf->SetWatermarkImage(asset('assets/images/watermark.jpg'));
            $pdf->showWatermarkImage = true;
            $pdf->AddPage();
            $pdf->WriteHTML($section2Html);
            $pdf->SetWatermarkImage(asset('assets/images/watermark.jpg'));
            $pdf->showWatermarkImage = true;
            $pdf->AddPage();
            $pdf->WriteHTML($section3Html);
            $pdf->SetWatermarkImage(asset('assets/images/watermark.jpg'));
            $pdf->showWatermarkImage = true;
            $filename = 'Admission_Form_'.now().'.pdf';
            $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . strlen($pdfContent));
            echo $pdfContent;
    
            exit();
        }
    }


    // one page code
    // public function view_pdf($id)
    // {   

    //     $admission=Admission::find($id);
    //     $allocation=Allocation::where('admission_id', $admission->id)->first();
    //     $education=StudentEducation::where('admission_id', $admission->id)->first();
    //     $rules=Rule::where('status',0)->get();
    //     $html = view('pdf.admission_form', compact('admission','allocation','education','rules'));
    //     $pdf=new Mpdf;
    //     $pdf->autoScriptToLang=true;
    //     $pdf->autoLangToFont=true;
    //     $pdf->WriteHTML($html);
    //     $pdf->Output();
    // }


    // 1 PAGE CODE
    // public function download_pdf($id)
    // {
    //     $admission=Admission::find($id);
    //     $allocation=Allocation::where('admission_id', $admission->id)->first();
    //     $education=StudentEducation::where('admission_id', $admission->id)->first();
    //     $rules=Rule::where('status',0)->get();
    //     $html = view('pdf.admission_form', compact('admission','allocation','education','rules'));
    //     $pdf=new Mpdf;
    //     $pdf->autoScriptToLang=true;
    //     $pdf->autoLangToFont=true;
    //     $pdf->WriteHTML($html);
    //     $filename = 'Admission_Form_'.now().'.pdf';
    //     $pdfContent = $pdf->Output('', \Mpdf\Output\Destination::STRING_RETURN);
    //     header('Content-Type: application/pdf');
    //     header('Content-Disposition: attachment; filename="' . $filename . '"');
    //     header('Content-Length: ' . strlen($pdfContent));
    //     echo $pdfContent;
    //     exit();
    // }
}
