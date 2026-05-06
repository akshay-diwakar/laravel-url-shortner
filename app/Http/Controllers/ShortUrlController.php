<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'SuperAdmin') {
            abort(403, 'SuperAdmin cannot view all URLs');
        }

        if ($user->role === 'Admin') {
            $urls = \App\Models\ShortUrl::where('company_id', '!=', $user->company_id)->get();
        } elseif ($user->role === 'Member') {
            $urls = \App\Models\ShortUrl::where('created_by', '!=', $user->id)->get();
        } else {
            $urls = collect();
        }

        return view('short_urls.index', compact('urls', 'user'));
    }

    public function create()
    {
        $user = auth()->user();

        if ($user->role === 'SuperAdmin') {
            abort(403);
        }

        if (!in_array($user->role, ['Admin', 'Member'])) {
            abort(403);
        }

        return view('short_urls.create');
    } 
    
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role === 'SuperAdmin') {
            abort(403);
        }

        if (!in_array($user->role, ['Admin', 'Member'])) {
            abort(403);
        }

        $request->validate([
            'url' => 'required|url'
        ]);

        ShortUrl::create([
            'original_url' => $request->url,
            'short_code'   => Str::random(6),
            'created_by'   => $user->id,
            'company_id'   => $user->company_id
        ]);

        return redirect()->route('dashboard')->with('success', 'Short URL created');
    }
}
