<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// api daerah

const tahun = 2024;
Route::get('/provinces', function () {
    $response = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_pro?thn=' . tahun);
    return $response->json();
})->name('getallprovinces');

Route::get('/kabupaten/{provinsi_id}', function ($province_id) {
    $response = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_kab?thn=' . tahun . '&lvl=11&pro=' . $province_id . '');
    return $response->json();
})->name('getallkabupaten');

Route::get('/kecamatan/{provinsi_id}/{kabupaten_id}', function ($province_id, $kabupaten_id) {
    $response = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_kec?thn=' . tahun . '&lvl=12&pro=' . $province_id . '&kab=' . $kabupaten_id . '');
    return $response->json();
})->name('getallkecamatan');

Route::get('/desa/{provinsi_id}/{kabupaten_id}/{kecamatan_id}', function ($province_id, $kabupaten_id, $kecamatan_id) {
    $response = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_des?thn=' . tahun . '&lvl=13&pro=' . $province_id . '&kab=' . $kabupaten_id . '&kec=' . $kecamatan_id . '');
    return $response->json();
})->name('getalldesa');

// api daerah