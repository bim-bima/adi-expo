<?php

namespace App\Imports;

use App\Models\DataPendaftaran;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataPendaftaran([
            'nama_sekolah' => $row['nama_sekolah'],
            'alamat_sekolah' => $row['alamat_sekolah'],
            'nama_pembimbing' => $row['nama_pembimbing'],
            'no_pembimbing' => $row['no_pembimbing'],
            'email_pembimbing' => $row['email_pembimbing'],
            'nama_ketua' => $row['nama_sekolah'],
            'nama_anggota1' => $row['nama_anggota1'],
            'nama_anggota2' => $row['nama_anggota2'],
            'nama_lengkap' => $row['nama_lengkap'],
            'no_peserta' => $row['no_peserta'],
            'no_kartu_identitas' => $row['no_kartu_identitas'],
            'alamat_peserta' => $row['alamat_peserta'],
            'email_peserta' => $row['email_peserta'],
            'umur' => $row['umur'],
            'chara_anime' => $row['chara_anime'],
            'jurusan_alumni' => $row['jurusan_alumni'],
            'bidang_lomba' => $row['bidang_lomba'],
            'kelas' => $row['kelas'],
            'kategori_peserta' => $row['kategori_peserta'],
            'daftar_sebagai' => $row['daftar_sebagai'],
            'status' => $row['status'],
        ]);
    }
}
