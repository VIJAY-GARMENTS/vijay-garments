<div>
    <x-slot name="header">Sales Bill Items</x-slot>

    <div class="w-full rounded-md bg-green-300">
        <div class="p-2 pt-2 rounded-md space-y-4 bg-green-200">
            <div class="flex flex-row gap-5">
                <x-button.new/>
                <button wire:click="refreshItems" class="bg-purple-500 px-2 py-2 rounded-md text-white">Refresh</button>

            </div>

            <x-forms.table :list="$list">
                <x-slot name="table_header">
                    <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                    <x-table.ths-center wire:click.prevent="sortBy('vname')">Product</x-table.ths-center>
                    <x-table.ths-center wire:click.prevent="sortBy('vname')">Qty</x-table.ths-center>
                    <x-table.ths-center wire:click.prevent="sortBy('vname')">Price</x-table.ths-center>
                    <x-table.ths-center wire:click.prevent="sortBy('vname')">Margin</x-table.ths-center>
                    <x-table.ths-center wire:click.prevent="sortBy('vname')">Action</x-table.ths-center>
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
                                    {{($row->margin)}}
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
                </x-slot>
            </x-forms.table>

            <x-modal.delete/>

            <x-forms.create :id="$vid">
                <x-input.model-text wire:model="serial" :label="'Serial'"/>
                <x-input.model-select wire:model="product_id" :label="'Product'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->vname}}</option>
                    @endforeach
                </x-input.model-select>

                <x-input.model-select wire:model="category_id" :label="'category'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->vname}}</option>
                    @endforeach
                </x-input.model-select>

                <x-input.model-select wire:model="colour_id" :label="'colour'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($colours as $colour)
                        <option value="{{$colour->id}}">{{$colour->vname}}</option>
                    @endforeach
                </x-input.model-select>

                <x-input.model-select wire:model="size_id" :label="'size'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach($sizes as $size)
                        <option value="{{$size->id}}">{{$size->vname}}</option>
                    @endforeach
                </x-input.model-select>

                <x-input.model-text wire:model="qty" :label="'Qty'"/>
                <x-input.model-text wire:model="price" :label="'price'"/>
                <x-input.model-text wire:model="margin" :label="'Margin'"/>

            </x-forms.create>

        </div>
    </div>
</div>
