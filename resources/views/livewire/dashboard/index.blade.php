<div>
    <x-slot name="header">Dashboard</x-slot>
    <div class="w-full h-screen">
        <div class="flex justify-between gap-3 py-5 xl:pl-12">
            <div class="w-1/4">

                @if(Aaran\Aaconfig\Src\Customise::hasTodoList())
                    @if(session()->get('software_id')==1)
                        <livewire:taskmanager.todos.index/>
                    @endif
                @endif
            </div>


            <a
                class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all rounded-md shadow-xl
                sm:w-auto bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                shadow-blue-200 hover:shadow-2xl hover:shadow-blue-400 hover:-tranneutral-y-px "
                href="">Browse All Examples
            </a>
            <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all bg-gray-700 dark:bg-white dark:text-gray-800 rounded-md shadow-xl sm:w-auto hover:bg-gray-900 hover:text-white shadow-neutral-300 dark:shadow-neutral-700 hover:shadow-2xl hover:shadow-neutral-400 hover:-tranneutral-y-px"
               href="">Seach Examples
            </a>


            {{--            <livewire:attendance.attendance.index/>--}}
        </div>
    </div>
</div>
