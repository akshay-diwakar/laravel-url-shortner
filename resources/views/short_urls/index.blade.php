<x-app-layout>

    <x-slot name="header">
        <h2 style="font-size:24px; font-weight:bold;">
            Short URLs
        </h2>
    </x-slot>

    <div style="padding:20px;">

        <x-alert />

        <div style="margin-bottom:20px;">
            <a href="{{ route('dashboard') }}">
                <button style="padding:8px 14px; border:1px solid #ccc; cursor:pointer;">
                    Back To Dashboard
                </button>
            </a>
        </div>

        @if($urls->isEmpty())
            <p>No URLs available</p>
        @else

            <table style="border-collapse: collapse;width: 1000px;margin-top:15px;">
                <thead>
                    <tr>
                        <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">
                            Short Code
                        </th>

                        <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">
                            Original URL
                        </th>

                        <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">
                            Created By
                        </th>

                        <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">
                            Company
                        </th>

                        <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">
                            Created At
                        </th>

                        <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($urls as $url)
                        <tr>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $url->short_code }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $url->original_url }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $url->user->name ?? 'N/A' }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $url->company->name ?? 'N/A' }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $url->created_at->format('d M Y') }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                <a href="{{ url('/s/'.$url->short_code) }}" target="_blank">
                                    Open
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <div style="margin-top:20px;">
                {{ $urls->links() }}
            </div>
        @endif
    </div>

</x-app-layout>