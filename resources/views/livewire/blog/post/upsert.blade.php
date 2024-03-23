<div class="p-10 mt-5">
    <div class="flex flex-col gap-2">
        <div class="flex gap-2">
            <label for="title">Title</label>
            <input wire:model="title" id="title" class="w-full">

        </div>
        <div class="flex gap-2">
            <label for="title">Description</label>
            <input wire:model="description" />

        </div>
        <div class="flex gap-2">
            <label for="body">Body</label>
           <x-input.rich-text wire:model="body"/>
        </div>

        <div class="flex gap-2">
            <label for="body">Author_name</label>
            <input wire:model="author_name" id="title" class="w-full">
        </div>

        <div class="flex flex-items-center pt-2">
            <label  class="w-[10rem] text-zinc-500 tracking-wide py-2 ">Image</label>
            <div class="flex-shrink-0 h-20 w-20 mr-4">
                    <div class="flex-shrink-0 h-20 w-20 mr-4">
                        <img src="{{$image}}" alt="{{$image}}"/>
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
