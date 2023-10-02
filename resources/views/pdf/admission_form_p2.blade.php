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

</div>
</body>
</html>
