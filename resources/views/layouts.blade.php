<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="m-0 font-serif">
    <nav class="bg-gray-800 sticky top-0 z-10">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between p-4">
            <div class="flex flex-col md:flex-row items-center">
                <a href="{{ route('index') }}" class="text-white text-lg font-semibold no-underline">
                    Laravel Markdown Blog
                </a>
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <a href="{{ route('index') }}" class="text-white text-lg font-semibold no-underline mr-4">
                    Tutorials
                </a>
                <a href="{{ route('posts.create') }}"
                    class="transition text-white text-lg font-semibold no-underline mr-4 border border-green-500 border-solid px-4 rounded-lg hover:bg-green-600 hover:text-white">
                    Create New
                </a>
            </div>
        </div>
    </nav>

    {{-- post list card tailwind css --}}
    <div class="container mx-auto px-4 mb-6">
        @include('_message')
        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
