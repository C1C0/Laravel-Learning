<x-layout>

    @include("_posts-header")

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-post-featured-card :post="$posts[0]"/>

            @if($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach($posts->skip(1) as $post)
                        <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                    @endforeach
                </div>
            @endif

        @else
            <p>No posts yet. Please check back later.</p>
        @endif
    </main>

    {{--    <x-slot name="content">--}}
    {{--        @foreach($posts as $post)--}}
    {{--            <article class="{{ $loop->even ? 'class' : '' }}">--}}
    {{--                <h1>--}}
    {{--                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>--}}
    {{--                </h1>--}}

    {{--                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> for <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>--}}

    {{--                <p>{{ $post->excerpt }}</p>--}}

    {{--            </article>--}}
    {{--        @endforeach--}}
    {{--    </x-slot>--}}
</x-layout>