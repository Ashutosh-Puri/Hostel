@extends('layouts.app')
@section('content')

@section('styles')

<style>
    body {
        border: 2px solid black;
    }
</style>

@endsection
<html>

    <body>

        <div class="container-md">
            <section name="page_1">
                <div class="admission_form1" style:="border:orange; border-width:5px; border-style:solid;">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('assets/images/shikshan-logo.png') }}" alt="form-logo" style="display: block; margin: 0 auto; height: 80px; width: 120px;">
                        </div>
                        <div class="col-12">
                            <h6 class="text-center mt-1">Shikshan Prasark Sanstha's</h6>
                            <h5 class="text-center mx-0 text-wrap mt-2">S.N. Arts, D.J. Malpani Commerce & B.N. Sarda Science College(Autonomous), Sangamner</h5>
                            <h5 class="text-center">Tal-Sangamner, Dist-Ahmednagar-422605</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">

                        </div>
                        <div class="col-4">
                            <label class="form-control w-100 mb-2 text-center" for="#" style="border: 1px solid #000000; color:black; font-size: 18px;">
                                <strong>BOY'S HOSTEL</strong>
                            </label>
                        </div>
                        <div class="col-4">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-center mt-3">Rector: Dr. Valmik A. Mendhkar-9822038727 / 8669002187</h5>
                        </div>
                    </div>
                    <div class="row mt-3 mx-2">
                        <div class="col-12">
                            <label class="form-control w-100 mb-2 text-center" for="#" style="border: 1px solid #000000; color:black; font-size: 18px; word-spacing: 2em;">
                                <strong>APPLICATION FORM FOR NIGHT OUT</strong>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-6">
                            <div class="float-end mt-2 mx-3">
                                <strong>Date Of Application : 28 / 07 / 2023</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-9">
                            <div class="row mt-2">
                                <div class="col-12 col-sm-3">
                                    <label class="form-label" for="search">Name</label>
                                </div>
                                <div class="col-12 col-sm-9">
                                    <label class="form-label text-start" for="search"><strong>: Suyash Popat Pawar</strong></label>
                                </div>
                                <div class="col-12 col-sm-3 mt-1">
                                    <label class="form-label" for="search">Class</label>
                                </div>
                                <div class="col-12 col-sm-9">
                                    <label class="form-label text-start" for="search"><strong>: F.Y.B.Sc.</strong></label>
                                </div>
                                <div class="col-12 col-sm-3 mt-1">
                                    <label class="form-label" for="search">Hostel No</label>
                                </div>
                                <div class="col-12 col-sm-9">
                                    <label class="form-label text-start" for="search"><strong>: B-1</strong></label>
                                </div>
                                <div class="col-12 col-sm-3 mt-1">
                                    <label class="form-label" for="search">Room No</label>
                                </div>
                                <div class="col-12 col-sm-9">
                                    <label class="form-label text-start" for="search"><strong>: G-9</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-4 mt-1">
                        <div>To,</div>
                        <div class="mt-2">The Rector Sir,</div>
                        <div>Boy's Hostel,</div>
                        <div>Sangamner College ( Autonomous ), Sangamner,</div>
                        <div class="mt-2">Respected Sir,</div>
                        <div class="row mt-2">
                            <div class="col-1">
                                <label class="form-label" for="search">I am</label>
                            </div>
                            <div class="col-6 text-center">
                                <strong>Shinde Aniket Dyaneshwar</strong>
                            </div>
                            <div class="col-2">
                                <label class="form-label" for="search">Class</label>
                            </div>
                            <div class="col-3 text-center">
                                <strong>11th Science</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            request you to grant permission from
                        </div>
                        <div class="col-6 text-start">
                            <strong>28 / 08 / 2023 to 30 / 08 / 2023</strong>
                        </div>
                    </div>
                    <div class="row mx-5 mt-2">
                        <div class="col-6">
                            Reason for Night Out
                        </div>
                        <div class="col-6 text-start">
                            <strong>at home</strong>
                        </div>
                    </div>
                    <div class="row mx-3 mt-2">
                        <div class="col-12">
                            I will stay at the following address during the above mentioned period. I will return to the
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                           hostel on <strong class="mx-3">31 / 08 / 2023</strong>
                        </div>
                    </div>
                    <div class="row mx-4 mt-2">
                        <div class="col-6 text-start">
                            <div>Thanking you,</div>
                            <div class="mt-1">Yours faithfully,</div>
                            <div class="mt-2 mb-2"><strong>A.S.Shinde</strong></div>
                            <div>Signature</div>
                            <div class="mt-2">( Student Sign )</div>
                        </div>
                        <div class="col-6">
                            <div>Name, Address & Sign of Guardian</div>
                            <div class="mt-2"><strong>Aniket Dyaneshwar Shinde</strong></div>
                            <div class="mt-2"><strong>Musalgaon Tal.Sinner</strong></div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label>Mob.No :</label>
                                </div>
                                <div class="col-8 text-start">
                                    <strong>3986589587</strong>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label>Relation :</label>
                                </div>
                                <div class="col-8 text-start">
                                    <strong>Sister</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            Permitted by :
                        </div>
                        <div class="col-9 text-start">
                            <strong>Valmik A. Mendhkar</strong>
                            <div class="mt-2">( Rector Seal & Sign )</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </body>

</html>
@endsection
