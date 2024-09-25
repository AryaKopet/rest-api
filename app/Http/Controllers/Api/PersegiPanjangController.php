<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PersegiPanjangController extends Controller {
    //Menghitung Luas Persegi Panjang
    public function luasPersegiPanjang (Request $request)
    {
        $panjang = $request -> panjang;
        $lebar = $request -> lebar;
        $luas = $panjang * $lebar;
        
        return new PostResource(true, 'Berhasil menghitung luas persegi panjang', [
            'hasil' => $luas
        ]);
    }

    //Menghitung Keliling Persegi Panjang
    public function kelilingPersegiPanjang(Request $request)
    {
        $panjang = $request -> panjang;
        $lebar = $request -> lebar;
        $keliling = 2 * ($panjang * $lebar);
        
        return new PostResource(true, 'Berhasil menghitung keliling persegi panjang', [
            'hasil' => $keliling
        ]);
    }
}

?>