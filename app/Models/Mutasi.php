<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_mutasi', 'jenis_mutasi', 'aset_mutasi', 'tujuan', 'alasan_mutasi'];

    public function asset()
    {
        return $this->belongsTo(Aset::class, 'aset_mutasi');
    }

    public function jenisMutasi()
    {
        return $this->belongsTo(JenisMutasi::class, 'jenis_mutasi');
    }

    public function ruanganTujuan()
    {
        return $this->belongsTo(Ruangan::class, 'tujuan');
    }
}
