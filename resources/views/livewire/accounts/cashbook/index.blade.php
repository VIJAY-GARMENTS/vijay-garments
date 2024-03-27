<div>
    <x-slot name="header">Cash Book</x-slot>

    <x-forms.m-panel>

            <div class="flex flex-row gap-2 py-2 justify-end">
                <button wire:click="create_receipt" class="w-20 font-extrabold bg-green-600 hover:bg-green-600 border-b-4 border-green-700 hover:border-green-700 focus:outline-none text-white  uppercase  shadow-md rounded-lg  py-1">Receipt</button>
                <button wire:click="create" class="w-20 font-extrabold bg-red-600 hover:bg-red-600 border-b-4 border-red-700 hover:border-red-700 focus:outline-none text-white  uppercase  shadow-md rounded-lg  py-1">Payment</button>

            </div>

        <x-forms.table :list="$list">
        <x-slot name="table_header">
            <x-table.ths wire:click.prevent="sortBy('id')">V.no</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('vdate')">Date</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('ledger')">Order No</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('ref_id')">Purpose</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('paidby')">Person</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('credit')">Receipt</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('debit')">Payment</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('debit')">Balance</x-table.ths>
            <x-table.ths wire:click.prevent="sortBy('debit')">Action</x-table.ths>
        </x-slot>

        <x-slot name="table_body">

            @forelse($list as $index=> $row)
                <tr class="hover:bg-yellow-100">

                    <x-table.cell>{{ $index+1 }}</x-table.cell>

                    <x-table.cell>{{date('d-m-Y', strtotime($row->vdate))}}</x-table.cell>
                    {{-- <x-table.cell>{{$row->vmode}}</x-table.cell>--}}

                    @if($row->order_id)
                      <x-table.cell>{{$row->order->vname}}</x-table.cell>
                    @else
                      <x-table.cell>&nbsp;-
                        </x-table.cell>
                    @endif

                  <x-table.cell>&nbsp;{{$row->remarks}}
                    </x-table.cell>


                    <x-table.cell>{{$row->paidby}}</x-table.cell>

                   <x-table.cell>

                        @if( $row->receipt == '0.00')
                            {{'-'}}
                        @else
                            {{$row->receipt}}
                        @endif

                    </x-table.cell>

                   <x-table.cell>

                        @if( $row->payment == '0.00')
                            {{'-'}}
                        @else
                            {{$row->payment}}
                        @endif

                    </x-table.cell>

                   <x-table.cell>{{$row->balance}}</x-table.cell>
                    <x-table.cell>
                        <div class="w-full flex justify-center gap-3">

                                <x-button.link wire:click="edit({{$row->id}})">&nbsp;
                                    <x-icons.icon :icon="'pencil'"
                                                  class="text-blue-500 h-5 w-auto block"/>
                                </x-button.link>
                            <x-button.link wire:click="getDelete({{$row->id}})" wire:confirm="Are you sure you want to delete this ?">&nbsp;
                                <x-icons.icon :icon="'trash'"
                                              class="text-red-600 h-5 w-auto block"/>
                            </x-button.link>
                        </div>
                    </x-table.cell>
                <tr/>
            @empty
               <x-table.empty/>
            @endforelse

        </x-slot>


        <x-slot name="table_pagination">

            {{$list->links()}}

        </x-slot>
        </x-forms.table>
    </x-forms.m-panel>

    <x-jet.modal wire:model.defer="showEditModal">
        <div class="px-6  pt-4">
            <label class="text-lg font-extrabold">{{$vmode}}</label>
            <x-forms.section-border class="py-2"/>
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <div class="flex flex-col mb-2">
                <div class="flex ">
                    <label for="order_no" class="gray-label flex">Order No</label>
                    <div x-data="{isTyped: @entangle('orderTyped')}" @click.away="isTyped = false" class="w-3/4">
                        <div class="relative">
                            <input
                                id="order_no"
                                type="search"
                                wire:model.live="order_no"
                                autocomplete="off"
                                placeholder="Order No.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementOrder"
                                wire:keydown.arrow-down="incrementOrder"
                                wire:keydown.enter="enterOrder"
                                class="ml-16 block w-full purple-textbox"
                            />

                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2 ">
                                    <div class="ml-16 block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($orderCollection)
                                                @forelse ($orderCollection as $i => $order)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightOrder === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setOrder('{{$order->vname}}','{{$order->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $order->vname }}
                                                    </li>

                                                @empty
                                                    @livewire('controls.model.order.order-model',[$order_no])
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <x-input.model-text wire:model="paidby" :label="'Person'"/>
            <x-input.model-text wire:model="payment" :label="'Payment'"/>
            <x-input.model-text wire:model="remarks" :label="'Purpose'"/>
            <div class="px-5 py-1 w-full mb-2">
                <div class="flex flex-col md:flex-row justify-between gap-3">
                    <div class="flex gap-3">
                        <x-buttons.save :vid="$vid"/>
                        <x-buttons.back/>
                    </div>
                </div>
            </div>
        </div>

    </x-jet.modal>
    <x-jet.modal wire:model.defer="showEditModal_1">
        <div class="px-6  pt-4">
            <label class="text-lg font-extrabold">{{$vmode}}</label>
            <x-forms.section-border class="py-2"/>
            <x-input.model-date wire:model="vdate" :label="'Date'"/>
            <x-input.model-text wire:model="paidby" :label="'Person'"/>
            <x-input.model-text wire:model="receipt" :label="'Receipt'"/>
            <x-input.model-text wire:model="remarks" :label="'Purpose'"/>
            <div class="px-5 py-1 w-full mb-2">
                <div class="flex flex-col md:flex-row justify-between gap-3">
                    <div class="flex gap-3">
                        <x-buttons.save :vid="$vid"/>
                        <x-buttons.back/>
                    </div>
                </div>
            </div>
        </div>

    </x-jet.modal>


    <div class="px-5 py-3">
        <button wire:click.prevent="reTotal"
                class="bg-blue-500 px-3 py-2 block text-white hover:bg-blue-400 rounded-md shadow-md">Re-total
        </button>
    </div>
</div>
