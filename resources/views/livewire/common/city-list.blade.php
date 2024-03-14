<div>
    <x-slot name="header">City</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>
        <div class="relative">
        <x-forms.table :list="$list">

            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">
                    <div class="flex items-center justify-center">
                    <div>Sl.no</div>
                @if($sortField==='vname')
                    <div class="text-gray-400 ">
                        @if($sortAsc)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                            </svg>
                        @endif
                    </div>
                @endif</div>
                </x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">City</x-table.ths-center>
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

                        <x-table.action :id="$row->id"/>
                    </x-table.row>
                @empty
                    <x-table.empty/>
                @endforelse
            </x-slot>
            <x-slot name="table_pagination">
                <div wire:loading class="absolute inset-0 bg-white opacity-75"></div>
                <div wire:loading.flex class="flex justify-center items-center absolute inset-0">
                    <x-icons.spinner size="medium" class="text-gray-500" />
                </div>
                {{ $list->links() }}
            </x-slot>
        </x-forms.table>
        </div>

        <x-modal.delete/>

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vname" :label="'City Name'"/>
            @error('vname')
               <span class="text-red-500">{{  $message }}</span>
            @enderror
        </x-forms.create>

    </x-forms.m-panel>
</div>
