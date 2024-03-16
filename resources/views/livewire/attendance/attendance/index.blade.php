<div>
    <x-slot name="header">Attendance View</x-slot>
    <x-forms.m-panel>
    <div class="-mt-4">
        <table class="w-full">

            <td>
                <div class="flex gap-3 text-right w-full justify-end">
                <button wire:click.prevent="mark_in"
                        class="flex px-2 py-2 text-white font-bold tracking-wider text-sm bg-lime-500 rounded-lg" >
                  I am In
                </button>
                </div>
            </td>
        </table>
        <x-forms.table :list="$list">
            <x-slot name="table_body">
            @forelse ($list as $index =>  $row)
             <tr class = 'bg-white border border-gray-900 hover:bg-yellow-50 cursor-pointer'>
                   <x-table.cell>
                       <a href="{{ route('attendances') }}">
                           {{$index+1}}</a>
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
                       <span>₹</span>{{$row->amount}}
                   </x-table.cell>
                   <x-table.cell>
                       <div class="flex gap-3 text-right w-full justify-end">
                       <button  wire:click.prevent="mark_out({{ $row->id }})"
                               class="flex px-2 py-2 text-white text-sm bg-red-500 rounded-lg">
                           I am Out
                       </button></div></x-table.cell>
             </tr>

                @empty

                @endforelse
                <tfoot class="mt-2">
                <td>
        <div class="grid w-full grid-cols-2 pt-6">
            <label
                class="px-3 pb-2 text-left text-gray-600 text-md">Total Earned:&nbsp;&nbsp;₹</label>
            <label class=" pb-2 text-left text-gray-800 text-md">{{ $total_amount }}</label>
        </div></td></tfoot>

            </x-slot>
        </x-forms.table>

    </div>
    </x-forms.m-panel>
</div>
