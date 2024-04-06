{{--<x-button.base--}}
{{--    {{ $attributes->merge(['class' => 'text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 border-indigo-600']) }}--}}
{{-->--}}
{{--    {{ $slot }}--}}
{{--</x-button.base>--}}


<x-button.base
    {{ $attributes->merge(['class' => 'inline-block text-white transition-all rounded-md shadow-md
                bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                shadow-blue-200 hover:shadow-2xl hover:shadow-blue-400 hover:-tranneutral-y-px']) }}
>
    {{ $slot }}
</x-button.base>

