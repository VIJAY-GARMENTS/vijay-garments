<div class="p-10">
    <div class="text-right ">
        @admin
        <x-button.new class="bg-amber-950 hover:bg-amber-950"></x-button.new>
        @endadmin
    </div>

    @foreach($list as $index => $row)

        <a href="{{route('posts.views',[$row->id])}}">
        <div class="flex flex-col border-collapse  gap-2 justify-center items-center py-3 ">
            <div class="flex">
               <div class="flex-shrink-0 h-52 w-52 mr-10 rounded-lg " >
                   <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" class="rounded-2xl w-52 h-52"/>
                </div>
            <div class="pl-3 ">
            <div class="text-xl font-extrabold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$row->title}}</div>
            <div class="border-b border-b-cyan-800 pb-4 text-sm text-gray-500  text-center font-semibold italic line-clamp-2 mt-2 text-wrap ">{{$row->description}}</div>
                <div>
            <div class="text-sm text-gray-500 text-center  font-semibold italic line-clamp-2 mt-2 text-wrap ">{{$row->author_name}}</div>
            </div>
            </div>
            </div>
        </div>

        </a>

    @endforeach

</div>

