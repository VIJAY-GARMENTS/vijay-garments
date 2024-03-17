<div>
    <x-slot name="header">Order</x-slot>

    <div class="border border-gray-300 w-full">

        <label class="">
            <input type="text" wire:model="vname" wire:change="saveTodo" placeholder="Ink your ideas..."
                   class="purple-textbox-no-rounded  w-full">
        </label>

        <div class="mt-4 pl-5">

            @foreach($list as $index =>$row)

                <div wire:key="{{$row->id}}" class="flex flex-row justify-between gap-5 py-1">

                    <div class="flex gap-3 w-full">
                        <label>
                            <input wire:click="isChecked({{$row->id}})" type="checkbox"
                                   @if($row->completed) checked @endif
                                   class="h-4 w-4 bg-gray-100 border-gray-300 rounded focus:ring-2 transition duration-300 ease-in-out
                               {{ $row->completed ? 'text-green-400 focus:ring-green-500': 'focus:ring-gray-500 text-gray-700'}}">
                        </label>


                        @if($row->vname === $ename)
                            <label class="flex flex-row w-full">
                                <input class="w-10 purple-textbox" wire:change.prevent="updateTodo({{$row->id}})" wire:model="slno">
                                <input class="purple-textbox w-full" wire:change.prevent="updateTodo({{$row->id}})" wire:model="ename">
                            </label>
                        @else
                            <label
                                class="font-medium {{ $row->completed ? 'line-through text-green-500': 'text-gray-700'}}">
                                {{ $row->slno }}&nbsp;.&nbsp;&nbsp;&nbsp;{{ $row->vname }}
                            </label>
                        @endif

                        @if($editmode)
                            <label>
                                <input wire:model="vname">
                            </label>
                        @endif
                    </div>

                    <div class="w-16">
                        <div class="w-full flex justify-center">
                            <x-button.link wire:click.prevent="edit('{{$row->vname}}')">&nbsp;

                                <x-icons.icon :icon="'pencil'"
                                              class="text-gray-300 hover:text-blue-500 h-4 w-auto block"/>
                            </x-button.link>

                            <x-button.link wire:click="getDelete({{ $row->id }})">&nbsp;
                                <x-icons.icon :icon="'trash'"
                                              class="text-gray-300 hover:text-red-600 h-5 w-auto block"/>
                            </x-button.link>
                        </div>
                    </div>

                </div>
                <x-forms.section-border/>
            @endforeach
        </div>
    </div>
</div>
