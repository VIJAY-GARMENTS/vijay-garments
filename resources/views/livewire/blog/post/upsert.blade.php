<div class="p-20">
    <div class="max-w-3xl mx-auto sm:px-6 p-10 lg:px-8 space-y-4">
        <div class="gap-2">
            <label for="title">Title</label>
            <input wire:model="title" id="title" class="w-full">

        </div>

        <div class="gap-5">
            <label for="body">Body</label>
           <x-input.rich-text wire:model="body"/><div>
            </div>
        </div>

        <div class=" flex-items-center pt-2">
            <label  class="w-[10rem] text-zinc-500 tracking-wide py-2 ">Image</label>
            <div class="flex-shrink-0 h-20 w-20 mr-4">
                    <div class="flex-shrink-0 h-20 w-20 mr-4">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($image)}}" alt="{{$image}}"/>
                    </div>
            </div>

            <div>
                <input type="file" wire:model="image" class="">
                <button wire:click.prevent="save_image">Save photo</button>
            </div>
        </div>

        <div>
        <x-button.save wire:click.prevent="save" class="w-6"/>
            <x-button.back />
        </div>
    </div>
</div>


