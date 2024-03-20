<div>
    <x-slot name="header">Gst Credits</x-slot>

    <x-forms.m-panel>

        <div class="flex flex-row gap-3 py-3">

            <div class="flex flex-row gap-3 py-3 w-full">
                <label for="month" class="w-[8rem] text-zinc-500 tracking-wide py-2">Month</label>
                <select wire:model="month" wire:change="reRender" class="w-full purple-textbox" id="month">
                    <option class="text-zinc-500 px-1">Choose Month...</option>
                    @foreach(\App\Enums\Months::cases() as $month)
                        <option value="{{$month->value}}">{{$month->getName()}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-row gap-3 py-3 w-full">
                <label for="year" class="w-[8rem] text-zinc-500 tracking-wide px-3 py-2">Year</label>
                <select wire:model="year" wire:change="reRender" class="w-full purple-textbox" id="year">
                    <option class="text-zinc-500 px-1">Choose Year...</option>
                    @foreach(\App\Enums\Years::cases() as $year)
                        <option value="{{$year->value}}">{{$year->getName()}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('client_id')">SL.NO</x-table.ths-slno>

                <x-table.ths wire:click.prevent="sortBy('client_id')">Client</x-table.ths>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">TAX</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Opening</x-table.ths-center>

                <x-table.ths-gap wire:click.prevent="sortBy('client_id')">&nbsp;</x-table.ths-gap>

                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Sales</x-table.ths-center>

                <x-table.ths-gap wire:click.prevent="sortBy('client_id')">&nbsp;</x-table.ths-gap>

                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Purchase</x-table.ths-center>

                <x-table.ths-gap wire:click.prevent="sortBy('client_id')">&nbsp;</x-table.ths-gap>

                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Balance</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">&nbsp;</x-table.ths-center>

            </x-slot>
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $index + 1 }}
                                </p>
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->client->vname }}
                                </p>
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                <div class="flex flex-col text-gray-400 gap-1 text-sm text-center">
                                    <div class="flex px-3">
                                        IGST
                                    </div>
                                    <div class="flex px-3">
                                        CGST
                                    </div>
                                    <div class="flex px-3">
                                        SGST
                                    </div>
                                </div>
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})" class="flex w-full">
                                <div class="flex flex-col gap-1 text-gray-700 w-full justify-end text-gray-600">
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->opening_igst+0 }}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->opening_cgst+0 }}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->opening_sgst+0 }}
                                    </div>
                                </div>
                            </button>
                        </x-table.cell>

                        <td class="bg-yellow-200">
                            <div class="bg-yellow-200">&nbsp;</div>
                        </td>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})" class="flex w-full">
                                <div class="flex flex-col gap-1 text-gray-700 w-full justify-end text-gray-600">
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->sales_igst+0 }}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->sales_cgst+0 }}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->sales_sgst+0 }}
                                    </div>
                                </div>
                            </button>
                        </x-table.cell>

                        <td class="bg-yellow-200">
                            <div class="bg-yellow-200">&nbsp;</div>
                        </td>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})" class="flex w-full">
                                <div class="flex flex-col gap-1 text-gray-700 w-full justify-end text-gray-600">
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->purchase_igst+0 }}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->purchase_cgst+0 }}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->purchase_sgst+0 }}
                                    </div>
                                </div>
                            </button>
                        </x-table.cell>

                        <td class="bg-yellow-200">
                            <div class="bg-yellow-200">&nbsp;</div>
                        </td>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})" class="flex w-full">
                                <div class="flex flex-col gap-1 w-full justify-end text-gray-600">
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->opening_igst + $row->purchase_igst - $row->sales_igst +0}}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->opening_cgst + $row->purchase_cgst  - $row->sales_cgst +0}}
                                    </div>
                                    <div class="flex px-1 justify-end ">
                                        {{ $row->opening_sgst  + $row->purchase_sgst - $row->sales_sgst +0}}
                                    </div>
                                </div>
                            </button>
                        </x-table.cell>


                        <x-table.cell>
                            <div
                                class="flex w-full">
                                <p class="flex w-full text-sm justify-end p-1 {{
                                    ($row->opening_igst +$row->opening_cgst+$row->opening_sgst) +
                                    ($row->purchase_igst + $row->purchase_cgst + $row->purchase_sgst) -
                                    ($row->sales_igst +$row->sales_cgst+$row->sales_sgst)
                                     >= 0 ? 'bg-green-300':'bg-red-300' }}">

                                    {{ ($row->opening_igst +$row->opening_cgst+$row->opening_sgst) +
                                    ($row->purchase_igst + $row->purchase_cgst + $row->purchase_sgst) -
                                    ($row->sales_igst +$row->sales_cgst+$row->sales_sgst)  }}


                                </p>
                            </div>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->remarks }}
                                </p>
                            </button>
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

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="opening_igst" autofocus :label="'opening_igst'"/>
            <x-input.model-text wire:model="opening_cgst" :label="'opening_cgst'"/>
            <x-input.model-text wire:model="opening_sgst" :label="'opening_sgst'"/>

            <x-forms.section-border/>
            <x-input.model-text wire:model="sales_igst" :label="'sales_igst'"/>
            <x-input.model-text wire:model="sales_cgst" :label="'sales_cgst'"/>
            <x-input.model-text wire:model="sales_sgst" :label="'sales_sgst'"/>
            <x-forms.section-border/>
            <x-input.model-text wire:model="purchase_igst" :label="'purchase_igst'"/>
            <x-input.model-text wire:model="purchase_cgst" :label="'purchase_cgst'"/>
            <x-input.model-text wire:model="purchase_sgst" :label="'purchase_sgst'"/>
            <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
        </x-forms.create>

        <div class="flex flex-row justify-between px-5">
            <x-button.primary wire:click="generate">Generate</x-button.primary>
        </div>

    </x-forms.m-panel>
</div>
