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
                        <label >Room No : <strong> {{ $allocation->bed->room->label }} ( {{ $allocation->bed->room->id }}  )</strong></label>
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
                                style="max-width: 135px; height: 200px;" class="mx-auto d-block img-fluid">
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
                        <label >मागील वार्षिक परीक्षेत मिळालेले शेकडा गुण :</label>   <label ><strong> {{ $education->percentage }} %</strong></label>
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
                            <tr>
                                <td style="border: 1px solid #000000; color:black; padding: 5px;"> {{ $admission->seated->seated }}  सिटेड</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;">@php
                                    $amt=0.00;
                                 @endphp
                                 @foreach ($allocation->bed->room->seated->fees as $a)
                                  @if ($a->academic_year_id== $admission->academic_year_id)
                                     {{ $amt=$a->amount}}  
                                  @endif
                                 @endforeach/-</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;">1000.00/-</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;">1000.00/-</td>
                                <td style="border: 1px solid #000000; color:black;padding: 5px;"> {{ number_format($amt+=2000, 2) }} /-</td>
                            </tr>
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

    <section style="break-after:page;">
        <div >
            <table width="100%" style="margin: 0; border-collapse: collapse;">
                <tr>
                    <td width="3%"></td>
                    <td width="97%"></td>
            
                </tr>
                <tr>
                    <td colspan="2" >
                        <strong>..2..</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>विद्यार्थी वसतिगृहाचे महत्वाचे नियम </strong>
                    </td>
                </tr>
                @foreach ($rules as $r)
                    <tr>
                        <td style="vertical-align: top;"><ul><li></li></ul></td><td  style="text-align: left;">
                            <span>{{ $r->description }}</span>
                        </td>
                    </tr>
                    
                @endforeach
            </table>
            <table width="100%">
                <tr>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                </tr>
                <tr >
                    <td colspan="6" style="text-align: left;" > 
                        <label>विद्यार्थ्यांचे नांव : <strong> {{ $admission->student->name }} </strong></label>
                    </td>
                    <td colspan="4" style="text-align: right;">
                        <label>विद्यार्थ्याची सही : <strong>_________________</strong></label>
                    </td>
                </tr>
                <br>
                <tr >
                    <td colspan="6" style="text-align: left;" >
                        
                        <label>पालकाचे नांव : <strong> {{ $admission->student->parent_name }} </strong></label>
                    </td>
                    <td colspan="4" style="text-align: right;">
                        <label>पालकाची सही :  <strong>_________________</strong></label>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <section style="break-after:page;">
        <div >

            <table  width="100%" style="margin: 0; border-collapse: collapse;">
                <tr>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                    <td style="width:10%;"></td>
                  
                </tr>
                <tr>
                    <td colspan="3" style="vertical-align: top; ">
                    </td>
                    <td colspan="4" style="text-align: center; vertical-align: top; ">
                        <img src="{{ asset('assets/images/shikshan-logo.png') }}" alt="form-logo" class="custom-image" style="display: block; margin: 0 auto; height: 80px; width: 120px;">
                    </td>
                    <td colspan="3" style="text-align: right ;">
                        No : {{ $admission->id }}
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <h6 class="text-center mt-1">शिक्षण प्रसारक संस्थेचे</h6>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <h5 class="text-center text-wrap mt-2">संगमनेर नगरपालिका कला, वाणिज्य, दा.ज.मालपाणी वाणिज्य आणि ब.ना. सारडा विज्ञान महाविद्यालय ( स्वायत्त ) संगमनेर</h5>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="10">
                        <h4 class="text-center">विद्यार्थी वसतिगृह</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <h3 class="text-center">पालक व वसतिगृह प्रवेशित विद्यार्थी हमीपत्र</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <h4 class="text-center">शै.वर्ष {{ $admission->AcademicYear->year }} - {{ $admission->AcademicYear->year+1 }}</h4>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="4">
                        <label class="form-label" for="search">विद्यार्थ्यांचे नाव : </label> <label class="form-label text-start" for="search"><strong> {{ $admission->student->name }} </strong></label>
                    </td>
                    <td colspan="3">
                        <label class="form-label" for="search">वर्ग : </label> <label class="form-label text-start" for="search"><strong> {{ $admission->Class->name }} </strong></label>
                    </td>
                    <td colspan="3">
                        <label class="form-label" for="search">वय : </label> <label class="form-label text-start" for="search"><strong>@php
                            $dobDate = new DateTime($admission->Student->dob);
                            $currentDate = now();
                            $interval = $dobDate->diff($currentDate);
                            $age = $interval->y;
                        @endphp
                            {{  $age }}</strong></label>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td colspan="10">
                        <h3 class="text-center">विद्यार्थ्यांचे हमीपत्र</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-indent: 5em; text-align:justify; ">
                        <p style="margin-bottom:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            मी चि.<strong> {{ $admission->student->name }} </strong>आपल्या महाविद्यालयात व विद्यार्थी वसतिगृहात शैक्षणिक वर्ष २०२३-२४ साठी<strong> {{ $admission->Class->name }} </strong>या वर्गात प्रवेश घेतलेला आहे.
                            प्रवेश घेतेवेळी महाविद्यालयाच्या प्रशासनाने मला वसतिगृहसंबंधी असलेले सर्व नियम व अटींची पूर्णतः कल्पना दिलेली आहे तसेच मी स्वतः त्या सर्व अटी वाचल्या असून त्या मला मान्य आहेत.
                            मी वसतिगृहात शिस्त व स्वच्छता याकडे काळजीपूर्वक लक्ष देईल. महाविद्यालयाचे प्राचार्य, वसतिगृहाचे रेक्टर अथवा महाविद्यालय प्रशासनाने वेळोवेळी केलेले नियम माझ्यावर बंधनकारक राहतील.
                            मी मोबाइल फोन/लॅपटॉपचा वापर फक्त शैक्षणिक कामाकरिता करेल. मी वसतिगृहात प्रवेश घेतल्यानंतर कोणत्याही प्रकारची रॅगिंग अथवा तत्सम प्रकार करण्याचा प्रयत्न करणार नाही, माझेकडून
                            तसे घडल्यास उद्भवणाऱ्या कायदेशीर परिणामांस मी पूर्णतः जबाबदार राहील.
                            
                            
                        </p>
                        <br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            विद्यार्थी वसतिगृहाची स्थावर व जंगम मालमत्ता, फर्निचर, विजेची फिटिंग, विद्युत उपकरणे, टी.व्ही., प्लॅस्टिक पाण्याच्या
                            टाक्या अशा इ. वसतिगृह मालमत्ता मी लक्षपूर्वक सांभाळीन.मालमत्तेचे कोणत्याही प्रकारचे नुकसान मी होऊ देणार नाही. माझेकडून वैयक्तिक किंवा सामुदायिकरीत्या नुकसान झाल्यास अथवा केले गेल्यास महाविद्यालयाचे प्रशासन ठरवतील त्याप्रमाणे
                            मी नुकसान भरपाई देईल. मी वसतिगृहातून रेक्टरच्या परवानगीशिवाय तसेच नोंद रजिस्टरला नोंद न करता अथवा चुकीची नोंद करून महाविद्यालय परिसराबाहेर गेल्यास त्या कालावधीत
                            घडलेल्या प्रसंगास / गैरप्रकारास मी स्वतः सर्वस्वी जबाबदार राहील त्याचप्रमाणे वसतिगृहात इलेक्ट्रॉनिक, इलेक्ट्रिकल उपकरण वापरास सक्त मनाई आहे, याची मला महाविद्या प्रशासनाने
                            पूर्वकल्पना दिलेली आहे. तरीही माझेकडे याप्रकारचे कोणतेही साहित्य आढळल्यास तसेच त्याद्वारे माझ्या जिवाला काही धोका निर्माण झाल्यास किंवा माझ्या गैरवर्तनातून काही समस्या निर्माण
                            झाल्यास त्यासाठी मी स्वतः पूर्णपणे जबाबदार राहील, त्यास संस्था, प्रशासन, महाविद्यालयाचे प्राचार्य व वसतिगृहाचे रेक्टर यांस जबाबदार धरणार नाही अशी हमी मी कोणत्याही दबावाला बळी न
                            पडता स्वखुशीने लिहून देत आहे.
                        </p>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <label class="form-label" for="search">दिनांक: </label> <label class="form-label text-start" for="search"><strong> {{ now()->format('d / m / Y'); }} </strong></label>
                    </td>
                    <td colspan="5" style="text-align: right;">
                        <label class="form-label" for="search">विद्यार्थ्याची सही : </label> <label class="form-label text-start" for="search"><strong>______________</strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <p style="font-weight: 8px;">------------------------------------------------------------------------------------------------------------------------------------------</p>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="10">
                        <h3 class="text-center">पालकांचे हमीपत्र</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-indent: 5em; text-align:justify;">
                        <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            माझा मुलगा/पाल्य <strong> {{ $admission->student->name }} </strong> हा संगमनेर महाविद्यालयातील विद्यार्थी वसतिगृहाची शैक्षणिक वर्ष २०२३-२४ साठी <strong>{{ $admission->Class->name }}</strong> या वर्गात शिकत असून तिला वरील
                            प्रमाणे महाविद्यालय प्रशासनाने निर्देशित केलेले नियम व अटी मी पूर्णतः वाचल्या असून त्या मला मान्य आहेत. माझा मुलगा/पाल्य वसतिगृहातून रेक्टरच्या परवानगीशिवाय तसेच
                            नोंद रजिस्टरला नोंद करता अथवा चुकीची नोंद करून महाविद्यालय परिसराबाहेर गेल्यास त्या कालावधीत घडलेल्या प्रसंगास / गैरप्रकारास मी स्वतः सर्वस्वी जबाबदार राहील.
                            त्याचप्रमाणे वसतिगृहात इलेक्ट्रॉनिक, इलेक्ट्रिकल उपकरण वापरास सक्त मनाई आहे, याची मला महाविद्या प्रशासनाने पूर्वकल्पना दिलेली आहे. तरीही माझ्या पाल्याकडे याप्रकारचे
                            कोणतेही साहित्य आढळल्यास तसेच त्याद्वारे त्याच्या  जिवाला काही धोका निर्माण झाल्यास किंवा माझ्या गैरवर्तनातून काही समस्या निर्माण झाल्यास त्यासाठी मी स्वतः पूर्णपणे जबाबदार राहील.
                            महाविद्यालय प्रशासनाने नमूद केलेल्या वरील नियमांत माझ्या पाल्याकडून उल्लंघन झाल्यास  त्यास संस्था, प्रशासन, महाविद्यालयाचे प्राचार्य व वसतिगृहाचे रेक्टर यांस जबाबदार धरणार नाही अशी
                            हमी मी कोणत्याही दबावाला बळी न पडता स्वखुशीने लिहून देत आहे.
                        </p>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="6" style="text-align: left;">
                        <label>पालकांचे पूर्ण नांव : <strong> {{ $admission->student->parent_name }} </strong> </label>
                    </td>
                    <td colspan="4" style="text-align: right;">
                        <label>फोन नं : <strong> {{ $admission->student->parent_mobile }} </strong> </label>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td colspan="10" style="text-align: left;">
                        <label> पत्ता:-  <strong> {{ $admission->student->parent_address}} </strong></label>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td colspan="6" style="text-align: left;">
                        <label>दिनांक: <strong> {{ now()->format('d / m / Y'); }} </strong> </label>
                    </td>
                    <td colspan="4" style="text-align: right;">
                        <label>पालकांची सही :  <strong>_____________</strong> </label>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</div>
</body>
</html>
