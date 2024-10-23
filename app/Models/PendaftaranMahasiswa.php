<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranMahasiswa extends Model
{
    use HasFactory;

    // Tentukan field yang dapat diisi
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'program_studi',
        'email',
        'no_telepon'
    ];
}
