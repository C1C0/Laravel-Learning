<x-layout>
    <x-slot name="content">
        <article>
            <h1>{{ $post->title }}</h1>
            <a href="#">{{ $post->category->name }}</a>
            <div>{!! $post->body !!}</div>
        </article>

        <a href="/">Go back</a>
    </x-slot>
</x-layout>