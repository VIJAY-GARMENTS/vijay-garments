<div class="p-10">
    <div class="text-right ">
        <x-button.new class="bg-amber-950 hover:bg-amber-950"></x-button.new>
    </div>

    @foreach($list as $index => $row)

        <a href="{{route('posts.upsert',[$row->id])}}">
        <div class="flex flex-col border-b border-amber-400 gap-2 justify-center py-3">
            <div class="text-xl font-semibold">{{$index+1}}&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;{{$row->title}}</div>
            <div class="text-sm text-gray-500 font-semibold italic line-clamp-2">{{$row->body}}</div>
               <div class="flex-shrink-0 h-10 w-10 mr-4" >
{{--                   <img src="{{url('storage/app/'.$row->photo)}}">--}}
                   <img src={{ URL:: asset('/public/storage/'.$row->image) }}/>
                </div>
        </div>

{{--            <img class="h-auto  rounded ms-auto inline max-w-2xl" src="../../../../images/butterfly.jpg" alt="image description">--}}
        </a>

    @endforeach

</div>

