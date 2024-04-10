<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printing saleInvoice DC</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif,Helvetica, Times;
        }

        .inr-sign::before {
            content: "\20B9";
        }

        table {
            font-size: x-small;
            border-collapse: collapse;
        }

        th, td {
            border: solid 1px rgba(161, 161, 161, 0.9);
            border-collapse: collapse;
            padding: 2px;
            /*margin: 2px;*/
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        thead tr td {
            font-weight: bold;
        }

        .logoLeft {
            position: fixed;
            margin-top: 10px;
            margin-left: 20px;
            height: 80px !important;
            Width: auto !important;
        }

        .companyname {
            /*position: fixed;*/
            /*margin-top: 2px;*/
            /*margin-left: 20px;*/
            font-weight: 300;
            /*font-size: 36px;*/
            /*font-size: x-large;*/
            font-size: 15px;
            text-align: left;
            text-transform: uppercase;
            height: 35px;
        }

        .address1 {
            position: fixed;
            margin-top: 34px;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        .address2 {
            position: fixed;
            margin-top: 30px;
            top: 20px !important;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        .gst {
            position: fixed;
            margin-top: 32px;
            top: 32px !important;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        div.relative {
            position: relative;
            width: 400px;
            height: 200px;
            border: 3px solid #73AD21;
        }

        div.absolute {
            position: absolute;
            top: 80px;
            right: 0;
            width: 200px;
            height: 100px;
            border: 3px solid red;
        }


        .page-break {
            page-break-after: always;
        }

    </style>

</head>
<body>
<table width="100%" class="print:*">
    <tr>
        <td colspan="4" style="text-align: center; margin-top: 2px; font-weight: bold; border-right: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tax&nbsp;Invoice&nbsp;</td>
        <td colspan="3" style="text-align: center; margin-top: 2px; font-weight: bold; border-left: none">Original Copy</td>
    </tr>
    <tr>
        <td colspan="3" rowspan="4" style="padding-top: 2px;padding-bottom: 10px;">
            <div class="logoLeft">
                <img style="position: fixed;margin-left: 20px;padding-top: 5px;height: 100px;width: auto;" src="{{ public_path('images/vijay_garments_logo.jpeg') }}"/>
            </div>
            <div style="text-align: left; width: 50%; font-weight: bold; padding-left: 120px;"
                 class="companyname">{{$cmp->get('company_name')}}</div>
            <div style="text-align: left; width: 100%; position: absolute; margin-top: 10px;padding-left: 120px;"
                 class="address1">{{$cmp->get('address_1')}}</div>
            <div style="text-align: left; width: 100%; position: relative; margin-top: 3px;padding-left: 120px;"
                 class="address2">{{$cmp->get('address_2')}}</div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div><span>&nbsp;&nbsp;Invoice no&nbsp;</span></div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div><span>&nbsp;&nbsp;Date&nbsp;</span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <div><span>&nbsp;&nbsp;{{$obj->invoice_no}}</span></div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div><span>{{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <div>Style No</div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div>Date</div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <div></div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div></div>
        </td>
    </tr>
    <tr>
        <td colspan="3" rowspan="4" style="padding-top: 2px;padding-bottom: 10px;">
            <div style="text-align: left;">
                <p style="font-size: medium; font-weight: bold; line-height: 5px">Buyer</p>
            </div>
            <div style="text-align: left;">

                <p style="font-size: 14px; font-weight: bold; line-height: 5px ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M/s.{{$contact->get('contact_name')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('address_1')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('address_3')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('gstCell')}}</p>
            </div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div>Dispatch NO</div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div>Dispatch Date
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <div></div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <div>Dispatch Through</div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div>Other Ref.</div>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <div></div>
        </td>
        <td colspan="2">
            <div></div>
        </td>
    </tr>
</table>
<table width="100%" style="border-top: none">
    <thead style="background-color: transparent;">
    <tr>
        <th width="5px" style="padding: 5px;border-top: none">S.No</th>
        <th style="padding: 5px;border-top: none">Description of Goods</th>
        <th width="80px" style="padding: 5px;border-top: none">HSN/SAC</th>
        <th width="5px" style="padding: 5px;border-top: none">Quantity</th>
        <th width="70px" style="padding: 5px;border-top: none">Rate</th>
        <th width="40px" style="padding: 5px;border-top: none">Per</th>
        <th width="70px" style="padding: 5px;border-top: none">Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index => $row)

        <tr>
            <td align="center" style="border-bottom: none;border-top: none;">{{$index+1}} </td>
            <td align="left" style="border-bottom: none;border-top: none;">&nbsp;{{$row['product_name']}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['hsncode']}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['qty']+0}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{number_format($row['price'],2,'.','')}}</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;{{$row['product_unit']}}</td>
            <td align="right" style="border-bottom: none;border-top: none;">&nbsp;{{ number_format($row['qty']*$row['price'],2,'.','')}}</td>
        </tr>

    @endforeach

    @for($i = 0; $i < 17-$list->count(); $i++)

        <tr>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
            <td align="center" style="border-bottom: none;border-top: none;">&nbsp;</td>
        </tr>
    @endfor

    <tr>
        <td colspan="2" align="center"><span style="font-style: italic;">Amount in Words</span></td>
        <td align="right"></td>
        <td align="right"></td>
        <td align="right" style="border-top: none;"></td>
        <td align="right"></td>
        <td align="right">{{number_format($obj->total_taxable,2,'.','')}}</td>
    </tr>

    <tr>

        <td colspan="3" rowspan="2">
            <div style="font-weight: bold; text-align: left;">
                &nbsp;&nbsp;&nbsp;&nbsp;{{$rupees}}Only
            </div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div>Add&nbsp;:&nbsp;CGSt</div>

        </td>
        <td colspan="1" style="text-align: right;">
            <div>{{ $row['gst_percent'] }}%</div>

        </td>
        <td colspan="1" style="text-align: right;">
            <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <div>Add&nbsp;:&nbsp;SGST</div>
        </td>
        <td colspan="1" style="text-align: right;">
            <div>{{ $row['gst_percent'] }}%</div>
        </td>
        <td colspan="1" style="text-align: right;">
            <div>{{number_format($obj->total_gst/2,2,'.','')}}</div>
        </td>
    </tr>


    <tr>

        <td colspan="3" rowspan="3">

            <div style="text-align: left; font-family:Times,serif;">
                <div style="font-family:Times,serif;">Acc.Name<span style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('company_name')}}</span></div>
                <div style="font-family:Times,serif;">ACCOUNT NO<span style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('acc_no')}}</span></div>
                <div style="font-family:Times,serif;">BANK NAME<span style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('bank')}}</span></div>
                <div style="font-family:Times,serif;">BRANCH <span style="font-family:Times,serif; font-weight: bolder">&nbsp;:&nbsp;{{$cmp->get('branch')}}</span>&nbsp;/&nbsp;IFSC
                    CODE<span style="font-family:Times,serif; font-weight: bolder">:{{$cmp->get('ifsc_code')}}</span></div>
            </div>
        </td>
        <td colspan="2" style="text-align: center;">
            <div>Add&nbsp;:&nbsp;IGST</div>

        </td>
        <td colspan="1" style="text-align: right">
            <div>0%</div>

        </td>
        <td colspan="1" style="text-align: right">
            <div>-</div>

        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: center">
            <div>Add&nbsp;:&nbsp;Shipping Charges</div>
        </td>
        <td colspan="1" style="text-align: right">
            <div>{{ number_format($obj->additional,2,'.','') }}</div>
        </td>
    </tr>
    <tr style="font-weight: bold;font-size: medium;">
        <td colspan="3" style="text-align: center">
            <div>GRAND TOTAL</div>
        </td>
        <td colspan="1" style="text-align: right">
            <div>{{number_format($obj->grand_total,2,'.','')}}</div>
        </td>
    </tr>
    <tr>
        <td colspan="7">&nbsp;</td>
    </tr>


    <tr>
        <td colspan="2" rowspan="2">
            &nbsp;
        </td>
        <td colspan="1" rowspan="2" style="text-align: center;">
            <div>&nbsp;</div>
            <div>Taxable Value</div>

        </td>
        <td colspan="2" style="text-align: center;">
            <div>Central Tax</div>

        </td>
        <td colspan="2" style="text-align: center;">
            <div>Sale Tax</div>


    </tr>
    <tr>

        <td colspan="1" style="text-align: center">
            <div>Rate</div>
        </td>
        <td colspan="1" style="text-align: center">
            <div>Amount</div>
        </td>
        <td colspan="1" style="text-align: center;">
            <div>Rate</div>
        </td>
        <td colspan="1" style="text-align: center;">
            <div>Amount</div>
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="1" style="text-align: right">
            <div>{{number_format($obj->total_taxable,2,'.','')}}</div>
        </td>
        <td colspan="1" style="text-align: center">
            <div>{{ $row['gst_percent'] }}%</div>
        </td>
        <td colspan="1" style="text-align: right">
            <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
        </td>
        <td colspan="1" style="text-align: center;">
            <div>{{ $row['gst_percent'] }}%</div>
        </td>
        <td colspan="1" style="text-align: right;">
            <div>{{ number_format($obj->total_gst/2,2,'.','') }}</div>
        </td>
    </tr>

    <tr>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">Total</td>
        <td style="text-align: right;">{{number_format($obj->total_taxable,2,'.','')}}</td>
        <td>&nbsp;</td>
        <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
        <td>&nbsp;</td>
        <td style="text-align: right;">{{ number_format($obj->total_gst/2,2,'.','')}}</td>
    </tr>

    <tr>
        <td colspan="7">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="3" style="height: 40px; text-align: left; vertical-align: top; padding-top: 5px ">
            <div style="font-family:Times,serif; font-weight: bolder">&nbsp;&nbsp;Terms&nbsp;:</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Subject to Chennai Jurisdiction</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Goods once sold will not be taken back</div>
            <div style="font-family:Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;Payment terms:&nbsp;Should Pay with in is</div>
            <div>&nbsp;</div>

        </td>
        <td colspan="4" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ">
            &nbsp;For&nbsp;{{$cmp->get('company_name')}}
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div style="padding-top: 20px;">Authorised signatory</div>

        </td>
    </tr>
    <tr>
        <td colspan="7">
            <div style="font-family:Times,serif; text-align: center;font-size:12px; padding-top: 5px;">Thank you for your Business and have a great day!</div>
        </td>
    </tr>
</table>
</body>
</html>
