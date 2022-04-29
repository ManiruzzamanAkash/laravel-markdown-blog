@extends('layouts')

@section('title')
    Home | {{ config('app.name') }}
@endsection

@section('content')
    @include('_message')
    <div class="flex flex-wrap justify-center">
        @foreach ($posts as $post)
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border rounded shadow-md m-4">
                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ $post->title }}
                    </div>
                    <div class="font-semibold text-gray-700 py-3 px-6 mb-0">
                        Last updated: {{ $post->updated_at->diffForHumans() }}
                    </div>
                    <div class="px-6 py-3 text-center">
                        <a href="{{ route('posts.show', $post->slug) }}"
                            class="transition text-white bg-blue-500 hover:text-white py-1 px-5 rounded-md no-underline hover:opacity-75">
                            View
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="transition text-green-600 border border-solid border-green-500 py-1 px-5 rounded-md no-underline hover:opacity-75 ml-3">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Post links --}}
    <div class="px-10">
        {{ $posts->links() }}
    </div>
@endsection
