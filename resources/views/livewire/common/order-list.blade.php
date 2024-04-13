<div>
    <x-slot name="header">Order</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Order No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Order Name</x-table.ths-center>
                <x-table.heading class="w-[12rem]">Progress</x-table.heading>
                <x-table.heading class="w-[12rem]">Action</x-table.heading>
            </x-slot>

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
                        <x-table.cell>
                            <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $row->order_name}}
                            </p>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('orders.job-details',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl  justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M15.28 9.47a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L13.69 10 9.97 6.28a.75.75 0 0 1 1.06-1.06l4.25 4.25ZM6.03 5.22l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L8.69 10 4.97 6.28a.75.75 0 0 1 1.06-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </a>
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

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'Order No'"/>
            <x-input.model-text wire:model="order_name" :label="'Order Name'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
