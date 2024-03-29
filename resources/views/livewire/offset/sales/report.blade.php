<div>
    <x-slot name="header">Sales Report</x-slot>

    <x-forms.m-panel>
        <div class="flex justify-center w-full">
            <div class="flex">
                <x-input.model-date wire:model.live="start_date" :label="'From'"/>
                <div class="ml-3">
                <x-input.model-date wire:model.live="end_date" :label="'To'"/>
                </div>
            </div>
            <div class="ml-3">
                <x-input.model-select wire:model.live="by_company" :label="'Party'">
                    <option value="">choose</option>
                    @foreach($contact as $i)
                        <option value="{{$i->id}}" >{{$i->vname}}</option>
                    @endforeach
                </x-input.model-select>
            </div>
            <div class="ml-3">
                <x-input.model-select wire:model.live="byOrder" :label="'Order No'">
                    <option value="">choose</option>
                    @foreach($orders as $i)
                        <option value="{{$i->id}}" >{{$i->vname}}</option>
                    @endforeach
                </x-input.model-select>
            </div>
            <div class="ml-auto mr-2">
                <button wire:click="export" class="bg-blue-600 flex rounded-lg px-5 py-3 text-white"><x-icons.icon :icon="'arrow-down'" class="h-6 w-auto block"/><div class="pl-2">Export</div></button>
            </div>

        </div>

        <x-forms.table>
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('invoice_no')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Order No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Invoice NO</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Invoice Date</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Party Name</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Total Qty</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Total Taxable</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Total Gst</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('invoice_no')">Grand Total</x-table.ths-center>
            </x-slot>

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>
                        <x-table.cell>
                            <a href=""
                               class="flex px-3 text-gray-600 truncate text-xl text-center">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->order->vname}}
                            </a>
                        </x-table.cell>


                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->invoice_no}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->invoice_date}}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->contact->vname}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->total_qty}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->total_taxable }}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->total_gst }}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{route('sales.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->grand_total }}
                            </a>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
    </x-forms.m-panel>

</div>
