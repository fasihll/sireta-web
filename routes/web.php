<?php

use App\Livewire\Admin\Alternatif\Show as Alternatif;
use App\Livewire\Admin\Dashboard\Show as Dashboard;
use App\Livewire\Landing\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/alternatif', Alternatif::class)->name('alternatif');

Route::middleware([
    'role.check',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
