<div>
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6 ">

    <article class="max-w-4xl mx-auto gap-x-10">
        <div class=" lg:pt-14 mb-10">
            <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="" class="h-auto w-full rounded-xl">

            <p class="mt-4 block text-end mr-5 text-gray-400 text-xs">
                Published
                <time>{{ $post->created_at->diffForHumans() }}</time>
            </p>

            <div class="flex items-end lg:justify-end text-sm mr-5 mt-4">
                <div class="ml-3 text-right ">
                    <h5 class="font-bold">
                        {{ $post->user->name }}
                    </h5>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="{{route('posts')}}"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>
                </div>

                <h1 class="font-bold text-3xl text-center lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">{!! $post->body !!}</div>
            </div>

        </div>
        <div class="my-2 text-end">
            <a href="{{route('posts.upsert',[$post->id])}}">
            <button  type="button" class="items-end text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 text-center
            dark:text-purple-400 dark:focus:ring-purple-900">Edit</button>
            </a></div>
    </article>
</main>
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


{{--<div>--}}
{{--    <div class="max-w-7xl mx-auto sm:px-6 p-20 lg:px-8">--}}
{{--        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" class="rounded-2xl w-1/3 h-1/3"/>--}}
{{--    </div>--}}
{{--    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--    <div class="text-center text-xl font-extrabold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$post->title}}</div>--}}
{{--    <div class="text-sm text-gray-500 font-semibold italic mt-2 text-wrap ">{!! $post->body!!}</div>--}}
{{--    <div class="text-sm text-gray-500  text-center font-semibold italic mt-2 text-wrap ">{{$post->user->name}}</div>--}}
{{--    <div class="text-right px-11">--}}
{{--        @admin--}}
{{--    <a href="{{route('posts.upsert',[$post->id])}}">--}}
{{--    <button  type="button" class="items-end text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 text-center--}}
{{--    dark:text-purple-400 dark:focus:ring-purple-900">Edit</button>--}}
{{--    </a>--}}
{{--        @endadmin--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
