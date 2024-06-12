<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milik extends Model
{
    use HasFactory;

    protected $fillable = ['no_milik', 'aset_milik', 'kode_milik', 'regist', 'ruang_milik', 'nama_milik'];

    public function asset()
    {
        return $this->belongsTo(Aset::class, 'aset_milik');
    }

    public function assetKode()
    {
        return $this->belongsTo(Aset::class, 'kode_milik');
    }

    public function assetRegist()
    {
        return $this->belongsTo(Aset::class, 'regist');
    }

    public function ruangMilik()
    {
        return $this->belongsTo(Ruangan::class, 'ruang_milik');
    }

    public function namaMilik()
    {
        return $this->belongsTo(Ruangan::class, 'nama_milik');
    }
}
