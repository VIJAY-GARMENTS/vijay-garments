<div>
    <x-slot name="header">Receipt</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls-filter :show-filters="$showFilters" />
        <x-input.advance-search-filter :show-filters="$showFilters" :contacts="$contacts" :orders="''">
            <div>
                <x-input.model-select wire:model.live="byModel" :label="'Model'">
                    <option value="">choose</option>
                    @foreach($receipt_types as $i)
                        <option value="{{$i->id}}">{{$i->vname}}</option>
                    @endforeach
                </x-input.model-select>
            </div>
        </x-input.advance-search-filter>
        <x-forms.table>
            <x-slot name="table_header">
                <x-table.ths wire:click.prevent="sortBy('vname')">Sl No</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('vname')">Date</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('vname')">Party Name</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('vname')">Model</x-table.ths>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Amount</x-table.ths-center>
                <x-table.ths-center>Action</x-table.ths-center>
            </x-slot>
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('receipts.upsert',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $index+1}}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('receipts.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-left">
                                {{date('d-m-Y', strtotime($row->vdate))}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('receipts.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->contact->vname }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('receipts.upsert',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->receipttype->vname}}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('receipts.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ $row->receipt_amount}}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="w-full flex justify-center gap-3">
                                <a href="{{route('receipts.upsert',[$row->id])}}"
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

        <x-modal.delete/>
    </x-forms.m-panel>
</div>
