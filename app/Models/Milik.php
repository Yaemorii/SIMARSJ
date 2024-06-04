<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milik extends Model
{
    use HasFactory;

    protected $fillable = ['no_milik', 'aset_milik', 'kode_milik', 'regist', 'ruang_milik', 'nama_milik'];

}
