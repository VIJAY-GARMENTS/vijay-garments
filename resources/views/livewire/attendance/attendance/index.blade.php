<div>
    <x-slot name="header">Attendance View</x-slot>
    <x-forms.m-panel>
    <div class=" ">
        <table class="w-full">

            <x-table.cell>
                <div class="flex gap-3 text-right w-full justify-end">
                <button wire:click="mark_in"
                        class="flex px-2 py-2 text-white text-xl bg-lime-500 rounded-lg" >
                  Mark In
                </button>
                @error('vdate')
                    <span class="text-red-500">{{  'The Party Name is Required.' }}</span>
                @enderror
                </div>
            </x-table.cell>
        </table>
        <x-forms.table :list="$list">
            <x-slot name="table_body">
            @forelse ($list as $index =>  $row)
               <x-table.row>
                   <x-table.cell>
                       <a href="{{ route('attendances') }}">
                           {{$row->user->name}}</a>
                   </x-table.cell>
                <x-table.cell>
                    {{$row->vdate}}
                </x-table.cell>
                <x-table.cell>
                    {{$row->in_time}}
                </x-table.cell>
                <x-table.cell>
                    {{$row->out_time}}
                </x-table.cell>
                   <x-table.cell>
                       <div class="flex gap-3 text-right w-full justify-end">
                       <button wire:model="out_time" wire:click="mark_out({{ $row->id }})"
                               class="flex px-2 py-2 text-white text-xl bg-red-500 rounded-lg">
                           Mark Out
                       </button></div></x-table.cell>
               </x-table.row>

            @empty

            @endforelse
            </x-slot>
        </x-forms.table>

    </div>
    </x-forms.m-panel>
</div>
