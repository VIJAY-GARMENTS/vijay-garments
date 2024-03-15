@props(['button'])


<span class="inline-flex justify-center items-center">

    @switch($button)

        @case('Primary')
            <button type="button" class="btn btn-primary">Primary</button>
            @break

        @case('Secondary')
            <button type="button" class="btn btn-secondary">Secondary</button>
            @break

        @case('Success')
            <button type="button" class="btn btn-success">Success</button>
            @break

        @case('Danger')
            <button type="button" class="btn btn-danger">Danger</button>
            @break

        @case('Warning')
            <button type="button" class="btn btn-warning">Warning</button>
            @break

        @case('Info')
            <button type="button" class="btn btn-info">Info</button>
            @break


        @case('Light')
            <button type="button" class="btn btn-light">Light</button>
            @break


        @case('Dark')
            <button type="button" class="btn btn-dark">Dark</button>
            @break

        @case('Link')
            <button type="button" class="btn btn-link">Link</button>
            @break

        @default
            Default case...
    @endswitch
</span>



