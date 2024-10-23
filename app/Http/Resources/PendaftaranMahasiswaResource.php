<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PendaftaranMahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'program_studi' => $this->program_studi,
            'email' => $this->email,
            'no_telepon' => $this->no_telepon,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), 
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), 
        ];
    }
}
