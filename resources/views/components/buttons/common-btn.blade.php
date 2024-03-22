@props(['str','icon','clicks','colour'])
<div>
    <button wire:click="{{$clicks}}" class='w-36 font-extrabold
            bg-{{$colour}}-600 hover:bg-{{$colour}}-500  border-b-4 border-{{$colour}}-700 hover:border-{{$colour}}-700
            focus:outline-none text-white  uppercase font-bold shadow-md rounded-lg p-2'>
        <div class="flex gap-4  justify-center">
            {{--            <x-icons.icon icon="{{$icon}}" class="h-7 w-auto block"/>--}}
            <div class="pt-1.5">
                @if(isset($str))
                    {{$str}}
                @endif
            </div>
        </div>
    </button>
</div>
