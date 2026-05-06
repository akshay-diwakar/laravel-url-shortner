<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-semibold">Dashboard</h2>
</x-slot>

<div class="p-6">

    <x-alert />

    {{-- Actions --}}
    <div style="margin-bottom:20px; display:flex; gap:10px; align-items:center;">

        <a href="{{ route('short-urls.index') }}">
            <button style="padding:8px 14px; border:1px solid #ccc; cursor:pointer;">
                View Short URLs
            </button>

        </a>

        @if(in_array($user->role, ['SuperAdmin','Admin']))
            <a href="{{ route('invitations.create') }}">
                <button style="padding:8px 14px; border:1px solid #ccc; cursor:pointer;">
                    Invite User
                </button>
            </a>
        @endif

        @if(in_array($user->role, ['Admin','Member']))
            <a href="{{ route('short-urls.create') }}">
                <button style="padding:8px 14px; border:1px solid #ccc; cursor:pointer;">
                    Create Short URL
                </button>
            </a>
        @endif
    </div>


    @if($user->role === 'SuperAdmin')

        <h3 style="margin-bottom:10px;">Clients</h3>

        <table style="border-collapse: collapse; width: 900px; margin-top: 15px;">
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Total Users</th>
                    <th>Total URLs</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data['companies'] as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->users_count }}</td>
                        <td>{{ $company->short_urls_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No companies found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:15px;">
            {{ $data['companies']->links() }}
        </div>

    @endif

    @if($user->role === 'Admin')

        <h3 style="margin-bottom:10px;">Generated Short URLs</h3>

        <table style="border-collapse: collapse; width: 900px; margin-top: 15px;">
            <thead>
                <tr>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Short Code</th>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Original URL</th>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Created At</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data['urls'] as $url)
                    <tr>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $url->short_code }}</td>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $url->original_url }}</td>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $url->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No URLs found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:15px;">
            {{ $data['urls']->links() }}
        </div>

        <br><br>

        <h3 style="margin-bottom:10px;">Team Members</h3>

        <table style="border-collapse: collapse; width: 900px; margin-top: 15px;">
            <thead>
                <tr>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Name</th>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Role</th>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Email</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data['team'] as $member)
                    <tr>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $member->name }}</td>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $member->role }}</td>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $member->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No team members found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    @endif


    @if($user->role === 'Member')

        <h3 style="margin-bottom:10px;">Your URLs</h3>

        <table style="border-collapse: collapse; width: 900px; margin-top: 15px;">
            <thead>
                <tr>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Short Code</th>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Original URL</th>
                    <th style="border:1px solid #ccc; padding:10px; background:#f3f4f6;">Created At</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data['urls'] as $url)
                    <tr>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $url->short_code }}</td>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $url->original_url }}</td>
                        <td style="border:1px solid #ccc; padding:10px;">{{ $url->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No URLs found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:15px;">
            {{ $data['urls']->links() }}
        </div>

    @endif

</div>
</x-app-layout>