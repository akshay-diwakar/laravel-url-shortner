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

        $companies = [];

        if ($user->role === 'SuperAdmin') {
            $companies = Company::all();
        }

        return view('invitations.create', compact('user','companies'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'email' => 'required|email',
            'role' => 'required|in:Admin,Member,Manager,Sales'
        ];

        if ($user->role === 'SuperAdmin') {
            $rules['company_id'] = 'required|exists:companies,id';
        }

        $request->validate($rules);

        if ($user->role === 'SuperAdmin') {

            if ($request->role !== 'Admin') {
                abort(403, 'SuperAdmin can only invite Admin');
            }

            $company = Company::findOrFail($request->company_id);

            Invitation::create([
                'email' => $request->email,
                'role' => $request->role,
                'company_id' => $company->id,
                'invited_by' => $user->id
            ]);
        } elseif ($user->role === 'Admin') {

            if (!in_array($request->role, ['Admin','Member','Manager','Sales'])) {
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
