<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Mutasi;
use App\Models\Pemeliharaan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAset = Aset::count();
        $totalMutasi = Mutasi::count();
        $totalPemeliharaan = Pemeliharaan::count();
        $totalRuangan = Ruangan::count();

        return view('dashboard', compact('totalAset', 'totalMutasi', 'totalPemeliharaan', 'totalRuangan'));
    }
}

