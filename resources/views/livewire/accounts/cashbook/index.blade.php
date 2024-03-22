<div>
    <x-slot name="header">Cash Book</x-slot>

    <x-forms.m-panel>

            <div class="flex flex-row gap-2 py-2 justify-end">
                <x-buttons.common-btn :clicks="'receiptEntry'" :str="'Receipt'" colour="green" icon="plus"/>
                <x-buttons.common-btn :clicks="'paymentEntry'" :str="'Payment'" colour="red" icon="plus"/>
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
        </x-slot>

        <x-slot name="table_body">

            @forelse($list as $row)
                <tr class="hover:bg-yellow-100">

                    <x-table.td-center
                        :route="route('cashbooks.edit',[$row->id])">{{$row->id}}</x-table.td-center>

                    <x-table.td-left
                        :route="route('cashbooks.edit',[$row->id])">{{date('d-m-Y', strtotime($row->vdate))}}</x-table.td-left>
                    {{-- <x-table.td-left :route="route('cashbooks.edit',[$row->id])">{{$row->vmode}}</x-table.td-left>--}}

                    @if($row->order_id)
                        <x-table.td-left
                            :route="route('cashbooks.edit',[$row->id])">{{$row->order->vname}}</x-table.td-left>
                    @else
                        <x-table.td-left
                            :route="route('cashbooks.edit',[$row->id])">&nbsp;-
                        </x-table.td-left>
                    @endif

                    <x-table.td-left
                            :route="route('cashbooks.edit',[$row->id])">&nbsp;{{$row->remarks}}
                    </x-table.td-left>


                    <x-table.td-left :route="route('cashbooks.edit',[$row->id])">{{$row->paidby}}</x-table.td-left>

                    <x-table.td-right :route="route('cashbooks.edit',[$row->id])">

                        @if( $row->receipt == '0.00')
                            {{'-'}}
                        @else
                            {{$row->receipt}}
                        @endif

                    </x-table.td-right>

                    <x-table.td-right :route="route('cashbooks.edit',[$row->id])">

                        @if( $row->payment == '0.00')
                            {{'-'}}
                        @else
                            {{$row->payment}}
                        @endif

                    </x-table.td-right>

                    <x-table.td-right :route="route('cashbooks.edit',[$row->id])">{{$row->balance}}</x-table.td-right>
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

    <div class="px-5 py-3">
        <button wire:click.prevent="reTotal"
                class="bg-blue-500 px-3 py-2 block text-white hover:bg-blue-400 rounded-md shadow-md">Re-total
        </button>
    </div>

</div>
