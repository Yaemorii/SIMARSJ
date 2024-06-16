<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_aset', 'nama_aset', 'no_register', 'merek', 'ukuran', 'satuan', 'kategori_aset', 'tahun_pembelian', 
        'gambar_aset', 'kondisi', 'sumber_dana', 'harga', 'keterangan'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($aset) {
            // Menghapus mutasi yang terkait dengan aset ini
            Mutasi::where('aset_mutasi', $aset->id)->delete();
            Pemeliharaan::where('aset_pelihara', $aset->id)->delete();
            Pinjam::where('aset_dipinjam', $aset->id)->delete();
        });
    }

    public function kategoriAset()
    {
        return $this->belongsTo(Kategori::class, 'kategori_aset');
    }

    public function kondisiAset()
    {
        return $this->belongsTo(Kondisi::class, 'kondisi');
    }

    public function satuanAset()
    {
        return $this->belongsTo(Satuan::class, 'satuan');
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class, 'sumber_dana');
    }
}