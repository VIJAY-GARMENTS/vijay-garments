<div>
    <x-slot name="header">Order</x-slot>
    <div class=" w-full border border-gray-400 h-full items-center justify-center text-gray-300 px-16">

        @foreach($list as $index =>$row)
            <div class="flex flex-row items-center">

                <label>
                    <input wire:click="isChecked({{$row->id}})" type="checkbox"
                           @if($row->completed) checked @endif
                           class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                </label>

                <div class="ml-3 text-sm leading-6">
                    <label
                        class="font-medium {{ $row->completed ? 'line-through text-green-500': 'text-gray-700'}}">
                        {{ $row->vname }}
                    </label>
                </div>

            </div>
        @endforeach

        <label class="mt-auto mb-2">
            <input type="text" wire:model="vname" wire:change="saveTodo" placeholder="My new todo..."
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </label>

    </div>
</div>
