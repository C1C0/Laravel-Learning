@auth
    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="post">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">Want to participate ?</h2>
            </header>

            <div>
                            <textarea name="body" id="body" cols="30" rows="5"
                                      placeholder="Quick, thing of something..."
                                      class="w-full mt-5 text-sm focus:outline-none focus:ring"
                                      required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 border-t borderg-gray-200 pt-6">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-500 hover:underline hover:text-blue-600">Register</a>
        or
        <a href="/login" class="text-blue-500 hover:underline hover:text-blue-600">Log In</a> to
        leave a comment.
    </p>
@endauth
