<div>
    <x-slot name="header">Sales Bill Items</x-slot>

    <x-forms.m-panel>

        <!-- Table -->
        <div class="flex-col space-y-4 mt-10">
            <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-cool-gray-200">
                    <tbody class="border-none">

                    <x-table.row>
                        <x-table.cell class="w-36">
                            <div class="flex px-3">
                                <p class="text-gray-400 truncate text-xl text-left">
                                    Bill To
                                </p>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex px-3 justify-between gap-3">
                                <p class="text-gray-600 truncate text-xl text-left">
                                    {{$sales_track_bill->client->vname}}
                                </p>
                            </div>
                        </x-table.cell>
                        <x-table.cell class="w-36">
                            <div class="flex px-3">
                                <p class="text-gray-400 truncate text-xl text-left">
                                    Bill No
                                </p>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex px-3 justify-between gap-3">
                                <p class="text-gray-600 truncate text-xl text-left">
                                    {{$sales_track_bill->vno}}
                                </p>
                            </div>
                        </x-table.cell>
                    </x-table.row>

                    <x-table.row>
                        <x-table.cell class="w-36">
                            <div class="flex px-3">
                                <p class="text-gray-400 truncate text-xl text-left">
                                    Vehicle
                                </p>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex px-3 justify-between gap-3">
                                <p class="text-gray-600 truncate text-xl text-left">
                                    {{$sales_track_bill->vehicle}}
                                </p>
                            </div>
                        </x-table.cell>
                        <x-table.cell class="w-36">
                            <div class="flex px-3">
                                <p class="text-gray-400 truncate text-xl text-left">
                                    Bill Date
                                </p>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex px-3 justify-between gap-3">
                                <p class="text-gray-600 truncate text-xl text-left">
                                    {{$sales_track_bill->vdate ?  date('d-m-Y',strtotime($sales_track_bill->vdate)) : '' }}
                                </p>
                            </div>
                        </x-table.cell>
                    </x-table.row>

                    </tbody>
                </table>
            </div>
        </div>


        <div>
            <x-button.new/>
        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Product</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Qty</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Price</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Total</x-table.ths-center>
            </x-slot>

            <x-slot name="table_body">

                @php
                    $subTotal = 0;
$gst='';
                    $total_qty = 0;
                    $total_taxable = 0;
                    $total_gst = 0;
                    $grandTotalBeforeRound = 0;
                    $grandTotal = 0;
                    $rounds = 0;

                @endphp

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->serial }}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->product->vname}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl justify-center">
                                {{ $row->qty+0}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl justify-end">
                                {{ $row->price+0}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-1 text-gray-600 truncate text-xl justify-end">
                                {{round(($row->qty+0) * ($row->price+0),2)}}
                            </p>
                        </x-table.cell>

                        <x-table.action :id="$row->id"/>
                    </x-table.row>

                    @php
                        $gst = \App\Enums\GstPercent::tryFrom($row->product->gst_percent)->getTax();

                        $total_taxable += round(($row->qty+0) * ($row->price+0),2);

                        $total_qty += ($row->qty+0);
                        $total_gst = round(($total_taxable)* ($gst/ 100),2);

                        $grandTotalBeforeRound = round($total_taxable,2)+ round($total_gst,2);

                        $grandTotal = round($grandTotalBeforeRound);

                        $rounds = $grandTotalBeforeRound - $grandTotal;

                        if ($grandTotalBeforeRound > $grandTotal) {
                         $rounds = round($rounds, 2) * -1;
                         }

                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <td colspan="2" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTAL&nbsp;Qty&nbsp;&nbsp;
                    </td>
                    <td class="px-3 text-right  text-xl border text-blue-500 border-gray-300">{{ $total_qty}}</td>
                    <td colspan="3" class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>


                <x-table.row>
                    <td colspan="4" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="px-3 text-right  text-xl border text-blue-500 border-gray-300">{{ $total_taxable}}</td>
                    <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>

                <x-table.row>
                    <td colspan="4" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;GST&nbsp;&nbsp;&nbsp;
                        @ {{$gst}}%
                    </td>
                    <td class="px-3 text-right  text-xl border text-blue-500 border-gray-300">{{($total_gst)}}</td>
                    <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>

                <x-table.row>
                    <td colspan="4" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;Round&nbsp;Off&nbsp;</td>
                    <td class="px-3 text-right  text-xl border text-red-500 border-gray-300">{{round($rounds,2)}}</td>
                    <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>

                <x-table.row>
                    <td colspan="4" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;Grand
                        Total&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="px-3 text-right  text-xl border text-red-500 border-gray-300">{{ConvertTo::rupeesFormat($grandTotal)}}</td>
                    <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>

            </x-slot>
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <div class="flex justify-between pt-1">
            <div>
                <a href="{{route('salesTracks.bills',[$sales_track_bill->sales_track_item_id] )}}" class="bg-gray-400 text-white tracking-wider px-4 py-1
                rounded-md flex items-center w-24 hover:bg-gray-500">
                    <x-aaranUi::icons.icon :icon="'chevrons-left'" class="h-8 w-auto inline-block items-center"/>
                    Back
                </a>
            </div>

            <div>
                <button wire:click.prevent="markAsEntered"
                    class="bg-green-400 text-white tracking-wider px-4 py-1 rounded-md flex items-center hover:bg-red-500">
                    <x-aaranUi::icons.icon :icon="'annotation'" class="h-8 px-3 w-auto inline-block items-center"/>
                    Mark as Entered
                </button>
            </div>
        </div>

        <x-modal.delete/>

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="serial" :label="'Serial'"/>
            <x-input.model-select wire:model="product_id" :label="'Product'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-text wire:model="qty" :label="'Qty'"/>
            <x-input.model-text wire:model="price" :label="'price'"/>

        </x-forms.create>





    </x-forms.m-panel>
</div>
