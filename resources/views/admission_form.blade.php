@extends('layouts.app')
@section('content')
@section('styles')
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 225mm;
                height: 310mm;
            }

        }
    </style>
@endsection

<html>

<body>
    <div class="addmission_form">
        <div class="row">
            <div class="col-12 mt-2">
                <img src="{{ asset('assets/images/shikshan-logo.png') }}" alt="form-logo" style="display: block; margin: 0 auto; width: 10%;">
            </div>
            <div class="col-12">
                <h6 class="text-center mt-1">शिक्षण प्रसारक संस्था, संगमनेर</h6>
                <h5 class="text-center text-wrap mt-2">संगमनेर नगरपालिका कला, वाणिज्य, दा.ज.मालपाणी वाणिज्य आणि ब.ना. सारडा विज्ञान महाविद्यालय ( स्वायत्त ) संगमनेर</h5>
                <h2 class="text-center">विद्यार्थी वसतिगृह प्रवेश अर्ज ( २०२३-२४ )</h2>
                <hr class="m-2" style="color:black;">
            </div>
        </div>


        <div class="row mx-3">
            <div class="col-12 col-sm-4">
                <label class="form-control w-100" for="#">Member ID : <strong>1215</strong></label>
            </div>

            <div class="col-12 col-sm-4">
                <label class="form-control w-100" for="#">Class : <strong>F.Y.B.Sc.</strong></label>
            </div>

            <div class="col-12 col-sm-4">
                <label class="form-control w-100" for="#">Room No : <strong>B1(R-12)</strong></label>
            </div>

            <div class="col-12">
                <hr style="color:black;">
            </div>
        </div>


        <div class="row mx-3">
            <div class="col-12 col-sm-9">
                <div class="row">
                    <div class="col-12 col-sm-3">
                        <label class="form-label" for="search">विद्यार्थ्यांचे नांव : </label>
                    </div>
                    <div class="col-12 col-sm-8">
                        <label class="form-label text-start" for="search"><strong>Suyash Popat Pawar</strong></label>
                    </div>
                    <div class="col-12 col-sm-2">
                        <label class="form-label" for="search">वर्ग : </label>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label class="form-label text-start" for="search"><strong>F.Y.B.Sc.</strong></label>
                    </div>
                    <div class="col-12 col-sm-3">
                        <label class="form-label" for="search">जन्मतारीख : </label>
                    </div>
                    <div class="col-12 col-sm-3">
                        <label class="form-label text-start" for="search"><strong>24 / 02 / 2001</strong></label>
                    </div>
                    <div class="col-12 col-sm-2">
                        <label class="form-label" for="search">जात : </label>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label class="form-label text-start" for="search"><strong>Hindu Maratha</strong></label>
                    </div>
                    <div class="col-12 col-sm-3">
                        <label class="form-label" for="search">प्रवर्ग : </label>
                    </div>
                    <div class="col-12 col-sm-3">
                        <label class="form-label text-start" for="search"><strong>GENERAL</strong></label>
                    </div>
                    <div class="col-12 col-sm-2">
                        <label class="form-label" for="search">रक्तगट : </label>
                    </div>
                    <div class="col-12 col-sm-10">
                        <label class="form-label text-start" for="search"><strong>O+</strong></label>
                    </div>
                    <div class="col-12 col-sm-8">
                        <label class="form-label" for="search">मागील वार्षिक परीक्षेत मिळालेले शेकडा गुण : </label>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label class="form-label text-start" for="search"><strong>60 %</strong></label>
                    </div>
                    <div class="col-12 col-sm-8">
                        <label class="form-label" for="search">यापूर्वी आपण रॅगिंगमध्ये गुंतला होता काय? :</label>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label class="form-label text-start" for="search"><strong>होय</strong></label>
                    </div>
                    <div class="col-12 col-sm-8">
                        <label class="form-label" for="search">आजार/अ‍ॅलर्जी असल्यास उल्लेख करावा : </label>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label class="form-label text-start" for="search"><strong>Dust Allergy</strong></label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3 ">
                <div class="">

                    <img src="{{ asset('assets/admin_template/images/auth/login-bg.jpg') }}" alt=""
                        style="max-width: 200px; height: 200px;" class="mx-auto d-block img-fluid ">
                </div>
            </div>
        </div>


        <div class="row mx-3">
            <div class="col-12 col-sm-12">

                <table style="width:100%;">
                    <tr>
                        <td style="border: 1px solid #000000; color:black; text-align: center;">वडिलांचे / पालकांचे नांव व संपर्क पत्ता</td>
                        <td style="border: 1px solid #000000; color:black; text-align: center;">संगमनेरमधील पालकांचे नांव व संपर्क पत्ता</td>
                    </tr>
                    <tr>
                        <td class="text-start" style="border: 1px solid #000000; color:black; height:40px;">श्री / श्रीमती. <strong>Suresh Bhausaheb Pansare</strong></td>
                        <td class="text-start" style="border: 1px solid #000000; color:black;">श्री / श्रीमती. <strong>Suresh Bhausaheb Pansare</strong></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000000; color:black; height:40px;"><strong>Behind Sanagmner Colllege, Sangamner</strong></td>
                        <td style="border: 1px solid #000000; color:black;"><strong>Behind Sanagmner Colllege, Sangamner</strong></td>
                    </tr>
                    <tr>
                        <td class="text-start"
                            style="border: 1px solid #000000; color:black; height:40px;">फोन / मो.नं. <strong>5678676767</strong></td>
                        <td class="text-start" style="border: 1px solid #000000; color:black;">फोन / मो.नं. <strong>5678676767</strong></td>
                    </tr>
                </table>

            </div>
        </div>


        <div class="row mx-3">
            <div class="container-fluid col-sm-12 col-12">
                <h5 class="text-center mt-3">-संमतीपत्र-</h5>
            </div>
            <div class="col-12 col-sm-12">

                <p style="text-indent: 5em;">
                    वसतिगृह सर्व नियम व अटी मी वाचल्या असून माझ्या पालकांनी त्या लक्षात घेतल्या आहेत.
                    मला ते सर्व नियम मान्य आहेत. मी वसतिगृहात नीट वागेन. शिस्त व स्वच्छता याकडे लक्ष देईन.
                    कोणत्याही प्रकारचे नुकसान होऊ देणार नाही. वैयक्तीक व सामुदायिकरित्या नुकसान झाल्यास वा केले गेल्यास
                    महाविद्यालयाचे अधिकारी ठरवतील, त्याप्रमाणे नुकसान भरपाई मी देईन. रेक्टरनी अथवा महाविद्यालयाने वेळोवेळी केलेले नियम माझेवर बंधनकारक राहतील तसेच मी वसतिगृहात प्रवेश
                    घेतल्यावर कुठल्याही प्रकारचे रॅगिंग करण्याचा प्रयत्न करणार नाही. माझ्याकडून तसे घडल्यास त्याच्या होणाऱ्या कायदेशीर परिणामांची मला संपूर्ण जाणीव आहे.
                </p>

            </div>
        </div>



        <div class="row mx-3">
            <div class="col-12 col-sm-6">
                <label class="form-label w-100" for="#">विद्यार्थ्यांचे नांव :
                    <strong>Suyash Popat Pawar</strong></label>
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label w-100" for="#">विद्यार्थ्याची सही :
                    <strong>S.P.Pawar</strong></label>
            </div>
        </div>
        <div class="row mx-3">
            <div class="col-12 col-sm-12 mt-3">
                <p>माझा पाल्य माझ्या संमतीने वसतिगृहात प्रवेशासाठी अर्ज करीत आहे. वसतिगृहाचे सर्व नियम मला माहित
                    असून ते
                    मला मान्य आहेत.</p>
            </div>
        </div>
        <div class="row mx-3">
            <div class="col-12 col-sm-6">
                <label class="form-label w-100" for="#">पालकाचे नांव :
                    <strong>Suyash Popat Pawar</strong></label>
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label w-100" for="#">पालकाची सही :
                    <strong>S.P.Pawar</strong></label>
            </div>
        </div>



        <div class="row mx-3 mt-2">
            <h5 class="text-center text-pain">विद्यार्थी वसतिगृह फी तपशील</h5>
            <div class="col-md-12">
                <table
                    style="width:100% auto; border-collapse: collapse; text-align: center; margin-left: auto; margin-right: auto;">
                    <tr>
                        <td style="border: 1px solid #000000; color:black; height:50px; width:250px;">विद्यार्थी
                            वसतिगृह फी तपशील</td>
                        <td style="border: 1px solid #000000; color:black; height:50px; width:170px;">वसतिगृह फी</td>
                        <td style="border: 1px solid #000000; color:black; height:50px; width:180px;">वसतिगृह डिपॉझीट
                        </td>
                        <td style="border: 1px solid #000000; color:black; height:50px; width:150px;">मेस डिपॉझीट</td>
                        <td style="border: 1px solid #000000; color:black; height:50px; width:190px;">एकूण वसतिगृह फी
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000000; color:black; height:60px;">टु सिटेड
                        </td>
                        <td style="border: 1px solid #000000; color:black;">१२, ०००/-</td>
                        <td style="border: 1px solid #000000; color:black;">१,०००/-</td>
                        <td style="border: 1px solid #000000; color:black;">१,०००/-</td>
                        <td style="border: 1px solid #000000; color:black;">१४,०००/-</td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="row mt-5 mx-3 pt-4">
            <div class="col-12 col-sm-3 text-center">
                <strong>दिनांक</strong>
            </div>
            <div class="col-12 col-sm-3 text-center">
                <strong>रेक्टर</strong>
            </div>
            <div class="col-12 col-sm-3 text-center">
                <strong>अकौंट विभाग</strong>
            </div>
            <div class="col-12 col-sm-3 text-center">
                <strong>प्राचार्य</strong>
            </div>
        </div>
    </div>
    <div class="row mt-3 mx-3">
        <div class="col-12 col-sm-3 text-center">
            <strong> 10 / 12 / 2023</strong>
        </div>
        <div class="col-12 col-sm-3 text-center">
            <strong>Prof.S.P.Pawar</strong>
        </div>
        <div class="col-12 col-sm-3 text-center">
            <strong>Sr.Clerk R.K.Pansare</strong>
        </div>
        <div class="col-12 col-sm-3 text-center">
            <strong>Principle G.H. Gaikwad</strong>
        </div>
    </div>
</div>
</body>

</html>
@endsection
