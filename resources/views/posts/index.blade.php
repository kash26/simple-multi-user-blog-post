@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            @guest
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full px-4">
                        <div class="text-center mx-auto mb-12 lg:mb-10 max-w-[510px]">
                            <h2
                                class="
                                font-bold
                                text-3xl
                                sm:text-4xl
                                md:text-[40px]
                                text-dark
                                mb-4
                                "
                                >
                                You are not connected!
                            </h2>
                            <p class="text-base text-body-color">
                                Create an account or register to be able to post something and like a Post.
                            </p>
                        </div>
                    </div>
                </div>
            @endguest

            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">

                    @csrf

                    <div class="mb-4">

                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Post</button>
                    </div>

                </form>
            @endauth

            @if ($posts->count())

                @foreach ($posts as $post)

                    <x-post :post="$post" />

                @endforeach

                <div class="mt-4">{{ $posts->links() }}</div>

            @else
                <p>There are no posts!</p>
            @endif

        </div>
    </div>

@endsection
