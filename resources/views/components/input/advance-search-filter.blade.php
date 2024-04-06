@props([
'showFilters'=>false,
'contacts',
'orders'
])

<div>
    @if ($showFilters)
        <div class="bg-zinc-200 p-4 rounded shadow-inner flex relative">
            <div class="flex justify-between w-full ">
                <div class="pr-2 space-y-4 ">
                    <x-input.model-select wire:model.live="activeRecord" id="activeRecord" :label="'Active'">
                        <option value="" disabled>Select...</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </x-input.model-select>

                    <div class="h-5">
                        &nbsp;
                    </div>

                </div>
                @if($orders!="")
                    <div class="ml-3">
                        <x-input.model-select wire:model.live="byOrder" :label="'Order No'">
                            <option value="">choose</option>
                            @foreach($orders as $i)
                                <option value="{{$i->id}}">{{$i->vname}}</option>
                            @endforeach
                        </x-input.model-select>
                    </div>
                @endif
                @if($contacts!="")
                    <div class="ml-3">
                        <x-input.model-select wire:model.live="filter" :label="'Party Name'">
                            <option value="">choose</option>
                            @foreach($contacts as $i)
                                <option value="{{$i->id}}">{{$i->vname}}</option>
                            @endforeach
                        </x-input.model-select>
                    </div>
                @endif

                <div class="ml-3">
                    <x-input.model-date wire:model.live="start_date" :label="'From'"/>
                </div>
                <div class="ml-3">
                    <x-input.model-date wire:model.live="end_date" :label="'To'"/>
                </div>
            </div>
            <div class="w-1/4 pl-2 space-y-4">
                <x-button.link wire:click="resetFilters" class="absolute right-0 bottom-0 p-4">Reset
                    Filters
                </x-button.link>
            </div>
        </div>
    @endif
</div>
