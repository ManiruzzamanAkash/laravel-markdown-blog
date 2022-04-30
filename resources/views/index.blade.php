@extends('layouts')

@section('title')
    Home | {{ config('app.name') }}
@endsection

@section('content')
    <div class="flex flex-wrap justify-center">
        @foreach ($posts as $post)
            <div class="w-full max-w-sm transition hover:-translate-y-2">
                <div class="flex flex-col break-words bg-white border rounded shadow-md m-4 group">
                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ $post->title }}
                    </div>
                    <div class="py-3 px-6">
                        {{ Str::limit(strip_tags($post->description), 100) }}...
                    </div>
                    <div class="font-thin text-gray-500 py-3 px-6 mb-0 mt-4">
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
                        {{-- a tag with alert confirmation delete --}}
                        <a href="#"
                            class="transition text-red-600 border border-solid border-red-500 py-1 px-5 rounded-md no-underline hover:opacity-75 ml-3"
                            onclick="return confirmAndDeletePost({{ $post->id }})">
                            Delete
                        </a>
                        <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (!count($posts))
        <div class="flex flex-wrap justify-center mt-5">
            <div class="font-semibold bg-gray-100 text-gray-700 py-3 px-6 mb-0">
                Ooops !! No tutorials found. 
            </div>
        </div>

        {{-- Create Link --}}
        <div class="flex flex-wrap justify-center mt-5">
            <a href="{{ route('posts.create') }}"
                class="transition text-white bg-blue-500 hover:text-white py-3 px-6 rounded-md no-underline hover:opacity-75">
                + Create New
            </a>
        </div>
    @endif

    {{-- Post links --}}
    <div class="px-10">
        {{ $posts->links() }}
    </div>
@endsection

@section('scripts')
    <script>
        function confirmAndDeletePost(id) {
            const form = document.getElementById(`delete-form-${id}`);
            const link = document.querySelector(`a[href="${form.action}"]`);
            const message = `Are you sure you want to delete this tutorial?`;
            if (confirm(message)) {
                form.submit();
            } else {
                return false;
            }
        }
    </script>
@endsection
