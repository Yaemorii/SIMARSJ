<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = ['no_gedung', 'no_lantai', 'no_ruangan', 'nama_ruangan', 'penanggung_jawab', 'jabatan', 'nip' ];
}
