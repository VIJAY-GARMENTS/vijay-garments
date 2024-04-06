<div x-show="sidebarOpen" x-transition.opacity.duration.600ms @click="sidebarOpen = false"
     class="fixed inset-0 bg-black bg-opacity-30 z-10 "></div>
<nav x-cloak
     class="absolute inset-0 transform duration-500 z-30 w-80 bg-gray-900 text-white h-auto print:hidden"
     :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': sidebarOpen === false}">
    <div class="flex justify-between px-5 py-6">
        <a href="{{route('dashboard')}}" class="flex gap-3">
            <x-assets.logo.cxlogo :icon="'dark'" class="h-10 w-auto block"/>
            <span class="font-bold text-2xl sm:text-3xl tracking-widest">{{config('app.name')}}</span>
        </a>

        <button
            class="focus:outline-none focus:bg-gray-700 hover:bg-gray-800 rounded-md text-gray-300"
            @click="sidebarOpen = false"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-8 w-8"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    <!-- menu overflow-y-scroll overflow-x-hidden flex-grow h-full-->
    <div class=" bg-gray-900 text-white h-full overflow-y-scroll">
        <ul class="flex flex-col py-6 space-y-1"
            x-data="{selected:null}">


            {{--            @if(session()->get('software_id')==1)--}}
            {{--                <x-menu.sub.entries/>--}}
            {{--                <x-menu.sub.erp.production/>--}}
            {{--            @endif--}}
            {{--            @if(session()->get('software_id')==2)--}}
            {{--                <x-menu.sub.offset/>--}}
            {{--            @endif--}}
            {{--            @if(session()->get('software_id')==3)--}}
            {{--                <x-menu.sub.entries/>--}}
            {{--                <x-menu.sub.offset/>--}}
            {{--                <x-menu.sub.erp.production/>--}}
            {{--                <x-menu.sub.accounts/>--}}
            {{--                <x-menu.sub.audit/>--}}
            {{--                <x-menu.sub.task/>--}}
                            <x-menu.sub.utilities/>
            {{--                <x-menu.sub.admin/>--}}
            {{--                @magalir--}}
            {{--                <x-menu.sub.magalir/>--}}
            {{--                @endmagalir--}}
            {{--            @endif--}}

            <x-menu.sub.offset/>
            <x-menu.sub.master/>
            {{--            <x-menu.sub.order/>--}}
            <x-menu.sub.common/>
            <x-menu.sub.logout/>

        </ul>
    </div>
</nav>
