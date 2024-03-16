<div>
    <x-slot name="header">Dashboard</x-slot>

    <x-forms.m-panel>

        <div class="w-full h-screen">
            <livewire:sys.default-company.index/>

            <div class="flex justify-between gap-3">
                <livewire:taskmanager.todos.index/>
                <livewire:attendance.attendance.index/>
            </div>
        </div>

    </x-forms.m-panel>

</div>
