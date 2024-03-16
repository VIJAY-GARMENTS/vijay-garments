<div>
    <x-slot name="header">Order</x-slot>


    <div class="flex w-full border border-gray-400 h-full items-center justify-center text-gray-300 px-16">
        <div class="bg-white rounded p-10">
            <h2 class="text-base font-semibold leading-7 text-gray-900">My Todo</h2>
            <p class="mt-1 text-sm leading-6 text-gray-500">You have {{ $this->remaining }} things on your todo list.</p>

            <div class="space-y-3 mt-4">
                @foreach($todos as $todo)
                    <div class="relative flex items-start">
                        <div class="flex h-6 items-center">
                            <input id="todo-{{ $loop->index }}" wire:model.live="todos.{{ $loop->index }}.completed" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="ml-3 text-sm leading-6">
                            <label for="todo-{{ $loop->index }}" class="font-medium text-gray-900">{{ $todo['todo'] }}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <form wire:submit="add" class="mt-6">
                <input type="text" wire:model="todo" placeholder="My new todo..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </form>
        </div>
    </div>

</div>
