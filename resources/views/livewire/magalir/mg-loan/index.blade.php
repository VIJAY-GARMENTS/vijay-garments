<div>
    <x-slot name="header">Ac Details</x-slot>

    <x-forms.m-panel>

        <div class="flex justify-between mb-8">
            <div>
                <table>
                    <tbody>
                    <tr>
                        <td class="border px-5 border-gray-200">Club</td>
                        <td class="border px-8 border-gray-200">{{$member->mgClub->vname}}</td>
                    </tr>
                    <tr>
                        <td class="border px-5 border-gray-200">Member Name</td>
                        <td class="border px-8 border-gray-200">{{$member->vname}}</td>
                    </tr>
                    <tr>
                        <td class="border px-5 border-gray-200">Mobile</td>
                        <td class="border px-8 border-gray-200">{{$member->mobile}}</td>
                    </tr>
                    <tr>
                        <td class="border px-5 border-gray-200">City</td>
                        <td class="border px-8 border-gray-200">{{$member->city}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex items-end px-5">{{$member->vname}}</div>
            <div class="flex items-end px-5">
                <x-button.new/>
            </div>

        </div>

        <x-forms.table :list="$list">
            <x-slot name="table_header">
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Ac No</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Open Date</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Loan</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Interest</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Dues</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Due Amount</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Due Date</x-table.ths-center>
                <x-table.ths-center wire:click.prevent="sortBy('vname')">Action</x-table.ths-center>
            </x-slot>
            <x-slot name="table_body">

                @forelse ($list as $index =>  $row)
                    <x-table.row>

                        <x-table.cell>
                            <a href="{{route('mgClubs.passbook',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-left">
                                    {{ $row->ac_no }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.passbook',[$row->id])}}"
                               class="flex flex-col px-3">
                                <div class="text-gray-600 truncate text-xl text-center">
                                    {{$row->open_date ?  date('d-m-Y',strtotime($row->open_date)) : '' }}
                                </div>
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.passbook',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->loan }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.passbook',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-center">
                                {{ $row->interest }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.passbook',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-center">
                                {{ $row->dues }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.passbook',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-right">
                                {{ $row->due_amount }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            <a href="{{route('mgClubs.passbook',[$row->id])}}"
                               class="flex flex-col px-1 text-gray-600 truncate text-xl text-center">
                                {{$row->due_date ?  date('d-m-Y',strtotime($row->due_date)) : '' }}
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
            <x-input.model-text wire:model="ac_no" :label="'Account no'"/>
            <x-input.model-text wire:model="open_date" type="date" :label="'Date of Opening'"/>
            <x-input.model-text wire:model="loan" :label="'Loan Amount'"/>
            <x-input.model-text wire:model="interest" :label="'Interest'"/>
            <x-input.model-text wire:model="dues" :label="'No of Dues'"/>
            <x-input.model-text wire:model="due_amount" :label="'Due amount'"/>
            <x-input.model-text wire:model="due_date" type="date" :label="'Due Date On'"/>
        </x-forms.create>

    </x-forms.m-panel>
</div>
