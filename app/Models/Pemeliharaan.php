<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_pemeliharaan', 'jenis_pemeliharaan', 'aset_pelihara', 'ruangan', 'jumlah_pelihara', 'biaya_pemeliharaan'];
}
