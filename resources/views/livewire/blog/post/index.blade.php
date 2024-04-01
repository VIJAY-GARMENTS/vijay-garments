<div>
<div class="py-12 bg-indigo-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-20">
<div><h1 class="text-black text-6xl font-extrabold">Latest Updates</h1></div>
        <div class="text-right ">
            @editor
            <x-button.new><div class="'bg-blue-500 hover:bg-amber-950'">

                </div></x-button.new>
            @endeditor
        </div>
{{--        <article class="transition-colors duration-300 bg-white shadow-2xl hover:bg-gray-100 border border-black border-opacity-50 hover:border-opacity-5 rounded-xl">--}}
{{--            <div class="py-10 px-5 lg:flex">--}}
{{--                <div class="flex-1 lg:mr-8">--}}
{{--                    <img src="../../../../images/myblog.jpg" class="rounded-l" />--}}
{{--                </div>--}}

{{--                <div class="text-lg mt-2 space-y-4">--}}
{{--                    <p class="items-center text-4xl">Looking for more? Here are some<br>--}}
{{--                        related articles you may like.--}}
{{--                    </p><br>--}}
{{--                    <h6 class="gap-2 font-sans">Billing is a crucial and integral part of every business.<br>--}}
{{--                        Though every business has a different set of requirements, <br>--}}
{{--                        billing software should offer flexible capabilities to a<br>--}}
{{--                        business owner that would empower him & simplify all<br>--}}
{{--                        business operations. More or less billing software should <br>--}}
{{--                        help the business owner to manage business more<br>--}}
{{--                        efficiently and of course digitally.--}}
{{--                    </h6>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </article>--}}

        <div class="lg:grid lg:grid-cols-3">
        @foreach($list as $row)
        <article
            class="transition-colors bg-white duration-300 hover:shadow-2xl border border-black border-opacity-50 hover:border-opacity-5 rounded-xl mx-3 my-2 px-4 py-3">
            <a href="{{route('posts.views',[$row->id])}}">
                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $row->title }}
                    </h1>

                    <div class="py-6 px-5 lg:flex">
                <div class="flex-1 lg:mr-8">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" class="rounded-xl">
                </div>
            </div>

            <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">

                <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $row->created_at->diffForHumans() }}</time>
                    </span>
            </header>
            </div>

            <div class="text-lg mt-4 space-y-4">
                {!! \Illuminate\Support\Str::limit($row->body, 100 )!!}
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


