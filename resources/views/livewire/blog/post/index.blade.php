<div class="p-10">

    @foreach($list as $index => $row)

        <a href="{{route('posts.upsert',[$row->id])}}">
        <div class="flex flex-col border-b border-amber-400 gap-2 justify-center py-3">
            <div class="text-xl font-semibold">{{$index+1}}&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;{{$row->title}}</div>
            <div class="text-sm text-gray-500 font-semibold italic line-clamp-2">{{$row->body}}</div>
        </div>
        </a>

    @endforeach

</div>
