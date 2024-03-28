<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" class="rounded-2xl w-1/3 h-1/3"/>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="text-center text-xl font-extrabold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$post->title}}</div>
    <div class="text-sm text-gray-500 font-semibold italic mt-2 text-wrap ">{!! $post->body!!}</div>
    <div class="text-sm text-gray-500  text-center font-semibold italic mt-2 text-wrap ">{{$post->user->name}}</div>
    <div class="text-right px-11">
        @admin
    <a href="{{route('posts.upsert',[$post->id])}}">
    <button  type="button" class="items-end text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 text-center
    dark:text-purple-400 dark:focus:ring-purple-900">Edit</button>
    </a>
        @endadmin
</div>
</div>
</div>
