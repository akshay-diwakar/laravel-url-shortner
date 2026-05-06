<x-app-layout>

    <x-slot name="header">
        <h2>Invite User</h2>
    </x-slot>

    <x-alert />

    <div style="padding:20px;width:450px;background:white;border:1px solid #ddd;border-radius:8px;">

        <form method="POST" action="{{ route('invitations.store') }}">
            @csrf

            <div style="margin-bottom:15px;">
                <label>Email</label>
                <br><br>
                <input type="email" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:4px;" name="email" placeholder="Enter email">
            </div>

            @if($user->role === 'SuperAdmin')
                <div style="margin-bottom:15px;">
                    <label>Company Name</label>
                    <br><br>
                    <input type="text"  style="width:100%;padding:10px;border:1px solid #ccc;border-radius:4px;" name="company_name" placeholder="Enter Company Name">
                </div>
            @endif

            <div style="margin-bottom:15px;">
                <label>Role</label>

                <br><br>
                <select name="role" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:4px;">
                    @if($user->role === 'SuperAdmin')
                        <option value="Admin">Admin</option>
                    @endif

                    @if($user->role === 'Admin')
                        <option value="Admin">Admin</option>
                        <option value="Member">Member</option>
                    @endif
                </select>
            </div>

            <button type="submit" style="background:#111827;color:white;padding:10px 18px;border:none;border-radius:4px;cursor:pointer;">Invite</button>
        </form>

    </div>

</x-app-layout>