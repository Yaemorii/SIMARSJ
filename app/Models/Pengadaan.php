<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_pengadaan', 'sumber_dana', 'aset_dibeli', 'jumlah_pengadaan', 'biaya_pengadaan'];
}
