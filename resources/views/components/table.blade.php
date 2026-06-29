<div class="overflow-x-auto rounded-md border border-gray-200 shadow-sm">

    <table
        {{ $attributes->merge([
            'class' => 'w-full text-sm'
        ]) }}
    >

        {{ $slot }}

    </table>

</div>
