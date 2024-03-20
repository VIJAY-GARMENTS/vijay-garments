<div
    wire:ignore.self
    class="rounded-md shadow-sm"
    x-data="{
        value: @entangle($attributes->wire('model')),
        isFocused() { return document.activeElement !== this.$refs.trix },
        setValue() { this.$refs.trix.editor.loadHTML(this.value) }
    }"
    x-init="setValue(); $watch('value', () => isFocused() && setValue())"
    x-on:trix-change="value = $event.target.value"
    {{ $attributes->whereDoesntStartWith('wire:model') }}

>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <input id="x" type="hidden">
    <trix-editor x-ref="trix" input="x"
                 class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 purple-textbox h-48"></trix-editor>
</div>
