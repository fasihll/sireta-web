<?php

use App\Livewire\Admin\Alternatif\Show as Alternatif;
use App\Livewire\Admin\Dashboard\Show as Dashboard;
use App\Livewire\Admin\Kriteria\PerbandiganAhp;
use App\Livewire\Admin\Kriteria\Show as Kriteria;
use App\Livewire\Admin\Penilaian\Show as Penilaian;
use App\Livewire\Admin\Perhitungan\Show as Perhitungan;
use App\Livewire\Admin\Result\Show as Result;
use App\Livewire\Landing\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');


Route::middleware([
    'role.check',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::prefix('kriteria')->group(function () {
        Route::get('/', Kriteria::class)->name('kriteria');
        Route::get('/perbandingan-ahp', PerbandiganAhp::class)->name('perbandingan-ahp');
    });
    Route::get('/alternatif', Alternatif::class)->name('alternatif');
    Route::get('/penilaian', Penilaian::class)->name('penilaian');
    Route::get('/perhitungan', Perhitungan::class)->name('perhitungan');
    Route::get('/result', Result::class)->name('result');
});
