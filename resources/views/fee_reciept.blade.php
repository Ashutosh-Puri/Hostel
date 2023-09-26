@extends('layouts.app')
@section('content')

@section('styles')

<style>
    body, html {
    margin: 0;
    padding: 0;
}

#watermark {
    position: relative; /* Position relative for child elements */
}

.content {
    position: relative;
    z-index: 1; /* Text is on top */
}
.watermark-image {
    position: absolute;
    top: 60px;
    left: 320px;
    z-index: 0; /* Set a lower z-index for the watermark */
    opacity: 0.5; /* Adjust the opacity as needed */
    width: 300px;
    height: auto;
}
</style>

@endsection

<html>

    <body>

        <div class="container-md">
            <section name="page_1">
                <div class="fee_reciept" style="border:black; border-width:2px; border-style:solid;">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center mt-1 mb-0" style="font-family: 'Raleway', sans-serif;">SHIKSHAN PRASARAK SANSTHA'S</p>
                            <div class="mx-1">
                                <p class="text-center text-wrap mb-0 mt-1" style="font-size: 22px; font-family: 'Archivo Black', sans-serif;"><strong>ARTS, D.J. MALPANI COMMERCE & B.N. SARDA SCIENCE COLLEGE (AUTONOMOUS)</strong></p>
                            </div>
                            <p class="text-center mb-0" style="font-family: 'Raleway', sans-serif;">A/p.GHULEWADI SANGAMNER</p>
                            <hr class="mx-3 mt-1 mb-1" style="border: none; height: 2px; background-color: black; font-weight: 900;">
                        </div>
                    </div>
                    <div class="row mx-2">
                        <div class="col-2">Member Id:</div>
                        <div class="col-1"><strong>28428</strong></div>
                        <div class="col-7">Regular Admission Fee Receipt (Confirmed Admission-2023-2024)</div>
                        <div class="col-1 text-end">Section:</div>
                        <div class="col-1 text-end"><strong>MCS-II</strong></div>
                    </div>

                    <div class="row mx-3 mt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2 text-end" style="border: 1px solid #000000;">
                                    <div>Name :</div>
                                    <div>GR/PRN No :</div>
                                    <div>Date :</div>
                                    <div>Reciept No :</div>
                                    <div>Bank Details :</div>
                                </div>

                                <div class="col-6" style="border: 1px solid #000000;">
                                    <div class="row">
                                        <div class="col-12"><strong>SUYASH POPAT PAWAR</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div><strong>174</strong></div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-6 text-end">Adm. Form No :</div>
                                                <div class="col-6"><strong>123456</strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div><strong>03/07/2023</strong></div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-6 text-end">Online Reg Id :</div>
                                                <div class="col-6"><strong>1234567890</strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div><strong>36</strong></div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div><strong>Cash</strong></div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-6 text-end">No :</div>
                                                <div class="col-6 text-start" style="width:auto;"><strong>1234567890</strong></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2 text-end" style="border: 1px solid #000000;">
                                    <div>Class :</div>
                                    <div>Division Type :</div>
                                    <div>Roll No :</div>
                                    <div>Division :</div>
                                    <div>Fee Category :</div>
                                </div>
                                <div class="col-2" style="border: 1px solid #000000;">
                                    <div><strong>MCS II (Credit)</strong></div>
                                    <div><strong>NON-GRANT</strong></div>
                                    <div><strong>1</strong></div>
                                    <div><strong>A</strong></div>
                                    <div><strong>PAYING</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="watermark" class="row mx-3" style="border: 1px solid #000000;">
                        <img src="{{ asset('assets/images/shikshan-logo.png') }}" alt="Watermark" class="watermark-image">
                        <div class="col-12 content">
                            <div class="row">
                                <div class="col-2 mt-2">
                                    <div>Arrears of</div>
                                    <div>Admission</div>
                                    <div>Ashwamedh con</div>
                                    <div>Computerization</div>
                                    <div>Credit Ststem</div>
                                    <div>Sport Fund</div>
                                    <div>Development</div>
                                    <div>Disaster Manage</div>
                                    <div>Eligibility</div>
                                    <div>Eligibility For</div>
                                    <div>GYMKHANA</div>
                                    <div>Lab. equipment</div>
                                </div>
                                <div class="col-1 mt-2">
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                </div>
                                <div class="col-2 mt-2">
                                    <div>Laboratory</div>
                                    <div>Library</div>
                                    <div>PG Registration</div>
                                    <div>Students Activi</div>
                                    <div>SAF</div>
                                    <div>Student Secu in</div>
                                    <div>Student Welfar</div>
                                    <div>Tution</div>
                                    <div>NSS</div>
                                    <div>Seminar / Works</div>
                                    <div>Maintenance</div>
                                    <div>Medical Examina</div>
                                </div>
                                <div class="col-1 mt-2">
                                    <div><strong>13395</strong></div>
                                    <div><strong>300</strong></div>
                                    <div><strong>75</strong></div>
                                    <div><strong>1000</strong></div>
                                    <div><strong>50</strong></div>
                                    <div><strong>20</strong></div>
                                    <div><strong>100</strong></div>
                                    <div><strong>14550</strong></div>
                                    <div><strong>10</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>500</strong></div>
                                    <div><strong>0</strong></div>
                                </div>
                                <div class="col-2 mt-2">
                                    <div>***</div>
                                    <div>* * *</div>
                                    <div>Arrears of Fee</div>
                                    <div>Arrears of T Fe</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                </div>
                                <div class="col-1 mt-2">
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                </div>
                                <div class="col-2 mt-2">
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                    <div>* * *</div>
                                </div>
                                <div class="col-1 mt-2">
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                    <div><strong>0</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-3 p-1" style="border: 1px solid #000000;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">Fee In Words :</div>
                                <div class="col-6"><strong>Rupees Thirty Thousand Only</strong></div>
                                <div class="col-2">Paid Fee</div>
                                <div class="col-2"><strong>30000</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-3 mb-2 p-1" style="border: 1px solid #000000;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">Total Pending Fee Till Date :</div>
                                <div class="col-5"><strong>30000</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>

@endsection
