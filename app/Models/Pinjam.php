<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_pinjam', 'tgl_kembali', 'aset_dipinjam', 'jumlah_dipinjam', 'peminjam' ];
}
