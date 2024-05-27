<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $fillable = ['kode_aset', 'nama_aset', 'no_register', 'merek', 'ukuran', 'kategori_aset', 'satuan', 'tahun_pembelian', 'sumber_dana', 'gambar_aset', 'jumlah', 'kondisi', 'harga'];
}
