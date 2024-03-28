<div>
    <x-slot name="header">Purchase</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table>
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('purchase_no')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Order No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Purchase NO</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Purchase Date</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Party Name</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Total Qty</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Total Taxable</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Total Gst</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('purchase_no')">Grand Total</x-table.ths-center>
                <x-table.heading>Action</x-table.heading>
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
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->order->vname}}
                            </a>
                        </x-table.cell>


                        <x-table.cell>
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->purchase_no}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->purchase_date}}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->contact->vname}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->total_qty}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->total_taxable }}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->total_gst }}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->grand_total }}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="w-full flex justify-center gap-3">
                                <x-icons.icon :icon="'printer'" wire:click="print({{$row->id}})" class="h-5 w-auto block px-1.5"/>
                                <a href="{{route('purchasesoffset.upsert',[$row->id])}}"
                                   class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                    <x-button.link >&nbsp;
                                        <x-icons.icon :icon="'pencil'"
                                                      class="text-blue-500 h-5 w-auto block"/>
                                    </x-button.link>
                                </a>
                                <x-button.link wire:click="set_delete({{$row->id}})" wire:confirm="Are you sure you want to delete this ?">&nbsp;
                                    <x-icons.icon :icon="'trash'"
                                                  class="text-red-600 h-5 w-auto block"/>
                                </x-button.link>
                            </div>
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
