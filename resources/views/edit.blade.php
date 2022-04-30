@extends('layouts')

@section('title')
    Edit {{ $post->title }} | {{ config('app.name') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection

@section('content')
    {{-- Create Tutorial Title tailwind --}}
    <div class="mt-2">
        <a href="{{ route('index') }}" class="text-green-600 no-underline">
            ← Back
        </a>
        <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 no-underline ml-3">
            View
        </a>
    </div>

    <div class="mt-5">
        <h2 class="text-2xl">
            Edit <mark>{{ $post->title }}</mark>
        </h2>
    </div>

    @include('_message')

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2 border-slate-300">
                Title
            </label>

            <input type="text" name="title" id="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                value="{{ $post->title }}" required>

            @error('title')
                <p class="text-red-500 text-xs italic">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div class="mb-0">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                Description
            </label>

            <textarea name="description" id="description"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                rows="10">{!! $post->description !!}</textarea>

            @error('description')
                <p class="text-red-500 text-xs italic">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Submit button --}}
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline border-0 cursor-pointer">
                ➤ Save Tutorial
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        var bodyEditor = new SimpleMDE({
            element: document.getElementById("description"),
            tabSize: 4,
            showIcons: ["code", "table"],
            toolbar: [
                "bold",
                "italic",
                "heading",
                "|",
                "quote",
                "unordered-list",
                "ordered-list",
                "|",
                "link",
                "image",
                "|",
                "preview",
                "side-by-side",
                "fullscreen",
                "|",
                "guide"
            ]
        });
    </script>
@endsection
