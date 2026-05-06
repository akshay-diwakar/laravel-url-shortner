<x-app-layout>

    <x-slot name="header">
        <h2>Create Short URL</h2>
    </x-slot>

    <div style="padding:20px;width:450px;background:white;border:1px solid #ddd;border-radius:8px;">

        <x-alert />

        <form method="POST" action="{{ route('short-urls.store') }}">
            @csrf

            <div style="margin-bottom:15px;">

                <label>Enter URL</label>
                <br><br>
                <input type="text" name="url" placeholder="https://example.com" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:4px;">
            </div>

            <button style="background:#111827;color:white;padding:10px 18px;border:none;border-radius:4px;cursor:pointer;"> Generate Short URL</button>
        </form>

    </div>

</x-app-layout>