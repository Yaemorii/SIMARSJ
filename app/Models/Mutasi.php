<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_mutasi', 'jenis_mutasi','aset_mutasi', 'ruangan_asal','tujuan', 'nilai_aset', 'alasan_mutasi', 'sumber_dana'];
}
