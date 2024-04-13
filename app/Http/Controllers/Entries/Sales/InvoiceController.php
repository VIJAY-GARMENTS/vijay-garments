<?php

namespace App\Http\Controllers\Entries\Sales;

use Aaran\Common\Models\Despatch;
use Aaran\Common\Models\Style;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use App\Helper\ConvertTo;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __invoke($vid)
    {
        if($vid != ''){
            $peout = Sale::select(
                'sales.*',
                'contacts.vname as contact_name',
                'contact_details.address_1 as contact_detail_address_1',
                'orders.vname as order_name',
                'styles.vname as style_name',
                'despatches.vname as despatch_name',
                'transports.vname as transport_name',
            )
                ->join('contacts', 'contacts.id', '=', 'sales.contact_id')
                ->join('contact_details', 'contact_details.id', '=', 'sales.contact_detail_id_buyer_address')
                ->join('orders', 'orders.id', '=', 'sales.order_id')
                ->join('styles', 'styles.id', '=', 'sales.style_id')
                ->join('despatches', 'despatches.id', '=', 'sales.despatch_id')
                ->join('transports', 'transports.id', '=', 'sales.transport_id')
                ->where('sales.id', '=', $vid)
                ->get()->firstOrFail();

            $contact = Contact::printDetails($peout->contact_id);
            $contact_detail = Contact_detail::printDetails($peout->contact_detail_id_buyer_address);
            $delivery=Contact_detail::printDetails($peout->contact_detail_id_delivery_address);
            $despatch = Despatch::printDetails($peout->despatch_id);
            $style = Style::printDetails($peout->style_id);
            $tenant = Company::printDetails(session()->get('company_id'));

            $data = DB::table('saleitems')
                ->select(
                    'saleitems.*',
                    'products.vname as product_name',
                    'products.units as product_unit',
                    'hsncodes.vname as hsncode',
                    'colours.vname as colour_name',
                    'sizes.vname as size_name',
                )
                ->join('products', 'products.id', '=', 'saleitems.product_id')
                ->join('hsncodes', 'hsncodes.id', '=', 'products.hsncode_id')
                ->join('colours', 'colours.id', '=', 'saleitems.colour_id')
                ->join('sizes', 'sizes.id', '=', 'saleitems.size_id')
                ->where('sale_id', '=', $vid)
                ->get()
                ->transform(function ($data) {
                    return [
                        'saleitem_id' => $data->id,
                        'product_id' => $data->product_id,
                        'product_name' => $data->product_name,
                        'product_unit' => \App\Enums\Units::tryFrom($data->product_unit)->getName(),
                        'hsncode' => $data->hsncode,
                        'colour_id' => $data->colour_id,
                        'colour_name' => $data->colour_name,
                        'size_id' => $data->size_id,
                        'size_name' => $data->size_name,
                        'description'=>$data->description,
                        'qty' => $data->qty,
                        'price' => $data->price,
                        'total_taxable' => number_format($data->qty * $data->price,2,'.',''),
                        'gst_percent' => $data->gst_percent / 2,
                        'gst_amount' => number_format(($data->qty * $data->price) * (($data->gst_percent / 2) / 100),2,'.',''),
                        'sub_total' => number_format((($data->qty * $data->price) * ($data->gst_percent / 100)) + ($data->qty * $data->price),2,'.',''),
                    ];
                });


            $peoutItem  = $data;

            Pdf::setOption(['dpi' => 150, 'defaultPaperSize'=>'a4', 'defaultFont' => 'sans-serif']);

            $pdf = PDF::loadView('pdf.entries.sales.vijay_garments1',[
                'obj' => $peout,
                'rupees'=>ConvertTo::ruppesToWords($peout->grand_total),
                'list' => $peoutItem,
                'cmp' => $tenant,
                'contact' => $contact,
                'despatch'=>$despatch,
                'style'=>$style,
                'contact_detail'=>$contact_detail,
                'delivery'=>$delivery,
            ]);


            $pdf->render();

            return $pdf->stream();

        }
        return null;
    }
}
