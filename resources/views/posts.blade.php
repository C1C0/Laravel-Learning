<x-layout>
    <x-slot name="content">
        @foreach($posts as $post)
            <article class="{{ $loop->even ? 'class' : '' }}">
                <h1>
                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                </h1>

                <a href="#">{{ $post->category->name }}</a>

                <p>{{ $post->excerpt }}</p>

            </article>
        @endforeach
    </x-slot>
</x-layout>