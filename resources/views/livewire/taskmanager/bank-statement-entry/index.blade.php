<div>
    <x-slot name="header">Bank Statement Entry</x-slot>

    <x-forms.m-panel>
        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('client_id')">SL.NO</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Client</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Entry Up to</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Remarks</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Status</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('client_id')">Action</x-table.ths-center>
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
                                    {{ $row->vname }}
                                </p>
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{$row->entry ?  date('d-m-Y',strtotime($row->entry)) : '' }}
                                </p>
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->remarks }}
                                </p>
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <div
                                class="flex w-full items-center justify-center  text-center {{ $row->entry == $current_date ? 'bg-green-300' : 'bg-red-300'}}">
                                <p class="flex w-full text-xl text-center  items-center justify-center p-1">
                                    {{ $row->entry == $current_date ? 'on Date' : 'Missing'}}
                                </p>
                            </div>
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
            <x-input.model-text wire:model="entry" autofocus type="date" :label="'Entry Up To'"/>
            <x-input.model-text wire:model="remarks" :label="'remarks'"/>
        </x-forms.create>

        @admin
        <div class="flex flex-row justify-between px-5">
            <x-button.primary wire:click="generate">Generate</x-button.primary>
        </div>
        @endadmin

    </x-forms.m-panel>
</div>
