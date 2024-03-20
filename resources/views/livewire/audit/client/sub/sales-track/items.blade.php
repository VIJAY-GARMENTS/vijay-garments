<div>
    <x-slot name="header">Sales Tracks items</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Client</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Total count</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Total Value</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Status</x-table.ths-center>
            </x-slot>

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('salesTracks.bills',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $index + 1 }}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.bills',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{$row->client_id ? $row->client->vname : $row->vname }}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.bills',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->total_count}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.bills',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->total_value}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.bills',[$row->id])}}">
                                <div
                                    class="text-gray-600 truncate text-xl text-center px-2 {{ \App\Enums\Status::tryFrom($row->status)->getStyle() }}">
                                    {{ \App\Enums\Status::tryFrom($row->status)->getName() }}
                                </div>
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

        <div class="pt-6">
            <div class="mt-5 flex flex-row gap-5">
                <a href="{{route('salesTracks')}}" class="mt-5 bg-gray-400 text-white tracking-wider px-4 py-1
                rounded-md flex items-center w-24 hover:bg-gray-500">
                    <x-aaranUi::icons.icon :icon="'chevrons-left'" class="h-8 w-auto inline-block items-center"/>
                    Back
                </a>

                <button wire:click="generateBills" class="bg-amber-200 h-8 mt-5 px-2 py-1 rounded-md inline-block">
                    Generate
                </button>

                <button wire:click="showBillItems" class="bg-amber-200 h-8 mt-5 px-2 py-1 rounded-md inline-block">
                    show
                </button>

                <x-input.model-text wire:model="margin" :label="'Margin'"/>
            </div>
        </div>

        <x-modal.delete/>

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="serial" :label="'Serial'"/>

            <x-input.model-select wire:model="client_id" :label="'Client'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-text wire:model="total_count" :label="'Total Count'"/>

            <x-input.model-text wire:model="total_value" :label="'Total Value'"/>
        </x-forms.create>

        @if($showSubItems)
            <div>
                <livewire:master.client.sub.sales-track.temp-bill-item/>
            </div>
        @endif


    </x-forms.m-panel>
</div>
