<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">

    <title>Night Out Form</title>
    <style>
        td{
            text-align: center;
        }
        tr{
            margin-top: 10px;
        }
        table{
            border:3px solid black;
            padding: 5px;
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
                        <img src="{{ asset('assets/images/shikshan-logo.png') }}" alt="form-logo" class="custom-image" style="display: block; margin: 0 auto; height: 80px; width: 120px;">
                    </td>
                    <td colspan="3" style="text-align: right ;">

                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="justify-content: center;">
                        <h6 style="margin-top: 0px; text-align: center; margin-bottom:3px;">{{ $nightout->allocation->Bed->Room->Floor->Building->Hostel->College->heading_1 }}</h6>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        <h4 style="margin-top: 0px; text-align: center; margin-bottom:3px;">{{ $nightout->allocation->Bed->Room->Floor->Building->Hostel->College->name }}</h4>
                    </td>
                </tr>`
                <tr>
                    <td colspan="10">
                        <h4 style="margin-top: 0px; text-align: center; margin-bottom:3px;">{{ $nightout->allocation->Bed->Room->Floor->Building->Hostel->College->address }}</h4>
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="4">

                    </td>
                    
                    <td colspan="2" style="align-items:center; border: 2px solid #000; padding: 10px; width: 10px; font-size:15px;">
                        <p>{{ $nightout->allocation->Bed->Room->Floor->Building->Hostel->name }}</p>
                    </td>
                    <td colspan="4">

                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: center;">
                        <label >Rector : </label><label ><strong>Dr. Valmik A. Mendhkar- 9822038727 / 8669002187</strong></label>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td colspan="1">
                        &nbsp;
                    </td>
                    <td colspan="8" style="align-items:center; border: 2px solid #000; padding: 10px; width: 10px; font-size: 18px; word-spacing: 2em;">
                        <label>APPLICATION FORM FOR NIGHT OUT</label>
                    </td>
                    <td colspan="1">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: right;">
                        <label >Date Of Application :</label>   <label ><strong>{{ $nightout->created_at->format('d / m / Y') }}</strong></label> &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;">
                        &nbsp;&nbsp;<label >Name :</label>
                    </td>
                    <td colspan="8" style="text-align: left;">
                        <label ><strong>{{ $nightout->allocation->admission->student->name }}</strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;">
                        &nbsp;&nbsp;<label >Class :</label>
                    </td>
                    <td colspan="8" style="text-align: left;">
                        <label ><strong>{{ $nightout->allocation->admission->class->name }}</strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;">
                        &nbsp;&nbsp;<label >Hostel Name :</label>
                    </td>
                    <td colspan="8" style="text-align: left;">
                        <label ><strong>{{ $nightout->allocation->Bed->Room->Floor->Building->Hostel->name }}</strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;">
                        &nbsp;&nbsp;<label >Room No :</label>
                    </td>
                    <td colspan="8" style="text-align: left;">
                        <label ><strong>{{ $nightout->allocation->Bed->Room->label }} - ( {{ $nightout->allocation->Bed->Room->id }} )</strong></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;To,
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;The Rector Sir,
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;{{ $nightout->allocation->Bed->Room->Floor->Building->Hostel->name }},
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;{{ $nightout->allocation->Bed->Room->Floor->Building->Hostel->College->name }},
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: left; ">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Respected Sir,
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: justify;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;I am, <strong>{{ $nightout->allocation->admission->student->name }}</strong>   Class  
                        <strong>{{ $nightout->allocation->admission->class->name }}</strong>  request you to grant permission  <br>&nbsp;&nbsp;<strong style="display: block;">from {{  date('d / m / Y',strtotime($nightout->going_date )) }} to {{ date('d / m / Y',strtotime($nightout->comming_date )) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        &nbsp;
                    </td>
                </tr>
                <tr >
                    <td colspan="10" style="text-align: justify; padding:10px;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Reason for Night Out <strong>{{ $nightout->reason }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: justify;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;I will stay at the following address during the above mentioned period. I will return to the hostel on <br>&nbsp;&nbsp; <strong>{{ date('d / m / Y',strtotime($nightout->comming_date )) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Thanking you,
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Your's Faithfully,
                    </td>
                    <td colspan="4" style="text-align: left;">
                        Name, Address & Sign of Guardian
                    </td>
                </tr>
    
                <tr>
                    <td colspan="6" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<strong>{{ $nightout->allocation->admission->student->name }}</strong>
                    </td>
                    <td colspan="4" style="text-align: left;">
                        <strong>{{ $nightout->allocation->admission->student->parent_name }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Signature
                    </td>
                    <td colspan="4" style="text-align: left;">
                        <strong>{{ $nightout->allocation->admission->student->parent_address }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;______________
                    </td>
                    <td colspan="4" style="text-align: left;">
                       Mob. No :<strong> {{ $nightout->allocation->admission->student->parent_mobile }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">
                        &nbsp;
                    </td>
                    <td colspan="4" style="text-align: left;">
                        Relation :<strong>______________</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: left">
                        &nbsp;&nbsp;Permitted by : <strong>____________________</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: left">

                    </td>
                    <td colspan="9" style="text-align: left">
                      &nbsp;  &nbsp; &nbsp; &nbsp; <strong>(Rector Seal & Sign)</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    </td>
                </tr>
            </table>
        </div>
    </section>
</div>
</body>
</html>
