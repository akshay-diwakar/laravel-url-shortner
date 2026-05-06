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
            $urls = ShortUrl::with(['user', 'company'])->latest()->paginate(10);
        } elseif ($user->role === 'Admin') {
            $urls = ShortUrl::with(['user', 'company'])->where('company_id', $user->company_id)->latest()->paginate(10);
        } elseif ($user->role === 'Member') {
            $urls = ShortUrl::with(['user', 'company'])->where('created_by', $user->id)->latest()->paginate(10);
        } else {
            abort(403);
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

        do {
            $code = Str::random(6);
        } while (ShortUrl::where('short_code', $code)->exists());
        
        ShortUrl::create([
            'original_url' => $request->url,
            'short_code'   => $code,
            'created_by'   => $user->id,
            'company_id'   => $user->company_id
        ]);

        return redirect()->route('dashboard')->with('success', 'Short URL created');
    }
}
