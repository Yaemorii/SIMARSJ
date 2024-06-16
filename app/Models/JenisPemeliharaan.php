<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPemeliharaan extends Model
{
    use HasFactory;

    protected $fillable = ['kode_pemeliharaan', 'jenispemeliharaan'];

}
