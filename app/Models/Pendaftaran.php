<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = "pendaftaran";
    protected $primaryKey = 'id_pendaftaran';
    protected $fillable = [
        'email',
        'nama',
        'nis',
        'asal_sekolah',
        'tingkat_pendidikan',
        'kelas',
        'kartu_pelajar',
        'foto_diri',
        'nama_pembimbing',
        'jenis_kelamin',
        'umur',
        'id_lomba',
    ];

    public function lomba()
    {
        return $this->belongsTo('App\Models\Lomba', 'id_lomba');
    }

}
