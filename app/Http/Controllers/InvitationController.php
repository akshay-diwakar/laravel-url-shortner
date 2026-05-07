<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\Company;

class InvitationController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        if (!in_array($user->role, ['SuperAdmin', 'Admin'])) {
            abort(403);
        }

        return view('invitations.create', compact('user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'email' => 'required|email',
            'role'  => 'required',
        ];

        if ($user->role === 'SuperAdmin') {
            $rules['company_name'] = 'required|string';
        }

        $request->validate($rules);

        if ($user->role === 'SuperAdmin') {

            if ($request->role !== 'Admin') {
                abort(403, 'SuperAdmin can only invite Admin');
            }

            $company = Company::firstOrCreate([
                'name' => $request->company_name
            ]);

            Invitation::create([
                'email' => $request->email,
                'role' => $request->role,
                'company_id' => $company->id,
                'invited_by' => $user->id
            ]);
        } elseif ($user->role === 'Admin') {

            if (!in_array($request->role, ['Admin', 'Member'])) {
                abort(403);
            }

            Invitation::create([
                'email' => $request->email,
                'role' => $request->role,
                'company_id' => $user->company_id,
                'invited_by' => $user->id
            ]);
        } else {
            abort(403);
        }

        return redirect()->route('dashboard')->with('success', 'Invitation sent');
    }
}
