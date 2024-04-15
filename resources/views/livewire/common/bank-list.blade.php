<div>
    <x-slot name="header">Bank List</x-slot>

    <x-forms.m-panel>
        <!-- Header -------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.header-text center>Slno</x-table.header-text>
                <x-table.header-text center>Bank</x-table.header-text>
                <x-table.header-text class="w-[6rem]">Action</x-table.header-text>
            </x-slot>

            <!-- Table Body -------------------------------------------------------------------------------------------->
            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)

                    <x-table.row>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $index + 1 }}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->vname}}
                            </p>
                        </x-table.cell>

                        <x-table.action :id="$row->id"/>
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

        <!-- Popup View -------------------------------------------------------------------------------------------->
        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'Bank'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
