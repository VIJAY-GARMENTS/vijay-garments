<div>
    <x-slot name="header">Magalir Club Members</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-slno wire:click.prevent="sortBy('vname')">Sl.no</x-table.ths-slno>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Photo</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Name</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Mobile</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">City</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Club No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Action</x-table.ths-center>
            </x-slot>
            <x-slot name="table_body">

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex px-3 text-gray-600 truncate text-xl text-left">
                                {{ $index + 1 }}
                            </a>
                        </x-table.cell>



                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->photo }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->vname }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->mobile }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->city }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.loan',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->mgClub->vno }}&nbsp;-&nbsp;{{ $row->mgClub->vname }}
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

        <x-modal.delete/>

        <x-forms.create :id="$vid">

            <x-input.model-select wire:model="mg_club_id" :label="'Club No'">
                <option class="text-gray-400"> choose ..</option>
                @foreach($clubs as $row)
                    <option value="{{$row->id}}">{{$row->vno}}&nbsp;-&nbsp;{{$row->vname}}</option>
                @endforeach
            </x-input.model-select>

            <x-input.model-text wire:model="vname" :label="'Name'"/>
            <x-input.model-text wire:model="father" :label="'Father Name'"/>
            <x-input.model-text wire:model="mother" :label="'Mother Name'"/>
            <x-input.model-text wire:model="dob" type="date" :label="'Date of Birth'"/>
            <x-input.model-text wire:model="aadhaar" :label="'Aadhaar'"/>
            <x-input.model-text wire:model="pan" :label="'Pan'"/>
            <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
            <x-input.model-text wire:model="mobile_2" :label="'Mobile'"/>
            <x-input.model-text wire:model="email" :label="'Email'"/>
            <x-input.model-text wire:model="address_1" :label="'address'"/>
            <x-input.model-text wire:model="address_2" :label="'Address'"/>
            <x-input.model-text wire:model="city" :label="'City'"/>
            <x-input.model-text wire:model="state" :label="'State'"/>
            <x-input.model-text wire:model="pincode" :label="'Pincode'"/>
            <x-input.model-text wire:model="nominee" :label="'Nominee'"/>
            <x-input.model-text wire:model="n_mobile" :label="'Mobile'"/>
            <x-input.model-text wire:model="n_aadhaar" :label="'Aadhaar'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
