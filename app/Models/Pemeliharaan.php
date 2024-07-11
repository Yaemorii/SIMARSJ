<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_pemeliharaan', 'jenis_pemeliharaan', 'aset_pelihara', 'ruangan', 'biaya_pemeliharaan'];

    public function asset()
    {
        return $this->belongsTo(Aset::class, 'aset_pelihara');
    }

    public function ruanganAsal()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan');
    }

    public function jenisPemeliharaan()
    {
        return $this->belongsTo(JenisPemeliharaan::class, 'jenis_pemeliharaan');
    }

}
