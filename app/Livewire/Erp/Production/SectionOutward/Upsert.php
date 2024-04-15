<?php

namespace App\Livewire\Erp\Production\SectionOutward;

use Aaran\Erp\Models\Production\Jobcard;
use Aaran\Erp\Models\Production\JobcardItem;
use Aaran\Erp\Models\Production\PeInwardItem;
use Aaran\Erp\Models\Production\SectionOutward;
use Aaran\Erp\Models\Production\SectionOutwardItem;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Upsert extends Component
{
    //
    // Contact
    //
    public string $contact_name = '';
    public string $contact_id = '';
    public Collection $contactCollection;
    public int $highlightContact = 0;
    public bool $contactTyped = false;

    public function incrementContact(): void
    {
        if ($this->highlightContact === count($this->contactCollection) - 1) {
            $this->highlightContact = 0;
            return;
        }
        $this->highlightContact++;
    }

    public function decrementContact(): void
    {
        if ($this->highlightContact === 0) {
            $this->highlightContact = count($this->contactCollection) - 1;
            return;
        }
        $this->highlightContact--;
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

        $this->contact_name = $obj['vname'] ?? '';;
        $this->contact_id = $obj['id'] ?? '';;
    }

    public function getContactList(): void
    {
        $this->contactCollection = $this->contact_name ? Contact::search(trim($this->contact_name))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Contact::all()->where('company_id','=',session()->get('company_id'));
    }

    #[On('refresh-contact')]
    public function refreshContact($v): void
    {
        $this->contact_id = $v['id'];
        $this->contact_name = $v['name'];
        $this->contactTyped = false;
    }

    //
    // Order no
    //
    public $order_id = '';
    public $order_no = '';
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

    public function enterOrder(): void
    {
        $obj = $this->orderCollection[$this->highlightOrder] ?? null;

        $this->order_no = '';
        $this->orderCollection = Collection::empty();
        $this->highlightOrder = 0;

        $this->order_no = $obj['vname'] ?? '';;
        $this->order_id = $obj['id'] ?? '';;
    }

    public function setOrder($name, $id): void
    {
        $this->order_no = $name;
        $this->order_id = $id;
        $this->getOrderList();
    }

    #[On('refresh-order')]
    public function refreshOrder($v): void
    {
        $this->order_id = $v['id'];
        $this->order_no = $v['name'];
        $this->orderTyped = false;

    }

    public function getOrderList(): void
    {
        $this->orderCollection = $this->order_no ? Order::search(trim($this->order_no))
            ->where('company_id', '=', session()->get('company_id'))->get()
            : Order::all()->where('company_id','=',session()->get('company_id'));
    }


    //
    // Job Card
    //
    public string $jobcard_id = '';
    public string $jobcard_no = '';
    public Collection $jobcardCollection;
    public int $highlightJobcard = 0;
    public bool $jobcardTyped = false;

    public function incrementJobcard(): void
    {
        if ($this->highlightJobcard === count($this->jobcardCollection) - 1) {
            $this->highlightJobcard = 0;
            return;
        }
        $this->highlightJobcard++;
    }

    public function decrementJobcard(): void
    {
        if ($this->highlightJobcard === 0) {
            $this->highlightJobcard = count($this->jobcardCollection) - 1;
            return;
        }
        $this->highlightJobcard--;
    }

    public function setJobcard($name, $id): void
    {
        $this->jobcard_no = $name;
        $this->jobcard_id = $id;
        $this->getJobcardList();
    }

    public function enterJobcard(): void
    {
        $obj = $this->jobcardCollection[$this->highlightJobcard] ?? null;

        $this->jobcard_no = '';
        $this->jobcardCollection = Collection::empty();
        $this->highlightJobcard = 0;

        $this->jobcard_no = $obj['vname'] ?? '';;
        $this->jobcard_id = $obj['id'] ?? '';;
    }

    public function getJobcardList(): void
    {
        $this->jobcardCollection = $this->jobcard_no ? Jobcard::search(trim($this->jobcard_no))
            ->where('company_id', '=', session()->get('company_id'))
            ->where('order_id', '=', $this->order_id ?: '1')
            ->get() :
            Jobcard::where('company_id', '=', session()->get('company_id'))->get();
    }

    #[On('refresh-jobcard')]
    public function refreshJobcard($v): void
    {
        $this->jobcard_id = $v['id'];
        $this->jobcard_no = $v['name'];
        $this->jobcardTyped = false;
    }
    //
    // pe inward item
    //
    public string $pe_inward_id = '';
    public string $pe_inward_no = '';
    public Collection $peInwardCollection;
    public int $highlightPeInward = 0;
    public bool $inwardTyped = false;

    public function incrementPeInward(): void
    {
        if ($this->highlightPeInward === count($this->peInwardCollection) - 1) {
            $this->highlightPeInward = 0;
            return;
        }
        $this->highlightPeInward++;
    }

    public function decrementPeInward(): void
    {
        if ($this->highlightPeInward === 0) {
            $this->highlightPeInward = count($this->peInwardCollection) - 1;
            return;
        }
        $this->highlightPeInward--;
    }

    public function setPeInwardItem($jobcard_item_id, $pe_inward_item_id, $pe_inward_no, $colour_id, $colour_name, $size_id, $size_name, $qty): void
    {
        $this->jobcard_item_id = $jobcard_item_id;
        $this->pe_inward_item_id = $pe_inward_item_id;
        $this->pe_inward_no = $pe_inward_no;
        $this->colour_id = $colour_id;
        $this->colour_name = $colour_name;
        $this->size_id = $size_id;
        $this->size_name = $size_name;
        $this->qty = $qty;
    }

    public function enterPeInward(): void
    {
        $obj = $this->peInwardCollection[$this->highlightPeInward] ?? null;

        $this->pe_inward_no = '';
        $this->peInwardCollection = Collection::empty();
        $this->highlightPeInward = 0;

        $this->jobcard_item_id = $obj['jobcard_item_id'] ?? '';;
        $this->pe_inward_item_id = $obj['pe_inward_item_id'] ?? '';;
        $this->pe_inward_no = $obj['pe_inward_no'] ?? '';;
        $this->colour_id = $obj['colour_id'] ?? '';;
        $this->colour_name = $obj['colour_name'] ?? '';;
        $this->size_id = $obj['size_id'] ?? '';;
        $this->size_name = $obj['size_name'] ?? '';;
        $this->qty = $obj['qty'] ?? '';;
    }

    public function getPeInwardList(): void
    {

        $data = DB::table('pe_inward_items')
            ->select(
                'pe_inward_items.*',
                'pe_inwards.vno as pe_inward_no',
                'colours.vname as colour_name',
                'sizes.vname as size_name',
            )
            ->join('pe_inwards', 'pe_inwards.id', '=', 'pe_inward_items.pe_inward_id')
            ->join('jobcard_items', 'jobcard_items.id', '=', 'pe_inward_items.jobcard_item_id')
            ->join('colours', 'colours.id', '=', 'pe_inward_items.colour_id')
            ->join('sizes', 'sizes.id', '=', 'pe_inward_items.size_id')
            ->where('pe_inwards.jobcard_id', '=', $this->jobcard_id)
            ->where('pe_inwards.company_id', '=', session()->get('company_id'))
            ->get()
            ->transform(function ($data) {
                return [
                    'jobcard_item_id' => $data->jobcard_item_id,
                    'pe_inward_item_id' => $data->id,
                    'pe_inward_no' => $data->pe_inward_no,
                    'colour_id' => $data->colour_id,
                    'colour_name' => $data->colour_name,
                    'size_id' => $data->size_id,
                    'size_name' => $data->size_name,
                    'qty' => $data->pending_qty + 0,
                ];
            });

        $this->peInwardCollection = $data;

    }
    //
    // properties
    //
    public string $vno = '';
    public string $vdate = '';
    public mixed $total_qty = 0;
    public mixed $receiver_details = '';
    public string $active_id = '1';
    public string $vid = '';

    public function mount($id)
    {
        $this->vno = SectionOutward::nextNo();
        $this->vdate = Carbon::parse(Carbon::now())->format('Y-m-d');

        if ($id != 0) {

            $obj = SectionOutward::find($id);
            $this->vid = $obj->id;
            $this->vno = $obj->vno;
            $this->vdate = $obj->vdate;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->order_no = $obj->jobcard->order->vname;
            $this->jobcard_id = $obj->jobcard_id;
            $this->jobcard_no = $obj->jobcard->vno;
            $this->total_qty = $obj->total_qty;
            $this->receiver_details = $obj->receiver_details;

            $data = DB::table('section_outward_items')
                ->select(
                    'section_outward_items.*',
                    'section_outwards.vno as section_outwards_no',
                    'pe_inwards.vno as pe_inward_no',
                    'colours.vname as colour_name',
                    'sizes.vname as size_name',
                )
                ->join('pe_inward_items', 'pe_inward_items.id', '=', 'section_outward_items.pe_inward_item_id')
                ->join('pe_inwards', 'pe_inwards.id', '=', 'pe_inward_items.pe_inward_id')
                ->join('section_outwards', 'section_outwards.id', '=', 'section_outward_items.section_outward_id')
                ->join('colours', 'colours.id', '=', 'section_outward_items.colour_id')
                ->join('sizes', 'sizes.id', '=', 'section_outward_items.size_id')
                ->where('section_outward_id', '=', $id)
                ->where('section_outwards.company_id', '=', session()->get('company_id'))
                ->get()
                ->transform(function ($data) {
                    return [
                        'jobcard_item_id' => $data->jobcard_item_id,
                        'pe_inward_item_id' => $data->pe_inward_item_id,
                        'section_outwards_no' => $data->section_outwards_no,
                        'pe_inward_no' => $data->pe_inward_no,
                        'colour_id' => $data->colour_id,
                        'colour_name' => $data->colour_name,
                        'size_id' => $data->size_id,
                        'size_name' => $data->size_name,
                        'qty' => $data->qty,
                    ];
                });

            $this->itemList = $data;
        }
    }


    public string $itemIndex = "";
    public $itemList = [];

    public $jobcard_item_id;
    public $pe_inward_item_id;
    public $colour_id;
    public $colour_name;
    public $size_id;
    public $size_name;
    public $qty;


    public function addItems(): void
    {
        if ($this->itemIndex == "") {
            if (!(empty($this->colour_name)) &&
                !(empty($this->size_name)) &&
                !(empty($this->qty))
            ) {
                $this->itemList[] = [
                    'jobcard_item_id' => $this->jobcard_item_id,
                    'pe_inward_item_id' => $this->pe_inward_item_id,
                    'pe_inward_id' => $this->pe_inward_id,
                    'pe_inward_no' => $this->pe_inward_no,
                    'colour_id' => $this->colour_id,
                    'colour_name' => $this->colour_name,
                    'size_id' => $this->size_id,
                    'size_name' => $this->size_name,
                    'qty' => $this->qty,
                ];
            }
        } else {
            $this->itemList[$this->itemIndex] = [
                'jobcard_item_id' => $this->jobcard_item_id,
                'pe_inward_item_id' => $this->pe_inward_item_id,
                'pe_inward_id' => $this->pe_inward_id,
                'pe_inward_no' => $this->pe_inward_no,
                'colour_id' => $this->colour_id,
                'colour_name' => $this->colour_name,
                'size_id' => $this->size_id,
                'size_name' => $this->size_name,
                'qty' => $this->qty,
            ];
        }
        $this->calculateTotal();
        $this->resetsItems();
        $this->render();
        //$this->emit('getfocus');
    }

    public function resetsItems(): void
    {
        $this->jobcard_item_id = '';
        $this->pe_inward_item_id = '';
        $this->pe_inward_id = '';
        $this->pe_inward_no = '';
        $this->colour_id = '';
        $this->colour_name = '';
        $this->size_id = '';
        $this->size_name = '';
        $this->qty = '';
    }

    public function changeItems($index): void
    {
        $this->itemIndex = $index;
        $items = $this->itemList[$index];
        $this->jobcard_item_id = $items['jobcard_item_id'];
        $this->pe_inward_item_id = $items['pe_inward_item_id'];
        $this->pe_inward_no = $items['pe_inward_no'];
        $this->colour_id = $items['colour_id'];
        $this->colour_name = $items['colour_name'];
        $this->size_id = $items['size_id'];
        $this->size_name = $items['size_name'];
        $this->qty = $items['qty'] + 0;
        $this->calculateTotal();
    }

    public function removeItems($index): void
    {
        unset($this->itemList[$index]);
        $this->itemList = collect($this->itemList);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        if ($this->itemList) {
            $this->total_qty = 0;
            foreach ($this->itemList as $row) {
                $this->total_qty += round(floatval($row['qty']), 3);
            }
        }
    }

    public function save(): string
    {
        if (session()->has('company_id')) {

            if ($this->contact_id != '') {

                if ($this->vid == "") {

                    $obj = SectionOutward::create([
                        'vno' => $this->vno,
                        'vdate' => $this->vdate,
                        'contact_id' => $this->contact_id,
                        'jobcard_id' => $this->jobcard_id,
                        'total_qty' => $this->total_qty,
                        'receiver_details' => $this->receiver_details,
                        'active_id' => $this->active_id,
                        'company_id' => session()->get('company_id'),
                        'user_id' => \Auth::id(),
                    ]);
                    $this->saveItem($obj->id);

                    $message = "Saved";

                } else {
                    $obj = SectionOutward::find($this->vid);
                    $obj->vno = $this->vno;
                    $obj->vdate = $this->vdate;
                    $obj->contact_id = $this->contact_id;
                    $obj->jobcard_id = $this->jobcard_id;
                    $obj->total_qty = $this->total_qty;
                    $obj->receiver_details = $this->receiver_details;
                    $obj->active_id = $this->active_id ?: '0';
                    $obj->company_id = session()->get('company_id');
                    $obj->user_id = \Auth::id();
                    $obj->save();

                    DB::table('section_outward_items')->where('section_outward_id', '=', $obj->id)->delete();
                    $this->saveItem($obj->id);
                    $message = "Updated";
                }
                $this->getRoute();
                $this->vno = '';
                $this->vdate = '';
                $this->contact_id = '';
                $this->jobcard_id = '';
                $this->total_qty = '';
                return $message;
            }
        }
        return '';
    }

    public function saveItem($id): void
    {
        foreach ($this->itemList as $sub) {
            SectionOutwardItem::create([
                'section_outward_id' => $id,
                'jobcard_item_id' => $sub['jobcard_item_id'],
                'pe_inward_item_id' => $sub['pe_inward_item_id'],
                'colour_id' => $sub['colour_id'],
                'size_id' => $sub['size_id'],
                'qty' => $sub['qty'],
                'pending_qty' => $sub['qty'],
                'active_id' => '1',
            ]);

            $sum = SectionOutwardItem::where('jobcard_item_id', $sub['jobcard_item_id'])->sum('qty');

            $item = JobcardItem::find($sub['jobcard_item_id']);
            $item->se_out_qty = $item->qty - $sum;
            $item->save();


            $sum_1 = SectionOutwardItem::where('pe_inward_item_id', $sub['pe_inward_item_id'])->sum('qty');

            $item_1 = PeInwardItem::find($sub['pe_inward_item_id']);
            $item_1->pending_qty = $item_1->qty - $sum_1;
            $item_1->save();
        }
    }

    public function getRoute(): void
    {
        $this->redirect(route('sectionoutwards'));
    }


    public function print(): void
    {

        $this->redirect(route('sectionoutwards.print', [$this->vid]));
    }

    public function render()
    {
        $this->getContactList();
        $this->getOrderList();
        $this->getJobcardList();
        $this->getPeInwardList();
        return view('livewire.erp.production.section-outward.upsert');
    }
}
