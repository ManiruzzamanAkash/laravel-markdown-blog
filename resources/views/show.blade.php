@extends('layouts')

@section('title')
    {{ $post->title }} | {{ config('app.name') }}
@endsection

@section('styles')
    {{-- Prism Minified CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/themes/prism.min.css"
        integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Prism Okadia CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/themes/prism-okaidia.min.css"
        integrity="sha512-mIs9kKbaw6JZFfSuo+MovjU+Ntggfoj8RwAmJbVXQ5mkAX5LlgETQEweFPI18humSPHymTb5iikEOKWF7I8ncQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div id="post-details">
        <div class="mt-2">
            <a href="{{ route('index') }}" class="text-green-600 no-underline">
                ← Back
            </a>
            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 no-underline ml-3">
                Edit
            </a>
        </div>
        <h2 class="font-medium text-6xl py-2">
            {{ $post->title }}
        </h2>
        <div class="markdown-post">
            {!! $post->description !!}
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Prism JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/prism.min.js"
        integrity="sha512-RDQSW3KoqJMiX0L/UBgwBmH1EmRYp8LBOiLaA8rBHIy+7OGP/7Gxg8vbt8wG4ZYd29P0Fnoq6+LOytCqx3cyoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Prism Markup templating --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/components/prism-markup-templating.min.js"
        integrity="sha512-+8BiRfWso6waiFDv6tEmWF8yfPGgxAtOYLDUB0rRISLwtpxkJ9lpPNUhxwWlikn3qSO+4RQyzDppi62o3ON/AA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Markdown syntax heighlighting for PHP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/components/prism-php.min.js"
        integrity="sha512-plzrTi61ltEMFf84gTVO9IkvIMfBu07bnDuahvdlIclmFWzXJ9VcRsny9d45sxFZRv3jJg/MHNyuxnUYEMxMEg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Copy to clipboard enable --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"
        integrity="sha512-/kVH1uXuObC0iYgxxCKY41JdWOkKOxorFVmip+YVifKsJ4Au/87EisD1wty7vxN2kAhnWh6Yc8o/dSAXj6Oz7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Prism Markdown JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/components/prism-markdown.min.js"
        integrity="sha512-IHQR8J+JbQpZ1tjkHkq8Ivsgo6ovfnYbQnYzmoKCjTCQG90YVs9l+2P14DRIZ94VBrB+F86Ju4wSGOMOjfVCQQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
