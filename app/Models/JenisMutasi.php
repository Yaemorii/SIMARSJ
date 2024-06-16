<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMutasi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_mutasi', 'jenismutasi'];

}
