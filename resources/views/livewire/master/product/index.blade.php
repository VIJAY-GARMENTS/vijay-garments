<div>
    <x-slot name="header">Product</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table>
            <x-slot name="table_header">
                <x-table.ths-slno>Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Product Name</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('product_type')">Product type</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Hsn Code</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('units')">Unit of Measure</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('gst_percent')">Gst Percent</x-table.ths-center>
                <x-table.ths-center >Action</x-table.ths-center>
            </x-slot>
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>
                        <x-table.cell>
                            <a href="{{route('products.upsert',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $index + 1 }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('products.upsert',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->vname }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('products.upsert',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ \App\Enums\ProductType::tryFrom($row->product_type)->getName()}}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('products.upsert',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->hsncode->vname }}
                            </a>
                        </x-table.cell>



                        <x-table.cell>
                            <a href="{{route('products.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-left">
                                {{\App\Enums\Units::tryFrom($row->units)->getName()}}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('products.upsert',[$row->id])}}"
                               class="flex flex-col px-3 text-gray-600 truncate text-xl text-center">
                                {{ \App\Enums\GstPercent::tryFrom($row->gst_percent)->getName()}}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                                <div class="w-full flex justify-center gap-3">
                            <a href="{{route('products.upsert',[$row->id])}}"
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
