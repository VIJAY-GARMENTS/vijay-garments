<div>
    <x-slot name="header">Track</x-slot>

    <x-forms.m-panel>
        <div class="flex flex-row justify-between">
            <div>
                <label>
                    <input wire:model="cdate" wire:change.debounce="reRender" type="date"
                           class="purple-textbox w-[12rem]"/>
                </label>
            </div>
            <div></div>
        </div>


        <div class="min-w-full divide-y divide-cool-gray-200">
            <div class="bg-white divide-y divide-cool-gray-200">
                @php
                    $invNo='';
                @endphp

                @forelse ($list as $index =>  $row)

                    @if($invNo == $row->invNo)
                        <div class="flex flex-row gap-10 border border-gray-200">
                            <div>{{$row->vno}}</div>
                            <div>
                                {{$row->vdate ?  date('d-m-Y',strtotime($row->vdate)) : '' }}
                            </div>
                            <div>{{$row->client->vname}}</div>
                            <div>{{$row->vehicle}}</div>
                        </div>
                    @endif

                    <div class="flex flex-row gap-3">
                        <div>{{$row->product_id}}</div>
                        <div>{{$row->qty}}</div>
                        <div>{{$row->price}}</div>
                    </div>

                    @php
                        $invNo = $row->invNo;
                    @endphp

                @empty
                    <x-table.empty/>
                @endforelse
            </div>
        </div>


    </x-forms.m-panel>
</div>
