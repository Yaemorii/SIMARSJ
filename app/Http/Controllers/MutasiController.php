<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Aset;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasi = Mutasi::with(['asset', 'ruanganAsal', 'ruanganTujuan'])->get();
        return view('mutasi.index', ['data' => $mutasi]);
    }

    public function tambah()
    {
        $asets = Aset::all();  
        $ruangan = Ruangan::all();  // Retrieve all rooms
        return view('mutasi.form', ['asets' => $asets, 'ruangan' => $ruangan]);
    }

    public function simpan(Request $request)
    {
        $mutasi = [
            'tgl_mutasi' => $request->tgl_mutasi,
            'jenis_mutasi' => $request->jenis_mutasi,
            'aset_mutasi' => $request->aset_mutasi,
            'ruangan_asal' => $request->ruangan_asal,
            'tujuan' => $request->tujuan,
            'alasan_mutasi' => $request->alasan_mutasi,
        ];

        Mutasi::create($mutasi);
        return redirect()->route('mutasi');
    }

    public function edit($id)
    {
        $mutasi = Mutasi::where('id', $id)->first();
        $asets = Aset::all();
        $ruangan = Ruangan::all();
        return view('mutasi.form', ['mutasi' => $mutasi, 'asets' => $asets, 'ruangan' => $ruangan]);
    }

    public function update($id, Request $request)
    {
        $mutasi = [
            'tgl_mutasi' => $request->tgl_mutasi,
            'jenis_mutasi' => $request->jenis_mutasi,
            'aset_mutasi' => $request->aset_mutasi,
            'ruangan_asal' => $request->ruangan_asal,
            'tujuan' => $request->tujuan,
            'alasan_mutasi' => $request->alasan_mutasi,
        ];

        Mutasi::find($id)->update($mutasi);
        return redirect()->route('mutasi');
    }

    public function hapus($id)
    {
        Mutasi::find($id)->delete();
        return redirect()->route('mutasi');
    }
}
