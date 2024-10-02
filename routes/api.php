<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
        return $request->user();
})->middleware(Authenticate::using('sanctum'));

//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
Route::post('/persegi', [App\Http\Controllers\Api\PersegiController::class,
        'hitungPersegi']);
Route::post('/luasSegitiga', [App\Http\Controllers\Api\SegitigaController::class,
        'luasSegitiga']);
Route::post('/kelilingSegitiga', [App\Http\Controllers\Api\SegitigaController::class,
        'kelilingSegitiga']);
Route::post('/luasPersegiPanjang', [App\Http\Controllers\Api\PersegiPanjangController::class,
        'luasPersegiPanjang']);
Route::post('/kelilingPersegiPanjang', [App\Http\Controllers\Api\PersegiPanjangController::class,
        'kelilingPersegiPanjang']);
Route::post('/luasLingkaran', [App\Http\Controllers\Api\LingkaranController::class,
        'luasLingkaran']);
Route::post('/kelilingLingkaran', [App\Http\Controllers\Api\LingkaranController::class,
        'kelilingLingkaran']);
Route::post('/volumeKubus', [App\Http\Controllers\Api\KubusController::class,
        'volumeKubus']);
Route::post('/luasPermukaanKubus', [App\Http\Controllers\Api\KubusController::class,
        'luasPermukaanKubus']);

