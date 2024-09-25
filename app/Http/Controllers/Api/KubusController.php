<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class KubusController extends Controller { 
    //Menghitung Volume Kubus
    public function volumeKubus (Request $request)
    {
        $sisi = $request -> sisi;
        $volume = $sisi * $sisi * $sisi;
        return new PostResource(true, 'Berhasil hitung volume kubus', [
            'hasil' => $volume
        ]);
    }

    //Menghitung Luas Permukaan Kubus
    public function luasPermukaanKubus (Request $request)
    {
        $sisi = $request -> sisi;
        $luasPermukaan = 6 * ($sisi * $sisi);
        return new PostResource(true, 'Berhasil hitung keliling segitiga', [
            'hasil' => $luasPermukaan
        ]);
    }
}

?>