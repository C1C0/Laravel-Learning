<x-layout>
    <x-slot name="content">
        @foreach($posts as $post)
            <article class="{{ $loop->even ? 'class' : '' }}">
                <a href="/posts/{{ $post->slug }}">
                    <h1>{{ $post->title }}</h1>

                </a>
                <p>{{ $post->excerpt }}</p>

            </article>
        @endforeach
    </x-slot>
</x-layout>