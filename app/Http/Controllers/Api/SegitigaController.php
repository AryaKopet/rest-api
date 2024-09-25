<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class SegitigaController extends Controller { 
    //Menghitung Luas Segitiga
    public function luasSegitiga (Request $request)
    {
        $alas = $request -> alas;
        $tinggi = $request -> tinggi;
        $luas = 0.5 * $alas * $tinggi;
        return new PostResource(true, 'Berhasil menghitung luas segitiga', [
            'hasil' => $luas
        ]);
    }

    //Menghitung Keliling Segitiga
    public function kelilingSegitiga (Request $request)
    {
        $sisi = $request -> sisi;
        $keliling = $sisi + $sisi + $sisi;
        return new PostResource(true, 'Berhasil menghitung keliling segitiga', [
            'hasil' => $keliling
        ]);
    }
}

?>