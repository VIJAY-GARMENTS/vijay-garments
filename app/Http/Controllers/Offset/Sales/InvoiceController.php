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
        if ($vid != '') {
            $peout = Sale_offset::select(
                'sale_offsets.*',
                'contacts.vname as contact_name',
                'orders.vname as order_name',
                'ledgers.vname as ledger'
            )
                ->join('contacts', 'contacts.id', '=', 'sale_offsets.contact_id')
                ->join('orders', 'orders.id', '=', 'sale_offsets.order_id')
                ->join('ledgers', 'ledgers.id', '=', 'sale_offsets.ledger_id')
                ->where('sale_offsets.id', '=', $vid)
                ->get()->firstOrFail();


            $contact = Contact::printDetails($peout->contact_id);

            $tenant = Company::printDetails(session()->get('company_id'));

            $data = DB::table('saleitem_offsets')
                ->select(
                    'saleitem_offsets.*',
                    'products.vname as product_name',
                    'hsncodes.vname as hsncode',
                )
                ->join('products', 'products.id', '=', 'saleitem_offsets.product_id')
                ->join('hsncodes', 'hsncodes.id', '=', 'products.hsncode_id')
                ->where('sale_offset_id', '=', $vid)
                ->get()
                ->transform(function ($data) {
                    return [
                        'saleitem_offset_id' => $data->id,
                        'po_no' => $data->po_no,
                        'dc_no' => $data->dc_no,
                        'product_id' => $data->product_id,
                        'product_name' => $data->product_name,
                        'hsncode' => $data->hsncode,
                        'qty' => $data->qty,
                        'price' => $data->price,
                        'taxable' =>$data->qty * $data->price,
                        'gst_percent' => $data->gst_percent / 2,
                        'gst_amount' => ($data->qty * $data->price) * (($data->gst_percent / 2) / 100),
                        'sub_total' => (($data->qty * $data->price) * ($data->gst_percent / 100)) + ($data->qty * $data->price),
                    ];
                });

            $peoutItem = $data;


            Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif']);

            $pdf = PDF::loadView('pdf.offset.sales.invoice2', [
                'obj' => $peout,
                'rupees' => ConvertTo::ruppesToWords($peout->grand_total),
                'list' => $peoutItem,
                'cmp' => $tenant,
                'contact' => $contact,
                'copy' => 3
            ]);


            $pdf->render();

            return $pdf->stream();

        }
        return null;
    }
}
