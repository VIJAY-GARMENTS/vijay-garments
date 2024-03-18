<div class="p-10 mt-5">
    <div class="flex flex-col gap-2">
        <div class="flex gap-2">
            <label for="title">Title</label>
            <input wire:model="title" id="title" class="w-full">

        </div>
        <div class="flex gap-2">
            <label for="body">Body</label>
            <textarea rows="10" id="body" wire:model="body" class="w-full"></textarea>
        </div>


        <x-button.save wire:click.prevent="save" class="w-6"/>
    </div>

</div>
