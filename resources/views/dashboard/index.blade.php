<x-app-layout>

<x-slot name="header">
    <h2>Dashboard</h2>
</x-slot>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<a href="{{ route('short-urls.index') }}">
    <button>View Short URLs</button>
</a>

@if(in_array($user->role, ['SuperAdmin','Admin']))
    <a href="{{ route('invitations.create') }}">
        <button>Invite User</button>
    </a>
@endif

@if(in_array($user->role, ['Admin','Manager']))
    <a href="{{ route('short-urls.create') }}">
        <button>Create Short URL</button>
    </a>
@endif


@if($user->role === 'SuperAdmin')

    <h3>Clients</h3>

    <table border="1" cellpadding="10">
        <tr>
            <th>Client Name</th>
            <th>Total Users</th>
            <th>Total URLs</th>
        </tr>

        @foreach($data['companies'] as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->users_count }}</td>
                <td>{{ $company->short_urls_count }}</td>
            </tr>
        @endforeach
    </table>

@endif


@if($user->role === 'Admin')

    <h3>Generated Short URLs</h3>

    <table border="1">
        @foreach($data['urls'] as $url)
            <tr>
                <td>{{ $url->short_code }}</td>
                <td>{{ $url->original_url }}</td>
            </tr>
        @endforeach
    </table>

    <h3>Team Members</h3>

    @foreach($data['team'] as $member)
        <p>{{ $member->name }} ({{ $member->role }})</p>
    @endforeach

@endif


@if($user->role === 'Member')

    <h3>Other Users URLs</h3>

    @foreach($data['urls'] as $url)
        <p>{{ $url->short_code }} - {{ $url->original_url }}</p>
    @endforeach

@endif

</x-app-layout>