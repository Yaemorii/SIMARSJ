<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_pinjam', 'tgl_kembali', 'aset_dipinjam', 'peminjam', 'ruangan_peminjam' ];

    public function asset()
    {
        return $this->belongsTo(Aset::class, 'aset_dipinjam');
    }

    public function ruanganAsal()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_peminjam');
    }
}
