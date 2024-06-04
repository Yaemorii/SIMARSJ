<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['kode_aset', 'nama_aset', 'no_register', 'merek', 'ukuran', 'kategori_aset', 'satuan', 'tahun_pembelian', 'sumber_dana', 'pabrik', 'rangka', 'mesin', 'polisi', 'bpkb', 'gambar_aset', 'kondisi', 'harga', 'keterangan'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($aset) {
            // Menghapus mutasi yang terkait dengan aset ini
            Mutasi::where('aset_mutasi', $aset->id)->delete();
            Pemeliharaan::where('aset_pelihara', $aset->id)->delete();
            Pinjam::where('aset_dipinjam', $aset->id)->delete();
            Kepemilikan::where('aset_milik', $aset->id)->delete();
        });
    }

}


