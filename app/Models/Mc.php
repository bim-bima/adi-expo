<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc extends Model
{
    use HasFactory;

    protected $table = "mc";
    protected $primaryKey = 'id_mc';
    protected $fillable = [
        'nama',
        'jabatan',
        'deskripsi',
        'image',
    ];
}
