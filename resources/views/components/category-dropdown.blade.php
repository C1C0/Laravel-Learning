<x-dropdown>
    <x-slot name="trigger">
        <button class="inline-flex w-full py-2 pl-3 pr-9 text-sm font-semibold lg:w-32 text-left">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : "Categories"}}

            <x-icon name="{{ Config::get('constants.ICONS.ARROW_DOWN') }}"
                    class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    @php
        $parameters = http_build_query(request()->except(Config::get('constants.GET_REQUEST.CATEGORY')));
    @endphp

    <x-dropdown-item href="/?{{$parameters}}" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach($categories as $category)
        <x-dropdown-item href="/?{{ Config::get('constants.GET_REQUEST.CATEGORY') }}={{$category->slug}}{{!empty($parameters) ? '&' : ''}}{{$parameters}}"
                         :active='request()->is("?category={$category->slug}")'>
            {{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
