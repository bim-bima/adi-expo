<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendaftaran extends Model
{
    use HasFactory;

    protected $table = "data_pendaftaran";
    protected $primaryKey = 'id_daftar';
    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
        'nama_pembimbing',
        'no_pembimbing',
        'email_pembimbing',
        'nama_ketua',
        'nama_anggota1',
        'nama_anggota2',
        'nama_lengkap',
        'no_peserta',
        'no_kartu_identitas',
        'alamat_peserta',
        'email_peserta',
        'umur',
        'chara_anime',
        'jurusan_alumni',
        'bidang_lomba',
        'kelas',
        'kategori_peserta',
        'daftar_sebagai',
        'status',
        'qr',
        'token',
    ];
}
