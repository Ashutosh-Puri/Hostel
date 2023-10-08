<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
   
    <title>Admission Form</title>
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
    </style>
</head>
<body>
<div >
    <section style="break-after:page;">
        <div >
            <table   width="100%" style="margin: 0; border-collapse: collapse;">
                <tr>
                    <td width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                    <td  width="10%"></td>
                </tr>
                <tr>
                    <td colspan="3" style="vertical-align: top; ">
                    </td>
                    <td colspan="4" style="text-align: center; vertical-align: top; ">
                        <img src="./assets/images/shikshan-logo.png" alt="form-logo" class="custom-image" style="display: block; margin: 0 auto; height: 80px; width: 120px;">
                    </td>
                    <td colspan="3" style="text-align: right ;">
                        No: {{ $admission->id }}
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="justify-content: center;"> 
                        <h6 style="margin-top: 0px; text-align: center; margin-bottom:3px;">शिक्षण प्रसारक संस्था, संगमनेर</h6>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <h5 style="margin-top: 0px; text-align: center; margin-bottom:3px;">संगमनेर नगरपालिका कला, वाणिज्य, दा.ज.मालपाणी वाणिज्य आणि ब.ना. सारडा विज्ञान महाविद्यालय ( स्वायत्त ) संगमनेर</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <h3 style="margin-top: 8px; text-align: center; margin-bottom:3px;">विद्यार्थी वसतिगृह प्रवेश अर्ज ( {{ $admission->AcademicYear->year }} - {{ $admission->AcademicYear->year+1 }} )</h3> 
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <hr style="color:black; margin-top: 0px; margin-left: 10px; margin-right: 10px;">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label >Member ID : <strong> {{ $admission->Student->member_id }} </strong></label>
                    </td>
                    <td colspan="4">
                        <label >Class : <strong> {{ $admission->Class->name }} </strong></label>
                    </td>
                    <td colspan="3">
                        <label >Room No : <strong> 
                       N.A.
                    </strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <hr style="color:black; margin-top: 0px; margin-left: 10px; margin-right: 10px;">
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="8" style="text-align: left;">
                        <label >विद्यार्थ्यांचे नांव : </label><label ><strong> {{ $admission->Student->name }} </strong></label>
                    </td>
                    <td rowspan="6" colspan=2 style="text-align: left;">
                        <div style="text-align: center;">
                            <img src="{{ asset($admission->Student->photo) }}" alt="Student Image"
                                style="width: 135px; height: 150px;" class="mx-auto d-block img-fluid">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <label >वर्ग : </label><label ><strong> {{ $admission->Class->name }} </strong></label>
                    </td>
                    <td colspan="3" style="text-align: left;">
                        <label >जन्मतारीख :</label>   <label ><strong> {{ $admission->Student->dob }} </strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <label >जात :</label>   <label ><strong> {{ $admission->Student->cast->name }} </strong></label>
                    </td>
                    <td colspan="3" style="text-align: left;">
                        <label >प्रवर्ग :</label>   <label ><strong> {{ $admission->Student->cast->category->name }} </strong></label>
                    </td>
                   
                </tr>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <label >मागील वार्षिक परीक्षेत मिळालेले शेकडा गुण :</label>   
                        <label >
                            <strong> 
                                @if (isset($education->percentage))
                                     {{ $education->percentage }} %
                                @else
                                    0.00 %
                                @endif 
                            </strong>
                        </label>
                    </td>
                    <td colspan="3" style="text-align: left;">
                        <label >रक्तगट :</label>   <label ><strong> {{ $admission->Student->blood_group }} </strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" style="text-align: left;">
                        <label >यापूर्वी आपण रॅगिंगमध्ये गुंतला होता काय? :</label>   <label ><strong> {{ $admission->Student->is_ragging=='0'?"No":"Yes";}} </strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" style="text-align: left;">
                        <label >आजार / ऍलर्जी  असल्यास उल्लेख करावा :</label>   <label ><strong> {{ $admission->Student->is_allergy==0?"No":$admission->Student->is_allergy;}} </strong></label>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="10">
                        <br>
                        <table style="width:100%; border-collapse: collapse;">
                            <tr>
                                <td style="border: 1px solid #000000; color:black; text-align: center; padding: 5px;">वडिलांचे / पालकांचे नांव व संपर्क पत्ता</td>
                                <td style="border: 1px solid #000000; color:black; text-align: center; padding: 5px;">संगमनेरमधील पालकांचे नांव व संपर्क पत्ता</td>
                            </tr>
                            <tr >
                                <td style="text-align: left; border: 1px solid #000000; color:black; padding: 5px;"><strong>श्री / श्रीमती <span style="font-weight: bold;"> {{ $admission->Student->parent_name}} </span></strong></td>
                                <td style="text-align: left; border: 1px solid #000000; color:black; padding: 5px;"><strong>श्री / श्रीमती <span style="font-weight: bold;"> {{ $admission->Student->local_parent_name}} </span></strong></td>
                            </tr>
                            <tr  >
                                <td style=" text-align: left; border: 1px solid #000000; color:black; padding: 5px;"><strong> {{ $admission->Student->parent_address }} </strong></td>
                                <td style="text-align: left; border: 1px solid #000000; color:black; padding: 5px;"><strong> {{ $admission->Student->local_parent_address}} </strong></td>
                            </tr>
                            <tr  >
                                <td style="text-align: left; border: 1px solid #000000; color:black; padding: 5px;"><strong>मो.नं. <span style="font-weight: bold;"> {{ $admission->Student->parent_mobile}} </span></strong></td>
                                <td style="text-align: left; border: 1px solid #000000; color:black; padding: 5px;"><strong>मो.नं. <span style="font-weight: bold;"> {{ $admission->Student->local_parent_mobile}} </span></strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <br>
                <tr>
                   
                    <td colspan="10">
                        <strong><h5 style="text-align: center; margin-top: 1rem; font-size:18px;">-संमतीपत्र-</h5></strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: justify">
                        <p>
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  वसतिगृह सर्व नियम व अटी मी वाचल्या असून माझ्या पालकांनी त्या लक्षात घेतल्या आहेत.मला ते सर्व नियम मान्य आहेत. मी वसतिगृहात नीट वागेन. शिस्त व स्वच्छता याकडे लक्ष देईन. कोणत्याही प्रकारचे नुकसान होऊ देणार नाही. वैयक्तीक व सामुदायिकरित्या नुकसान झाल्यास वा केले गेल्यास महाविद्यालयाचे अधिकारी ठरवतील, त्याप्रमाणे नुकसान भरपाई मी देईन. रेक्टरनी अथवा महाविद्यालयाने वेळोवेळी केलेले नियम माझेवर बंधनकारक राहतील तसेच मी वसतिगृहात प्रवेश घेतल्यावर कुठल्याही प्रकारचे रॅगिंग करण्याचा प्रयत्न करणार नाही. माझ्याकडून तसे घडल्यास त्याच्या होणाऱ्या कायदेशीर परिणामांची मला संपूर्ण जाणीव आहे.
                        </p>
                    </td>
                </tr>
                <br>
                <tr >
                    <td colspan="6" style="text-align: left;" >
                       
                        <label>विद्यार्थ्यांचे नांव : <strong> {{ $admission->Student->name}} </strong></label>
                    </td>
                    <td colspan="4" style="text-align: right;">
                        <label>विद्यार्थ्याची सही : <strong>_________________</strong></label>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="10" style="text-align: left;">
                        <br>
                        <p>माझा पाल्य माझ्या संमतीने वसतिगृहात प्रवेशासाठी अर्ज करीत आहे. वसतिगृहाचे सर्व नियम मला माहित असून ते मला मान्य आहेत.</p>
                    </td>
                </tr>
                <br>
                <tr >
                    <td colspan="6" style="text-align: left;" >
                        
                        <label>पालकाचे नांव : <strong> {{ $admission->Student->parent_name}} </strong></label>
                    </td>
                    <td colspan="4" style="text-align: right;">
                        <label>पालकाची सही :  <strong>_________________</strong></label>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="10">
                        <h5 style="text-align: center; margin-top: 2rem; color: #333; font-size:18px;">विद्यार्थी वसतिगृह फी तपशील</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <table style="width:100%; border-collapse: collapse; text-align: center;">
                            <tr>
                                <td style="border: 1px solid #000000; color:black; padding: 5px;">विद्यार्थी वसतिगृह फी तपशील</td>
                                <td style="border: 1px solid #000000; color:black; padding: 5px;">वसतिगृह फी</td>
                                <td style="border: 1px solid #000000; color:black; padding: 5px;">वसतिगृह डिपॉझीट</td>
                                <td style="border: 1px solid #000000; color:black; padding: 5px;">मेस डिपॉझीट</td>
                                <td style="border: 1px solid #000000; color:black; padding: 5px;">एकूण वसतिगृह फी</td>
                            </tr>
                            @foreach ($fee as $key => $f)
                                 @if ($key==4)
                                     @break
                                 @endif
                            <tr>
                                @php
                                    $amt=0;
                                @endphp

                                <td style="border: 1px solid #000000; color:black; padding: 5px;"> {{ $f->seated->seated }}  सिटेड</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;"> {{ $amt=$f->amount }}/-</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;">1000.00/-</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;">1000.00/-</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;"> {{ number_format($amt+2000, 2) }} /-</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="2">
                        <strong>दिनांक</strong>
                    </td>
                    <td colspan="3">
                        <strong>रेक्टर</strong>
                    </td>
                    <td colspan="3">
                        <strong>अकौंट विभाग</strong>
                    </td>
                    <td colspan="2">
                        <strong>प्राचार्य</strong>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="2">
                        <strong> {{ now()->format('d / m / Y'); }} </strong>
                    </td>
                    <td colspan="3">
                        <strong>_________________</strong>
                    </td>
                    <td colspan="3">
                        <strong>_________________</strong>
                    </td>
                    <td colspan="2">
                        <strong>_________________</strong>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</div>
</body>
</html>
