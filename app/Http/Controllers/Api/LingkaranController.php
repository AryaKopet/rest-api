<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class LingkaranController extends Controller { 
    //Menghitung Luas Lingkaran
    public function luasLingkaran (Request $request)
    {
        $phi = $request -> phi;
        $jari_jari = $request -> jari_jari;
        $luas = $phi * ($jari_jari * $jari_jari);
        return new PostResource(true, 'Berhasil menghitung luas lingkaran', [
            'hasil' => $luas
        ]);
    }

    //Menghitung Keliling Lingkaran
    public function kelilingLingkaran (Request $request)
    {
        $phi = $request -> phi;
        $jari_jari = $request -> jari_jari;
        $keliling = 2 * $phi * $jari_jari;
        return new PostResource(true, 'Berhasil menghitung keliling lingkaran', [
            'hasil' => $keliling
        ]);
    }
}

?>