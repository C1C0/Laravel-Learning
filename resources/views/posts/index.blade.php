<x-layout>

    @include("posts._header")

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
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
