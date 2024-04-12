<div>
    <x-slot name="header">Dashboard</x-slot>
    <div class="w-full h-screen">
        <div class="flex justify-between gap-3 py-5 xl:pl-12">
            <div class="w-1/4">

                @if(Aaran\Aaconfig\Src\Customise::hasTodoList())
                        <livewire:taskmanager.todos.index/>
                @endif
            </div>
            {{--            <livewire:attendance.attendance.index/>--}}
        </div>
    </div>
</div>
