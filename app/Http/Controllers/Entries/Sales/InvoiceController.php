<?php

namespace App\Http\Controllers\Entries\Sales;

use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
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
                'orders.vname as order_name'
            )
                ->join('contacts', 'contacts.id', '=', 'sales.contact_id')
                ->join('orders', 'orders.id', '=', 'sales.order_id')
                ->where('sales.id', '=', $vid)
                ->get()->firstOrFail();


            $contact = Contact::printDetails($peout->contact_id);
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

            $pdf = PDF::loadView('pdf.entries.sales.vijay_garments',[
                'obj' => $peout,
                'rupees'=>ConvertTo::ruppesToWords($peout->grand_total),
                'list' => $peoutItem,
                'cmp' => $tenant,
                'contact' => $contact
            ]);


            $pdf->render();

            return $pdf->stream();

        }
        return null;
    }
}
