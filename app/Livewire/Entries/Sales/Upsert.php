<?php

namespace App\Livewire\Entries\Sales;

use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Despatch;
use Aaran\Common\Models\Ledger;
use Aaran\Common\Models\Order;
use Aaran\Common\Models\Size;
use Aaran\Common\Models\Style;
use Aaran\Common\Models\Transport;
use Aaran\Entries\Models\Sale;
use Aaran\Entries\Models\Saleitem;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use Aaran\Master\Models\Product;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Upsert extends Component
{
    use CommonTrait;

    public string $uniqueno = '';
    public string $acyear = '';
    public string $invoice_no = '';
    public string $invoice_date = '';
    public string $sales_type = '';
    public string $destination = '';
    public string $bundle = '';
    public mixed $total_qty = 0;
    public mixed $total_taxable = '';
    public string $total_gst = '';
    public mixed $additional = '';
    public mixed $round_off = '';
    public mixed $grand_total = '';
    public mixed $qty = '';
    public mixed $price = '';
    public string $gst_percent = '';
    public string $itemIndex = "";
    public $itemList = [];
    public $contact_detail_id_buyer_address;
    public $contact_detail_id_delivery_address;
    public $description;

    public string $company;
    public string $contact;
    public string $order;
    public string $transport;
    public string $ledger;
    public string $sale;
    public string $product;
    public string $colour;
    public string $size;

    public $contact_id = '';

    public $contact_name = '';
    public Collection $contactCollection;
    public $highlightContact = 0;
    public $contactTyped = false;
    public $grandtotalBeforeRound;

    public function decrementContact(): void
    {
        if ($this->highlightContact === 0) {
            $this->highlightContact = count($this->contactCollection) - 1;
            return;
        }
        $this->highlightContact--;
    }

    public function incrementContact(): void
    {
        if ($this->highlightContact === count($this->contactCollection) - 1) {
            $this->highlightContact = 0;
            return;
        }
        $this->highlightContact++;
    }

    public function setContact($name, $id): void
    {
        $this->contact_name = $name;
        $this->contact_id = $id;
        $this->getContactList();
    }

    public function enterContact(): void
    {
        $obj = $this->contactCollection[$this->highlightContact] ?? null;

        $this->contact_name = '';
        $this->contactCollection = Collection::empty();
        $this->highlightContact = 0;

        $this->contact_name = $obj['vname'] ?? '';
        $this->contact_id = $obj['id'] ?? '';
    }

    #[On('refresh-contact')]
    public function refreshContact($v): void
    {
        $this->contact_id = $v['id'];
        $this->contact_name = $v['name'];
        $this->contactTyped = false;

    }

    public function getContactList(): void
    {

        $this->contactCollection = $this->contact_name ? Contact::search(trim($this->contact_name))
            ->where('company_id', '=', session()->get('company_id'))

            ->get() : Contact::where('company_id', '=', session()->get('company_id'))->get();

    }

    public $contact_detail_id = '';

    public $contact_detail_address = '';
    public Collection $contact_detailCollection;
    public $highlightContact_detail = 0;
    public $contact_detailTyped = false;

    public function decrementContact_detail(): void
    {
        if ($this->highlightContact_detail === 0) {
            $this->highlightContact_detail = count($this->contact_detailCollection) - 1;
            return;
        }
        $this->highlightContact_detail--;
    }

    public function incrementContact_detail(): void
    {
        if ($this->highlightContact_detail === count($this->contact_detailCollection) - 1) {
            $this->highlightContact_detail = 0;
            return;
        }
        $this->highlightContact_detail++;
    }

    public function setContact_detail($name, $id): void
    {
        $this->contact_detail_address = $name;
        $this->contact_detail_id = $id;
        $this->getcontact_detailList();
    }

    public function enterContact_detail(): void
    {
        $obj = $this->contact_detailCollection[$this->highlightContact_detail] ?? null;

        $this->contact_detail_address = '';
        $this->contact_detailCollection = Collection::empty();
        $this->highlightContact_detail = 0;

        $this->contact_detail_address = $obj['address_1'] ?? '';
        $this->contact_detail_id = $obj['id'] ?? '';
    }

    #[On('refresh-contact_detail')]
    public function refreshContact_detail($v): void
    {
        $this->contact_detail_id = $v['id'];
        $this->contact_detail_address = $v['name'];
        $this->contact_detailTyped = false;

    }

    public function getContact_detailList(): void
    {

        $this->contact_detailCollection = $this->contact_detail_address ? Contact_detail::search(trim($this->contact_detail_address))
            ->where('contact_id', '=', $this->contact_id)
            ->get() : contact_detail::all()->where('contact_id', '=', $this->contact_id);

    }

    public $contact_detail_id_1 = '';

    public $contact_detail_address_1 = '';
    public Collection $contact_detailCollection_1;
    public $highlightContact_detail_1 = 0;
    public $contact_detailTyped_1 = false;

    public function decrementContact_detail_1(): void
    {
        if ($this->highlightContact_detail_1 === 0) {
            $this->highlightContact_detail_1 = count($this->contact_detailCollection_1) - 1;
            return;
        }
        $this->highlightContact_detail_1--;
    }

    public function incrementContact_detail_1(): void
    {
        if ($this->highlightContact_detail_1 === count($this->contact_detailCollection_1) - 1) {
            $this->highlightContact_detail_1 = 0;
            return;
        }
        $this->highlightContact_detail_1++;
    }

    public function setContact_detail_1($name, $id): void
    {
        $this->contact_detail_address_1 = $name;
        $this->contact_detail_id_1 = $id;
        $this->getcontact_detailList_1();
    }

    public function enterContact_detail_1(): void
    {
        $obj = $this->contact_detailCollection_1[$this->highlightContact_detail_1] ?? null;

        $this->contact_detail_address_1 = '';
        $this->contact_detailCollection_1 = Collection::empty();
        $this->highlightContact_detail_1 = 0;

        $this->contact_detail_address_1 = $obj['address_1'] ?? '';
        $this->contact_detail_id_1 = $obj['id'] ?? '';
    }

    #[On('refresh-contact_detail')]
    public function refreshContact_detail_1($v): void
    {
        $this->contact_detail_id_1 = $v['id'];
        $this->contact_detail_address_1 = $v['name'];
        $this->contact_detailTyped_1 = false;

    }

    public function getContact_detailList_1(): void
    {

        $this->contact_detailCollection_1 = $this->contact_detail_address_1 ? Contact_detail::search(trim($this->contact_detail_address_1))
            ->where('contact_id', '=', $this->contact_id)
            ->get() : contact_detail::all()->where('contact_id', '=', $this->contact_id);

    }


    #[Rule('required')]
    public $order_id = '';
    public $order_name = '';
    public Collection $orderCollection;
    public $highlightOrder = 0;
    public $orderTyped = false;

    public function decrementOrder(): void
    {
        if ($this->highlightOrder === 0) {
            $this->highlightOrder = count($this->orderCollection) - 1;
            return;
        }
        $this->highlightOrder--;
    }

    public function incrementOrder(): void
    {
        if ($this->highlightOrder === count($this->orderCollection) - 1) {
            $this->highlightOrder = 0;
            return;
        }
        $this->highlightOrder++;
    }

    public function setOrder($name, $id): void
    {
        $this->order_name = $name;
        $this->order_id = $id;
        $this->getOrderList();
    }

    public function enterOrder(): void
    {
        $obj = $this->orderCollection[$this->highlightOrder] ?? null;

        $this->order_name = '';
        $this->orderCollection = Collection::empty();
        $this->highlightOrder = 0;

        $this->order_name = $obj['vname'] ?? '';
        $this->order_id = $obj['id'] ?? '';
    }

    #[On('refresh-order')]
    public function refreshOrder($v): void
    {
        $this->order_id = $v['id'];
        $this->order_name = $v['name'];
        $this->orderTyped = false;

    }

    public function getOrderList(): void
    {
        $this->orderCollection = $this->order_name ? Order::search(trim($this->order_name))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Order::where('company_id', '=', session()->get('company_id'))->get();;
    }

    public $style_id = '';
    public $style_name = '';
    public \Illuminate\Support\Collection $styleCollection;
    public $highlightStyle = 0;
    public $styleTyped = false;

    public function decrementStyle(): void
    {
        if ($this->highlightStyle === 0) {
            $this->highlightStyle = count($this->styleCollection) - 1;
            return;
        }
        $this->highlightStyle--;
    }

    public function incrementStyle(): void
    {
        if ($this->highlightStyle === count($this->styleCollection) - 1) {
            $this->highlightStyle = 0;
            return;
        }
        $this->highlightStyle++;
    }

    public function enterStyle(): void
    {
        $obj = $this->styleCollection[$this->highlightStyle] ?? null;

        $this->style_name = '';
        $this->styleCollection = Collection::empty();
        $this->highlightStyle = 0;

        $this->style_name = $obj['vname'] ?? '';;
        $this->style_id = $obj['id'] ?? '';;
    }

    public function setStyle($name, $id): void
    {
        $this->style_name = $name;
        $this->style_id = $id;
        $this->getStyleList();
    }

    #[On('refresh-style')]
    public function refreshStyle($v): void
    {
        $this->style_id = $v['id'];
        $this->style_name = $v['name'];
        $this->styleTyped = false;

    }

    public function getStyleList(): void
    {
        $this->styleCollection = $this->style_name ? Style::search(trim($this->style_name))->where('company_id', '=', session()->get('company_id'))
            ->get() : Style::all()->where('company_id', '=', session()->get('company_id'));
    }


    public $transport_id = '';
    public $transport_name = '';
    public Collection $transportCollection;
    public $highlightTransport = 0;
    public $transportTyped = false;

    public function decrementTransport(): void
    {
        if ($this->highlightTransport === 0) {
            $this->highlightTransport = count($this->transportCollection) - 1;
            return;
        }
        $this->highlightTransport--;
    }

    public function incrementTransport(): void
    {
        if ($this->highlightTransport === count($this->transportCollection) - 1) {
            $this->highlightTransport = 0;
            return;
        }
        $this->highlightTransport++;
    }

    public function setTransport($name, $id): void
    {
        $this->transport_name = $name;
        $this->transport_id = $id;
        $this->getTransportList();
    }

    public function enterTransport(): void
    {
        $obj = $this->transportCollection[$this->highlightTransport] ?? null;

        $this->transport_name = '';
        $this->transportCollection = Collection::empty();
        $this->highlightTransport = 0;

        $this->transport_name = $obj['vname'] ?? '';
        $this->transport_id = $obj['id'] ?? '';
    }

    #[On('refresh-transport')]
    public function refreshTransport($v): void
    {
        $this->transport_id = $v['id'];
        $this->transport_name = $v['name'];
        $this->transportTyped = false;

    }

    public function getTransportList(): void
    {
        $this->transportCollection = $this->transport_name ? Transport::search(trim($this->transport_name))
            ->get() : Transport::all();
    }


    public $despatch_id = '';
    public $despatch_name = '';
    public Collection $despatchCollection;
    public $highlightDespatch = 0;
    public $despatchTyped = false;

    public function decrementDespatch(): void
    {
        if ($this->highlightDespatch === 0) {
            $this->highlightDespatch = count($this->despatchCollection) - 1;
            return;
        }
        $this->highlightDespatch--;
    }

    public function incrementDespatch(): void
    {
        if ($this->highlightDespatch === count($this->despatchCollection) - 1) {
            $this->highlightDespatch = 0;
            return;
        }
        $this->highlightDespatch++;
    }

    public function setDespatch($name, $id): void
    {
        $this->despatch_name = $name;
        $this->despatch_id = $id;
        $this->getdespatchList();
    }

    public function enterDespatch(): void
    {
        $obj = $this->despatchCollection[$this->highlightDespatch] ?? null;

        $this->despatch_name = '';
        $this->despatchCollection = Collection::empty();
        $this->highlightDespatch = 0;

        $this->despatch_name = $obj['vname'] ?? '';
        $this->despatch_id = $obj['id'] ?? '';
    }

    #[On('refresh-despatch')]
    public function refreshDespatch($v): void
    {
        $this->despatch_id = $v['id'];
        $this->despatch_name = $v['name'];
        $this->despatchTyped = false;

    }

    public function getDespatchList(): void
    {
        $this->despatchCollection = $this->despatch_name ? Despatch::search(trim($this->despatch_name))
            ->get() : Despatch::all();
    }

    public $ledger_id = '';
    public $ledger_name = '';
    public Collection $ledgerCollection;
    public $highlightLedger = 0;
    public $ledgerTyped = false;

    public function decrementLedger(): void
    {
        if ($this->highlightLedger === 0) {
            $this->highlightLedger = count($this->ledgerCollection) - 1;
            return;
        }
        $this->highlightLedger--;
    }

    public function incrementLedger(): void
    {
        if ($this->highlightLedger === count($this->ledgerCollection) - 1) {
            $this->highlightLedger = 0;
            return;
        }
        $this->highlightLedger++;
    }

    public function setLedger($name, $id): void
    {
        $this->ledger_name = $name;
        $this->ledger_id = $id;
        $this->getLedgerList();
    }

    public function enterLedger(): void
    {
        $obj = $this->ledgerCollection[$this->highlightLedger] ?? null;

        $this->ledger_name = '';
        $this->ledgerCollection = Collection::empty();
        $this->highlightLedger = 0;

        $this->ledger_name = $obj['vname'] ?? '';
        $this->ledger_id = $obj['id'] ?? '';
    }

    #[On('refresh-ledger')]
    public function refreshLedger($v): void
    {
        $this->ledger_id = $v['id'];
        $this->ledger_name = $v['name'];
        $this->ledgerTyped = false;

    }

    public function getLedgerList(): void
    {
        $this->ledgerCollection = $this->ledger_name ? Ledger::search(trim($this->ledger_name))
            ->get() : Ledger::all();
    }

    public $product_id = '';
    public $product_name = '';
    public mixed $gst_percent1 = '';
    public Collection $productCollection;
    public $highlightProduct = 0;
    public $productTyped = false;

    public function decrementProduct(): void
    {
        if ($this->highlightProduct === 0) {
            $this->highlightProduct = count($this->productCollection) - 1;
            return;
        }
        $this->highlightProduct--;
    }

    public function incrementProduct(): void
    {
        if ($this->highlightProduct === count($this->productCollection) - 1) {
            $this->highlightProduct = 0;
            return;
        }
        $this->highlightProduct++;
    }

    public function setProduct($name, $id,$percent): void
    {
        $this->product_name = $name;
        $this->product_id = $id;
        $this->gst_percent1=$percent;
        $this->getProductList();
    }

    public function enterProduct(): void
    {
        $obj = $this->productCollection[$this->highlightProduct] ?? null;
        $this->product_name = '';
        $this->productCollection = Collection::empty();
        $this->highlightProduct = 0;

        $this->product_name = $obj['vname'] ?? '';
        $this->product_id = $obj['id'] ?? '';
        $this->gst_percent1 = $obj['gst_percent'] ?? '';
    }

    #[On('refresh-product')]
    public function refreshProduct($v): void
    {
        $this->product_id = $v['id'];
        $this->product_name = $v['name'];
        $this->productTyped = false;

    }

    public function getProductList(): void
    {
        $this->productCollection = $this->product_name ? Product::search(trim($this->product_name))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Product::all()->where('company_id', '=', session()->get('company_id'));
    }

    public $colour_id = '';
    public $colour_name = '';
    public Collection $colourCollection;
    public $highlightColour = 0;
    public $colourTyped = false;

    public function decrementColour(): void
    {
        if ($this->highlightColour === 0) {
            $this->highlightColour = count($this->colourCollection) - 1;
            return;
        }
        $this->highlightColour--;
    }

    public function incrementColour(): void
    {
        if ($this->highlightColour === count($this->colourCollection) - 1) {
            $this->highlightColour = 0;
            return;
        }
        $this->highlightColour++;
    }

    public function enterColour(): void
    {
        $obj = $this->colourCollection[$this->highlightColour] ?? null;

        $this->colour_name = '';
        $this->colourCollection = Collection::empty();
        $this->highlightColour = 0;

        $this->colour_name = $obj['vname'] ?? '';
        $this->colour_id = $obj['id'] ?? '';
    }

    public function setColour($name, $id): void
    {
        $this->colour_name = $name;
        $this->colour_id = $id;
        $this->getColourList();
    }

    #[On('refresh-colour')]
    public function refreshColour($v): void
    {
        $this->colour_id = $v['id'];
        $this->colour_name = $v['name'];
        $this->colourTyped = false;
    }

    public function getColourList(): void
    {
        $this->colourCollection = $this->colour_name ? Colour::search(trim($this->colour_name))
            ->get() : Colour::all();
    }


    public $size_id = '';
    public $size_name = '';
    public Collection $sizeCollection;
    public $highlightSize = 0;
    public $sizeTyped = false;

    public function decrementSize(): void
    {
        if ($this->highlightSize === 0) {
            $this->highlightSize = count($this->sizeCollection) - 1;
            return;
        }
        $this->highlightSize--;
    }

    public function incrementSize(): void
    {
        if ($this->highlightSize === count($this->sizeCollection) - 1) {
            $this->highlightSize = 0;
            return;
        }
        $this->highlightSize++;
    }

    public function setSize($name, $id): void
    {
        $this->size_name = $name;
        $this->size_id = $id;
        $this->getSizeList();
    }

    public function enterSize(): void
    {
        $obj = $this->sizeCollection[$this->highlightSize] ?? null;

        $this->size_name = '';
        $this->sizeCollection = Collection::empty();
        $this->highlightSize = 0;

        $this->size_name = $obj['vname'] ?? '';
        $this->size_id = $obj['id'] ?? '';
    }

    #[On('refresh-size')]
    public function refreshSize($v): void
    {
        $this->size_id = $v['id'];
        $this->size_name = $v['name'];
        $this->sizeTyped = false;

    }

    public function getSizeList(): void
    {
        $this->sizeCollection = $this->size_name ? Size::search(trim($this->size_name))
            ->get() : Size::all();
    }


    public function save(): string
    {
        if ($this->uniqueno != '') {
            if ($this->vid == "") {
                $obj = Sale::create([
                    'uniqueno' => "{$this->contact_id}~{$this->invoice_no}~{$this->invoice_date}",
                    'acyear' => '1',
                    'company_id' => session()->get('company_id'),
                    'contact_id' => $this->contact_id,
                    'invoice_no' => $this->invoice_no,
                    'invoice_date' => $this->invoice_date,
                    'order_id' => $this->order_id,
                    'contact_detail_id_buyer_address'=>$this->contact_detail_id,
                    'contact_detail_id_delivery_address'=>$this->contact_detail_id_1,
                    'style_id'=>$this->style_id?: 1,
                    'despatch_id'=>$this->despatch_id?: 1,
                    'sales_type' => $this->sales_type,
                    'transport_id' => $this->transport_id ?: 1,
                    'destination' => $this->destination,
                    'bundle' => $this->bundle,
                    'total_qty' => $this->total_qty,
                    'total_taxable' => $this->total_taxable,
                    'total_gst' => $this->total_gst,
                    'ledger_id' => $this->ledger_id ?: 1,
                    'additional' => $this->additional,
                    'round_off' => $this->round_off,
                    'grand_total' => $this->grand_total,
                    'active_id' => $this->active_id,
                ]);
                $this->saveItem($obj->id);
                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Sale::find($this->vid);
                $obj->uniqueno = session()->get('company_id') . '~' . $this->invoice_no . '~' . $this->invoice_date;
                $obj->acyear = 1;
                $obj->company_id = session()->get('company_id');
                $obj->contact_id = $this->contact_id;
                $obj->invoice_no = $this->invoice_no;
                $obj->invoice_date = $this->invoice_date;
                $obj->order_id = $this->order_id;
                $obj->contact_detail_id_buyer_address=$this->contact_detail_id;
                $obj->contact_detail_id_delivery_address=$this->contact_detail_id_1;
                $obj->style_id=$this->style_id;
                $obj->despatch_id=$this->despatch_id;
                $obj->sales_type = $this->sales_type;
                $obj->transport_id = $this->transport_id;
                $obj->destination = $this->destination;
                $obj->bundle = $this->bundle;
                $obj->total_qty = $this->total_qty;
                $obj->total_taxable = $this->total_taxable;
                $obj->total_gst = $this->total_gst;
                $obj->ledger_id = $this->ledger_id;
                $obj->additional = $this->additional;
                $obj->round_off = $this->round_off;
                $obj->grand_total = $this->grand_total;
                $obj->active_id = $this->active_id;
                $obj->save();
                DB::table('saleitems')->where('sale_id', '=', $obj->id)->delete();
                $this->saveItem($obj->id);
                $message = "Updated";
            }
            $this->getRoute();
            return $message;
        }
        return '';
    }

    public function saveItem($id): void
    {
        foreach ($this->itemList as $sub) {
            Saleitem::create([
                'sale_id' => $id,
                'product_id' => $sub['product_id'],
                'colour_id' => $sub['colour_id'],
                'size_id' => $sub['size_id'],
                'qty' => $sub['qty'],
                'price' => $sub['price'],
                'gst_percent' => $sub['gst_percent'],
                'description'=>$sub['description'],
            ]);
        }
    }


    public function mount($id): void
    {
        $this->invoice_no = Sale::nextNo();
        if ($id != 0) {
            $obj = Sale::find($id);
            $this->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->invoice_no = $obj->invoice_no;
            $this->invoice_date = $obj->invoice_date;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->contact_detail_id_buyer_address=$obj->contact_detail_id_buyer_address;
            $this->contact_detail_address=Contact_detail::printDetails($obj->contact_detail_id_buyer_address)->get('address_1');
            $this->contact_detail_id_delivery_address=$obj->contact_detail_id_delivery_address;
            $this->contact_detail_address_1=Contact_detail::printDetails($obj->contact_detail_id_delivery_address)->get('address_1');
            $this->style_id = $obj->style_id;
            $this->style_name = $obj->style->vname;
            $this->despatch_id = $obj->despatch_id;
            $this->despatch_name = $obj->despatch->vname;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport->vname;
            $this->destination = $obj->destination;
            $this->bundle = $obj->bundle;
            $this->total_qty = $obj->total_qty;
            $this->total_taxable = $obj->total_taxable;
            $this->total_gst = $obj->total_gst;
            $this->ledger_id = $obj->ledger_id;
            $this->ledger_name = $obj->ledger->vname;
            $this->additional = $obj->additional;
            $this->round_off = $obj->round_off;
            $this->grand_total = $obj->grand_total;
            $this->active_id = $obj->active_id;
            $data = DB::table('saleitems')->select('saleitems.*',
                'products.vname as product_name',
                'colours.vname as colour_name',
                'sizes.vname as size_name',)->join('products', 'products.id', '=', 'saleitems.product_id')
                ->join('colours', 'colours.id', '=', 'saleitems.colour_id')
                ->join('sizes', 'sizes.id', '=', 'saleitems.size_id')->where('sale_id', '=', $id)->get()->transform(function ($data) {
                    return [
                        'saleitem_id' => $data->id,
                        'product_name' => $data->product_name,
                        'product_id' => $data->product_id,
                        'colour_name' => $data->colour_name,
                        'colour_id' => $data->colour_id,
                        'size_name' => $data->size_name,
                        'size_id' => $data->size_id,
                        'qty' => $data->qty,
                        'price' => $data->price,
                        'description' => $data->description,
                        'gst_percent' => $data->gst_percent,
                        'taxable' => $data->qty * $data->price,
                        'gst_amount' => ($data->qty * $data->price) * ($data->gst_percent) / 100,
                        'subtotal' => $data->qty * $data->price + (($data->qty * $data->price) * $data->gst_percent / 100),
                    ];
                });
            $this->itemList = $data;
        } else {
            $this->uniqueno = "{$this->contact_id}~{$this->invoice_no}~{$this->invoice_date}";
            $this->active_id = true;
            $this->sales_type = 0;
            $this->gst_percent = 5;
            $this->additional = 0;
            $this->grand_total = 0;
            $this->total_taxable = 0;
            $this->round_off = 0;
            $this->total_gst = 0;
            $this->invoice_date = Carbon::now()->format('Y-m-d');
        }

        $this->calculateTotal();
    }

    public function addItems(): void
    {
        if ($this->itemIndex == "") {
            if (!(empty($this->colour_name)) &&
                !(empty($this->size_name)) &&
                !(empty($this->qty))
            ) {
                $this->itemList[] = [
                    'product_name' => $this->product_name,
                    'product_id' => $this->product_id,
                    'colour_id' => $this->colour_id,
                    'colour_name' => $this->colour_name,
                    'size_id' => $this->size_id,
                    'size_name' => $this->size_name,
                    'qty' => $this->qty,
                    'price' => $this->price,
                    'gst_percent' => $this->gst_percent1,
                    'description' => $this->description,
                    'taxable' => $this->qty * $this->price,
                    'gst_amount' => ($this->qty * $this->price) * $this->gst_percent1 / 100,
                    'subtotal' => $this->qty * $this->price + (($this->qty * $this->price) * $this->gst_percent1 / 100),
                ];
            }
        } else {
            $this->itemList[$this->itemIndex] = [
                'product_name' => $this->product_name,
                'product_id' => $this->product_id,
                'colour_id' => $this->colour_id,
                'colour_name' => $this->colour_name,
                'size_id' => $this->size_id,
                'size_name' => $this->size_name,
                'qty' => $this->qty,
                'price' => $this->price,
                'gst_percent' => $this->gst_percent1,
                'description' => $this->description,
                'taxable' => $this->qty * $this->price,
                'gst_amount' => ($this->qty * $this->price) * $this->gst_percent1 / 100,
                'subtotal' => $this->qty * $this->price + (($this->qty * $this->price) * $this->gst_percent1 / 100),
            ];

        }

        $this->calculateTotal();
        $this->resetsItems();
        $this->render();
    }

    public function resetsItems(): void
    {
        $this->itemIndex = '';
        $this->product_name = '';
        $this->product_id = '';
        $this->colour_name = '';
        $this->colour_id = '';
        $this->size_name = '';
        $this->size_id = '';
        $this->qty = '';
        $this->price = '';
        $this->description = '';
        $this->gst_percent = '';
        $this->calculateTotal();
    }

    public function changeItems($index): void
    {
        $this->itemIndex = $index;

        $items = $this->itemList[$index];
        $this->product_name = $items['product_name'];
        $this->product_id = $items['product_id'];
        $this->colour_name = $items['colour_name'];
        $this->colour_id = $items['colour_id'];
        $this->size_name = $items['size_name'];
        $this->size_id = $items['size_id'];
        $this->qty = $items['qty'] + 0;
        $this->price = $items['price'] + 0;
        $this->gst_percent1 = $items['gst_percent'];
        $this->description = $items['description'];
        $this->calculateTotal();
    }

    public function removeItems($index): void
    {
        unset($this->itemList[$index]);
        $this->itemList = collect($this->itemList);
        $this->calculateTotal();
    }

    public function calculateTotal(): void
    {
        if ($this->itemList) {

            $this->total_qty = 0;
            $this->total_taxable = 0;
            $this->total_gst = 0;
            $this->grandtotalBeforeRound = 0;

            foreach ($this->itemList as $row) {
                $this->total_qty += round(floatval($row['qty']), 3);
                $this->total_taxable += round(floatval($row['taxable']), 2);
                $this->total_gst += round(floatval($row['gst_amount']), 2);
                $this->grandtotalBeforeRound += round(floatval($row['subtotal']), 2);
            }
            $this->grand_total = round($this->grandtotalBeforeRound);
            $this->round_off = $this->grandtotalBeforeRound - $this->grand_total;

            if ($this->grandtotalBeforeRound > $this->grand_total) {
                $this->round_off = round($this->round_off, 2) * -1;
            }

            $this->qty = round(floatval($this->qty), 3);
            $this->total_taxable = round(floatval($this->total_taxable), 2);
            $this->total_gst = round(floatval($this->total_gst), 2);
            $this->round_off = round(floatval($this->round_off), 2);
            $this->grand_total = round((floatval($this->grand_total)) + (floatval($this->additional)), 2);
        }
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Sale::find($id);
            $this->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->invoice_no = $obj->invoice_no;
            $this->invoice_date = $obj->invoice_date;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->contact_detail_id_buyer_address=$obj->contact_detail_id;
            $this->contact_detail_address=$obj->contact_detail->address;
            $this->contact_detail_id_delivery_address=$obj->contact_detail_id_1;
            $this->contact_detail_address_1=$obj->contact_detail->address;
            $this->style_id = $obj->style_id;
            $this->style_name = $obj->style->vname;
            $this->despatch_id = $obj->despatch_id;
            $this->despatch_name = $obj->despatch->vname;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport->vname;
            $this->destination = $obj->destination;
            $this->bundle = $obj->bundle;
            $this->total_qty = $obj->total_qty;
            $this->total_taxable = $obj->total_taxable;
            $this->total_gst = $obj->total_gst;
            $this->ledger_id = $obj->ledger_id;
            $this->ledger_name = $obj->ledger->vname;
            $this->additional = $obj->additional;
            $this->round_off = $obj->round_off;
            $this->grand_total = $obj->grand_total;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }

    public function getRoute(): void
    {
        $this->redirect(route('sales'));
    }

    public function print(): void
    {

        $this->redirect(route('sales.print', [$this->vid]));
    }

    public function render()
    {
        $this->getContactList();
        $this->getOrderList();
        $this->getTransportList();
        $this->getLedgerList();
        $this->getColourList();
        $this->getProductList();
        $this->getSizeList();
        $this->getContact_detailList();
        $this->getContact_detailList_1();
        $this->getStyleList();
        $this->getDespatchList();
        return view('livewire.entries.sales.upsert');
    }
}
