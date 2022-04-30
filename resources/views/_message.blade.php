@if (Session::has('success'))
    <div class="bg-green-100 border border-solid border-green-500 mt-2 rounded">
        <p class="p-2 text-green-500">
            {!! Session::get('success') !!}
        </p>
    </div>
@endif

@if (Session::has('error'))
    <div class="bg-red-100 border border-solid border-red-500 mt-2 rounded">
        <p class="p-2 text-red-600">
            {!! Session::get('error') !!}
        </p>
    </div>
@endif
