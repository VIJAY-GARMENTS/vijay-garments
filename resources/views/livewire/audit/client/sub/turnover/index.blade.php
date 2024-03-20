<div>
    <x-slot name="header">Bank</x-slot>

    <x-forms.table :list="$list">
        <x-slot name="table_header">
            <x-table.ths-slno wire:click.prevent="sortBy('vname')">Month</x-table.ths-slno>
            <x-table.ths-center wire:click.prevent="sortBy('vname')">Turnover</x-table.ths-center>
            <x-table.ths-center wire:click.prevent="sortBy('vname')">Achieved</x-table.ths-center>
            <x-table.ths-center wire:click.prevent="sortBy('vname')">Action</x-table.ths-center>
        </x-slot>

        <x-slot name="table_body">
            @php
                $target_total = 0;
                $achieved_total = 0;
            @endphp

            @forelse ($list as $index =>  $row)
                <x-table.row>

                    <x-table.cell>
                        <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                            {{ \App\Enums\Months::tryFrom($row->month)->getName()}}
                        </p>
                    </x-table.cell>

                    <x-table.cell>
                        <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                            {{ $row->target}}
                        </p>
                    </x-table.cell>

                    <x-table.cell>
                        <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                            {{ $row->achieved}}
                        </p>
                    </x-table.cell>
                    <x-table.action :id="$row->id"/>
                </x-table.row>
                @php
                    $target_total +=$row->target +0;
                  $achieved_total += $row->achieved +0;
                @endphp

            @empty
                <x-table.empty/>
            @endforelse

            <x-table.row>
                <td class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;
                </td>
                <td class="px-2 text-right  text-xl border text-red-500 border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($target_total)}}</td>
                <td class="px-2 text-right  text-xl border text-red-500 border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($achieved_total)}}</td>
                <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
            </x-table.row>

            <x-table.row>
                <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                <td colspan="2" class="px-2 text-center  text-xl border text-green-500 border-gray-300">
                    {{ \App\Helper\ConvertTo::rupeesFormat($target_total - $achieved_total)}}
                </td>
                <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
            </x-table.row>


        </x-slot>
    </x-forms.table>

    <x-forms.create :id="$vid">
        <x-input.model-text wire:model="target" autofocus :label="'target'"/>
        <x-input.model-text wire:model="achieved" :label="'achieved'"/>
        <x-input.model-text wire:model="remarks" :label="'remarks'"/>
    </x-forms.create>
</div>
