<div>
    <x-slot name="header">Credit Book</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths wire:click.prevent="sortBy('vname')">Name</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('vname')">Closing</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('vname')">Action</x-table.ths>
            </x-slot>
            <x-slot name="table_body">
                @php
                    $totalBalance = 0;
                @endphp

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('creditbooks.items',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('creditbooks.items',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->vname }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('creditbooks.items',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->closing }}
                            </a>
                        </x-table.cell>

                        <x-table.action :id="$row->id"/>
                    </x-table.row>

                    @php
                        $totalBalance +=  $row->closing
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse

                <x-table.row>
                    <td colspan="2" class="px-2 text-xl text-right text-gray-400 border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="px-2 text-right  text-xl border text-red-500 border-gray-300">{{ \App\Helper\ConvertTo::rupeesFormat($totalBalance)}}</td>
                    <td class="px-2 text-right  text-xl border border-gray-300">&nbsp;</td>
                </x-table.row>

            </x-slot>
            <x-slot name="table_pagination">
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>

        <x-modal.delete/>

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'Name'"/>
            <x-input.model-text wire:model="closing" :label="'Closing'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
