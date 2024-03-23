<div class="p-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-right ">
            @editor
            <x-button.new class="bg-amber-950 hover:bg-amber-950"></x-button.new>
            @endeditor
        </div>

        @foreach($list as $row)

            <a href="{{route('posts.views',[$row->id])}}">
                <div class="flex flex-col border-collapse  gap-2 justify-center items-center py-3 ">
                    <div class="flex">
                        <div class="flex-shrink-0 h-52 w-52 mr-10 rounded-lg ">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}"
                                 class="rounded-2xl w-52 h-52" alt="img"/>
                        </div>
                        <div class="pl-3 ">
                            <div class="text-xl font-extrabold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$row->title}}</div>
                            <div
                                class="border-b border-b-cyan-800 pb-4 text-sm text-gray-500  text-center font-semibold italic flex mt-2 text-wrap ">
                                {{ \Illuminate\Support\Str::limit($row->body, 100 )}}
                            </div>
                            <div>
                                <div
                                    class="text-sm text-gray-500 text-center  font-semibold italic line-clamp-2 mt-2 text-wrap ">{{$row->author_name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

