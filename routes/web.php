<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    
    // Short URL
    Route::prefix('short-urls')->group(function () {
        
        Route::get('/', [ShortUrlController::class, 'index'])->name('short-urls.index');
        Route::get('/create', [ShortUrlController::class, 'create'])->name('short-urls.create');
        Route::post('/', [ShortUrlController::class, 'store'])->name('short-urls.store');
    });

    // invitations
    Route::prefix('invitations')->group(function () {

        Route::get('/create', [InvitationController::class, 'create'])->name('invitations.create');
        Route::post('/', [InvitationController::class, 'store'])->name('invitations.store');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->get('/s/{code}', function ($code) {
    $url = \App\Models\ShortUrl::where('short_code', $code)->firstOrFail();
    return redirect()->away($url->original_url);
});

require __DIR__.'/auth.php';
