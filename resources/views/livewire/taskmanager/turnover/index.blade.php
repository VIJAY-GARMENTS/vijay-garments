<div>
    <x-slot name="header">Target Turnover</x-slot>

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
                <x-table.ths wire:click.prevent="sortBy('client_id')">target</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('client_id')">Achieved</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('client_id')">Remarks</x-table.ths>
                <x-table.ths wire:click.prevent="sortBy('client_id')">Status</x-table.ths>
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
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ ConvertTo::rupeesFormat($row->target) }}
                                </p>
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <button wire:click.prevent="edit({{ $row->id }})">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ ConvertTo::rupeesFormat($row->achieved) }}
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
                                class="flex w-full items-center justify-center  text-center {{  \App\Enums\Status::tryFrom($row->status_id)->getStyle()}}">
                                <p class="flex w-full text-xl text-center  items-center justify-center p-1">
                                    {{ \App\Enums\Status::tryFrom($row->status_id)->getName()}}
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
            <x-input.model-text wire:model="target" autofocus :label="'target'"/>
            <x-input.model-text wire:model="achieved" :label="'achieved'"/>
            <x-input.model-text wire:model="remarks" :label="'remarks'"/>
        </x-forms.create>

        <div class="flex flex-row justify-between px-5">
            <x-button.primary wire:click="generate">Generate</x-button.primary>
        </div>

    </x-forms.m-panel>
</div>
