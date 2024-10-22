<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendaftaranMahasiswa;
use App\Http\Resources\PendaftaranMahasiswaResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PendaftaranMahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa yang terdaftar
    public function index()
    {
        $mahasiswas = PendaftaranMahasiswa::all();
        return PendaftaranMahasiswaResource::collection($mahasiswas);
    }
    // Menyimpan data pendaftaran mahasiswa baru
    public function store(Request $request)
    {
        //mendefinisikan validator 
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'program_studi' => 'required|string',
        ]);
    
        //handle eror validasi data
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        //create mahasiswa
        $mahasiswa = PendaftaranMahasiswa::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'program_studi' => $request->program_studi,
        ]);
    
        //return response
        return response()->json([
            'status' => 'success',
            'message' => 'Data mahasiswa berhasil ditambahkan!',
            'data' => new PendaftaranMahasiswaResource($mahasiswa)
        ], 201);
    }
    
    // Menampilkan data satu mahasiswa berdasarkan ID
    public function show($id)
    {
        $mahasiswa = PendaftaranMahasiswa::findOrFail($id);
        return new PendaftaranMahasiswaResource($mahasiswa);
    }
    // Memperbarui data pendaftaran mahasiswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'tempat_lahir' => 'sometimes|required|string|max:255',
            'tanggal_lahir' => 'sometimes|required|date',
            'jenis_kelamin' => 'sometimes|required|in:Laki-laki,Perempuan',
            'alamat' => 'sometimes|required|string',
            'program_studi' => 'sometimes|required|string',
        ]);
        $mahasiswa = PendaftaranMahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return new PendaftaranMahasiswaResource($mahasiswa);
    }
    // Menghapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = PendaftaranMahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
