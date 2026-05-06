<x-app-layout>

    <x-slot name="header">
        <h2>Create Short URL</h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('short-urls.store') }}">
            @csrf

            <input type="text" name="url" placeholder="Enter URL" style="width:300px">

            @error('url')
                <p style="color:red">{{ $message }}</p>
            @enderror

            <button type="submit">Generate</button>
        </form>

    </div>

</x-app-layout>