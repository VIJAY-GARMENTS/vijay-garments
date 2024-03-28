<?php

namespace App\Http\Controllers\Offset\Sales;

use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Offset\Models\Sale_offset;
use App\Helper\ConvertTo;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __invoke($vid)
    {
        if($vid != ''){
            $peout = Sale_offset::select(
                'Sale_offsets.*',
                'contacts.vname as contact_name',
                'orders.vname as order_name'
            )
                ->join('contacts', 'contacts.id', '=', 'Sale_offsets.contact_id')
                ->join('orders', 'orders.id', '=', 'Sale_offsets.order_id')
                ->where('Sale_offsets.id', '=', $vid)
                ->get()->firstOrFail();


            $contact = Contact::printDetails($peout->contact_id);
            $tenant = Company::printDetails(session()->get('company_id'));

            $data = DB::table('saleitem_offsets')
                ->select(
                    'saleitem_offsets.*',
                    'products.vname as product_name',
                    'colours.vname as colour_name',
                    'sizes.vname as size_name'
                )
                ->join('products', 'products.id', '=', 'saleitem_offsets.product_id')
                ->join('colours', 'colours.id', '=', 'saleitem_offsets.colour_id')
                ->join('sizes', 'sizes.id', '=', 'saleitem_offsets.size_id')
                ->where('sale_offset_id', '=', $vid)
                ->get()
                ->transform(function ($data) {
                    return [
                        'saleitem_offset_id' => $data->id,
                        'po_no'=>$data->po_no,
                        'dc_no'=>$data->dc_no,
                        'product_id' => $data->product_id,
                        'product_name' => $data->product_name,
                        'colour_id' => $data->colour_id,
                        'colour_name' => $data->colour_name,
                        'size_id' => $data->size_id,
                        'size_name' => $data->size_name,
                        'qty' => $data->qty,
                        'price' => $data->price,
                        'gst_percent' => $data->gst_percent,
                    ];
                });


            $peoutItem  = $data;

            Pdf::setOption(['dpi' => 150, 'defaultPaperSize'=>'a4', 'defaultFont' => 'sans-serif']);

            $pdf = PDF::loadView('pdf.offset.sales.invoice3',[
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
