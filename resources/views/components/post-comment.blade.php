@props(['comment'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-5">

    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->username }}</h3>

            <p class="text-xs">
                Posted
                <time>{{ $comment->created_at->diffForHumans()}}</time>
            </p>
        </header>


        {{ $comment->body }}

    </div>
</article>
