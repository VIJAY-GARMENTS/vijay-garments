<div class="p-10">
    <div class="text-right ">
        <x-button.new class="bg-amber-950 hover:bg-amber-950"></x-button.new>
    </div>

    @foreach($list as $index => $row)

        <a href="{{route('posts.upsert',[$row->id])}}">
        <div class="flex flex-col border-b border-amber-400 gap-2 justify-center py-3">
            <div class="flex">
               <div class="flex-shrink-0 h-20 w-20 mr-10" >
                   <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}"/>
                </div>
            <div >
            <div class="text-xl font-semibold">{{$index+1}}&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;{{$row->title}}</div>
            <div class="text-sm text-gray-500 font-semibold italic line-clamp-2">{{$row->body}}</div>
            </div>
            </div>
        </div>

        </a>

    @endforeach

</div>

