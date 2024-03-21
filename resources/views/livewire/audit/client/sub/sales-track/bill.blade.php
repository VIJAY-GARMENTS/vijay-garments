<div>
    <x-slot name="header">Bills</x-slot>

    <x-forms.m-panel>

        <div>
            <x-button.new/>
        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Client</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Invoice No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Date</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Taxable</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Gst</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Grand Total</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Vehicle</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Status</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Acton</x-table.ths-center>
            </x-slot>

            <x-slot name="table_body">
                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $index + 1 }}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->client->vname}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->vno}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->vdate ? date('d-m-Y', strtotime($row->vdate)):''}}
                                </p>
                            </a>
                        </x-table.cell>


                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->taxable}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->gst}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->grand_total}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                                    {{ $row->vehicle}}
                                </p>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('salesTracks.billItems',[$row->id])}}">
                                <p class="flex px-3 text-gray-600 truncate text-xl text-center {{ \App\Enums\Status::tryFrom($row->status)->getStyle()}}">
                                    {{ \App\Enums\Status::tryFrom($row->status)->getName()}}
                                </p>
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
            <div class="mt-5">
                <a href="{{route('salesTracks.items',[$sales_track_item->sales_track_id] )}}" class="mt-5 bg-gray-400 text-white tracking-wider px-4 py-1
                rounded-md flex items-center w-24 hover:bg-gray-500">
                    <x-icons.icon :icon="'chevrons-left'" class="h-8 w-auto inline-block items-center"/>
                    Back
                </a>
            </div>
        </div>

        <x-modal.delete/>

        <x-forms.create :id="$vid">
            <x-input.model-text wire:model="vno" :label="'Invoice No'"/>
            <x-input.model-text wire:model="vdate" type="date" :label="'Date'"/>

            <x-input.model-select wire:model="client_id" :label="'Client'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-text wire:model="vehicle" :label="'vehicle'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
