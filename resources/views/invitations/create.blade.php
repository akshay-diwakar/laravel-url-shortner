<x-app-layout>

    <x-slot name="header">
        <h2>Invite User</h2>
    </x-slot>

    @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="p-6">

        <form method="POST" action="{{ route('invitations.store') }}">
            @csrf

            <div>
                <input type="email" name="email" placeholder="Enter email">
            </div>

            @if($user->role === 'SuperAdmin')
                <div>
                    <input type="text" name="company_name" placeholder="Enter Company Name">
                </div>
            @endif

            <div>
                <select name="role">
                    @if($user->role === 'SuperAdmin')
                        <option value="Admin">Admin</option>
                    @endif

                    @if($user->role === 'Admin')
                        <option value="Admin">Admin</option>
                        <option value="Member">Member</option>
                    @endif
                </select>
            </div>

            <button type="submit">Invite</button>
        </form>

    </div>

</x-app-layout>