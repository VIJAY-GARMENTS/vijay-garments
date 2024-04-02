<div>
    <div class="mt-2 bg-white rounded-lg mr-3 shadow-2xl">
        <table class="w-full">

            <td>
                <div class="flex gap-3 text-right w-full justify-end">
                    <button wire:click.prevent="mark_in"
                            class="flex px-2 py-2 text-white font-bold tracking-wider text-sm bg-lime-500 rounded-lg mt-2 mr-2">
                        I am In
                    </button>
                </div>
            </td>
        </table>
        <div class="mx-2 my-1">
            <x-forms.table :list="$list" class="h-80">
                <x-slot name="table_body">
                    @forelse ($list as $index =>  $row)
                        <tr class='bg-white border border-gray-900 hover:bg-yellow-50 cursor-pointer'>
                            <x-table.cell>
                                {{$index+1}}
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
                                    <button wire:click.prevent="mark_out({{ $row->id}})" onclick=""
                                            class="flex px-2 py-2 text-white text-sm bg-red-500 rounded-lg">
                                        I am Out
                                    </button>
                                </div>
                            </x-table.cell>
                        </tr>

                    @empty

                    @endforelse
                    <tfoot class="mt-2">
                    <td colspan="6">
                        <div class="flex pt-6">
                            <label
                                class="px-3 pb-2 text-left text-gray-600 text-md">Total Earned:&nbsp;&nbsp;₹</label>
                            <label class=" pb-2 text-left text-gray-800 text-md ">{{ $total_amount*($index+1) }}</label>
                        </div>
                    </td>
                    </tfoot>

                </x-slot>
            </x-forms.table>
        </div>
    </div>
</div>
