@props([
    'left' => false,
    'center' => false,
    'right' => false,
])

<td class = 'px-2 py-2 border border-gray-200 whitespace-no-wrap text-sm leading-2 text-gray-900'>
    <div {{ $attributes->class([
            'text-zinc-600 tracking-wider font-semibold text-md',
            'text-left'=>$left,
            'text-center'=>$center,
            'text-right'=>$right,
        ])}}>
        {{  $slot }}
    </div>
</td>
