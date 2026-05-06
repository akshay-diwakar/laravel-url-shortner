<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [];

        if ($user->role === 'SuperAdmin') {

            $data['companies'] = Company::withCount('users')
                ->withCount('shortUrls')
                ->latest()->paginate(5);

        } elseif ($user->role === 'Admin') {

            $data['urls'] = ShortUrl::where('company_id', $user->company_id)->latest()->paginate(5);
            $data['team'] = $user->company ? $user->company->users : collect();
        
        } elseif ($user->role === 'Member') {

            $data['urls'] = ShortUrl::where('created_by', $user->id)->latest()->paginate(5);
        }

        return view('dashboard.index', compact('data', 'user'));
    }
}
