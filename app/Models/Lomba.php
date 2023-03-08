<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $table = "lomba";
    protected $primaryKey = 'id_lomba';
    protected $fillable = [
        'nama_lomba',
        'deskripsi',
        'harga',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function pendaftaran()
    {
        return $this->hasOne('App\Models\Pendaftaran', 'id_lomba');
    }
}
