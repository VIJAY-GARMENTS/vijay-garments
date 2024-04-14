<button type='button' {{$attributes}}
wire:confirm="Are you sure you want to delete this ?">
    <x-icons.icon :icon="'trash'"
                  class="text-red-500 h-5 hover:h-6"/>
</button>
