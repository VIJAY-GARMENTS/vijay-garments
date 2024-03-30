<div>
<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-20">
<div><h1 class="text-black text-6xl font-extrabold">Latest Updates</h1></div>
        <div class="text-right ">
         @editor
                <x-button.new class="bg-amber-950 hover:bg-amber-950 "></x-button.new>
            @endeditor
        </div>
        <article class="transition-colors duration-300 bg-white shadow-2xl hover:bg-gray-100 border border-black border-opacity-50 hover:border-opacity-5 rounded-xl">
                       <a href="{{route('posts.views',[$list1->id])}}">
            <div class="py-6 px-5 lg:flex">
                <div class="flex-1 lg:mr-8">
                           <img src="{{  \Illuminate\Support\Facades\Storage::url($list1->image) }}"  class="rounded-xl">
                </div>
                <div class="flex-1 flex flex-col justify-between">
                    <header class="mt-8 lg:mt-0">
                        <div class="mt-4">
                            <h1 class="text-3xl">
                                    {{ $list1->title }}
                            </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{  $list1->created_at->diffForHumans() }}</time>
                    </span>
                        </div>
                    </header>
                    <div class="text-sm mt-2 space-y-4">
                        {!!  \Illuminate\Support\Str::limit($list1->body, 200 )!!}
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">
                            <div class="ml-3">
                                <h5 class="font-bold">
                                    {{$list1->user->name}}
                                </h5>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
                       </a>
        </article>
        <div class="lg:grid lg:grid-cols-2">
        @foreach($list->skip(1) as $row)
        <article
            class="transition-colors bg-white shadow-2xl 8duration-300 hover:bg-gray-100 border border-black border-opacity-50 hover:border-opacity-5 rounded-xl mx-3 my-2 px-4 py-3">
            <a href="{{route('posts.views',[$row->id])}}">
            <div class="py-6 px-5 lg:flex">
                <div class="flex-1 lg:mr-8">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" class="rounded-xl">
                </div>
            </div>

            <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
            <div class="mt-4">
                <h1 class="text-3xl">
                        {{ $row->title }}
                </h1>

                <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $row->created_at->diffForHumans() }}</time>
                    </span>
            </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! \Illuminate\Support\Str::limit($row->body, 200 )!!}
            </div>
            <footer class="flex justify-between items-center mt-8">

                <div class="ml-3">
                    <h5 class="font-bold">
                      {{ $row->user->name }}
                    </h5>
                </div>

            </footer>
            </div>
            </a>
        </article>
        @endforeach
        </div>

    </div>
</div>
    <footer>
    <div class="w-full bg-gray-800">
        <div
            class="container xl:flex sm:flex  w-full h-auto px-5 py-6 mx-auto flex items-center sm:flex-row flex-col dark:bg-gray-800">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                     stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2"
                     class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl text-white">AARAN </span>
            </a>
            <p class="text-sm text-gray-100 sm:ml-6 sm:mt-0 mt-4 ">© 2023 Sundar —
                <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-200 ml-1"
                   target="_blank">@aaransoftwares@gmail.com</a>
            </p>
        </div>
    </div>
    </footer>
</div>


