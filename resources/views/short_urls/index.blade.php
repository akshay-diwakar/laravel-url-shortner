<x-app-layout>

    <x-slot name="header">
        <h2>Short URLs</h2>
    </x-slot>

    <div class="p-6">

        @if($urls->isEmpty())
            <p>No URLs available</p>
        @else

            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>Short Code</th>
                        <th>Original URL</th>
                        <th>Created By</th>
                        <th>Company</th>
                        <th>Access</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($urls as $url)
                        <tr>
                            <td>{{ $url->short_code }}</td>
                            <td>{{ $url->original_url }}</td>
                            <td>{{ $url->user->name ?? 'N/A' }}</td>
                            <td>{{ $url->company->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ url('/s/'.$url->short_code) }}">
                                    Open
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        @endif

    </div>

</x-app-layout>