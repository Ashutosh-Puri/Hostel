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
            
                <tr>
                    <td colspan="10" style="text-align: left;">
                        <label> पत्ता:-  <strong> {{ $admission->student->parent_address}} </strong></label>
                    </td>
                </tr>
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
