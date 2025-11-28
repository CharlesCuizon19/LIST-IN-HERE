@props([
    'button' => '',
    'textColor' => 'black',
    'route' => '#',
    'color' => '',
])

<a href="{{ route($route) }}"
    class=" flex items-center {{ $color }} text-{{ $textColor }} gap-2 w-fit py-3 px-5 xl:px-7 xl:py-5 rounded-md group hover:drop-shadow-lg transition duration-500">
    <span class="text-sm xl:text-lg">
        {{ $button }}
    </span>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
        class="transition duration-500 group-hover:translate-x-2 group-hover:rotate-45">
        <path fill="currentColor"
            d="M18 7.05a1 1 0 0 0-1-1L9 6a1 1 0 0 0 0 2h5.56l-8.27 8.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L16 9.42V15a1 1 0 0 0 1 1a1 1 0 0 0 1-1Z" />
    </svg>
</a>
