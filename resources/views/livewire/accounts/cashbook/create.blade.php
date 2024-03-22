<div>
    <x-slot name="header">Create Cashbook</x-slot>
    <x-forms.m-panel>

            @if($vmode == 'payment')
                <div class="flex grid grid-cols-2 gap-2">
                    <div class="flex flex-col gap-3 ">
                        <div class="flex gap-2 ">
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
                                        class="block w-full purple-textbox"
                                    />

                                    <div x-show="isTyped"
                                         x-transition:leave="transition ease-in duration-100"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0"
                                         x-cloak
                                    >
                                        <div class="absolute z-20 w-full mt-2">
                                            <div class="block py-1 shadow-md w-full
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

                    <input type="date" wire:model="vdate" id="vdate"
                           class="purple-textbox @error('vdate') ? purple-textbox  : red-textbox @enderror"
                    />
                    @error('vdate') <span class="error-label">{{ $message }}</span> @enderror
                </div>

            @else
            <div class="w-1/3 flex">
                <label for="vdate" class="gray-label">Date</label>

                <input type="date" wire:model="vdate" id="vdate"
                       class="w-full purple-textbox @error('vdate') ? purple-textbox  : red-textbox @enderror"
                />
                @error('vdate') <span class="error-label">{{ $message }}</span> @enderror
            </div>
            @endif

        <!-- ref_id ---------------->

            @if($vmode == 'payment')

                @if($cashbills)
                    <label for="cashbill_id" class="gray-label">Reference</label>

                        @livewire('controls.lookup.accounts.cashbill-lookup',[$order_id])

                @endif
            @endif

        <!-- paidby ---------------->
            <div class="w-1/3 flex">
            <label for="paidby" class="gray-label">Person</label>

            <input type="text" wire:model="paidby" id="paidby" autofocus
                   class="w-full purple-textbox @error('paidby') ? purple-textbox  : red-textbox @enderror"
                   placeholder="Paid by"/>
            @error('paidby') <span class="error-label">{{ $message }}</span> @enderror
            </div>
        <!-- credit ---------------->

            @if($vmode == 'receipt')
                    <div class="w-1/3 flex">
                <label for="receipt" class="gray-label">Receipt</label>

                <input type="text" wire:model="receipt" id="receipt"
                       class="w-full purple-textbox @error('receipt') ? purple-textbox  : red-textbox @enderror"
                       placeholder="Receipt"/>
                @error('receipt') <span class="error-label">{{ $message }}</span> @enderror
                    </div>
            <!-- debit ---------------->

            @elseif($vmode == 'payment')
                    <div class="w-1/3 flex ">
                <label for="payment" class="gray-label">Payment</label>

                <input type="text" wire:model="payment" id="payment"
                       class="w-full purple-textbox @error('payment') ? purple-textbox  : red-textbox @enderror"
                       placeholder="Payment"/>
                @error('payment') <span class="error-label">{{ $message }}</span> @enderror
                    </div>
            @endif
          <div class="w-1/4">
           <x-input.model-text wire:model="remarks" :label="'Purpose'"/>
          </div>
    </x-forms.m-panel>
    <div class="px-8 py-6 gap-4 bg-gray-100 rounded-b-md shadow-lg w-full ">

        <div class="flex flex-col md:flex-row justify-between gap-3">
            <div class="flex gap-3">
                <x-buttons.save :vid="$vid"/>
                <x-buttons.back/>
            </div>
            <div>
                    <x-buttons.delete/>
            </div>

        </div>
    </div>
</div>
