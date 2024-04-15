<?php

namespace App\Http\Controllers\Entries\Sales;

use Aaran\Common\Models\Despatch;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use Aaran\Master\Models\Style;
use App\Helper\ConvertTo;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __invoke($vid)
    {
        if ($vid != '') {

            $sale = $this->getSales($vid);

            Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif']);

            $pdf = PDF::loadView('pdf.entries.sales.vijay_garments1', [
                'obj' => $sale,
                'rupees' => ConvertTo::ruppesToWords($sale->grand_total),
                'list' => $this->getSaleItems($vid),
                'cmp' => Company::printDetails(session()->get('company_id')),
                'billing_address' => Contact_detail::printDetails($sale->billing_id),
                'shipping_address' => Contact_detail::printDetails($sale->shipping_id),
            ]);


            $pdf->render();

            return $pdf->stream();

        }
        return null;
    }

    public function getSales($vid): ?Sale
    {
        return Sale::select(
            'sales.*',
            'contacts.vname as contact_name',
            'contacts.msme_no as msme_no',
            'contacts.msme_type as msme_type',
            'orders.vname as order_no',
            'orders.order_name as order_name',
            'styles.vname as style_name',
            'styles.desc as style_desc',
            'despatches.vname as despatch_name',
            'despatches.vdate as despatch_date',
            'transports.vname as transport_name',
        )
            ->join('contacts', 'contacts.id', '=', 'sales.contact_id')
            ->join('orders', 'orders.id', '=', 'sales.order_id')
            ->join('styles', 'styles.id', '=', 'sales.style_id')
            ->join('despatches', 'despatches.id', '=', 'sales.despatch_id')
            ->join('transports', 'transports.id', '=', 'sales.transport_id')
            ->where('sales.id', '=', $vid)
            ->get()->firstOrFail();
    }

    public function getSaleItems($vid): Collection
    {
        return DB::table('saleitems')
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
                    'po_no' => $data->po_no,
                    'dc_no' => $data->dc_no,
                    'product_name' => $data->product_name,
                    'product_unit' => \App\Enums\Units::tryFrom($data->product_unit)->getName(),
                    'hsncode' => $data->hsncode,
                    'colour_id' => $data->colour_id,
                    'colour_name' => $data->colour_name,
                    'size_id' => $data->size_id,
                    'size_name' => $data->size_name,
                    'description' => $data->description,
                    'qty' => $data->qty,
                    'price' => $data->price,
                    'total_taxable' => number_format($data->qty * $data->price, 2, '.', ''),
                    'gst_percent' => $data->gst_percent / 2,
                    'gst_amount' => number_format(($data->qty * $data->price) * (($data->gst_percent / 2) / 100), 2, '.', ''),
                    'sub_total' => number_format((($data->qty * $data->price) * ($data->gst_percent / 100)) + ($data->qty * $data->price), 2, '.', ''),
                ];
            });
    }
}
