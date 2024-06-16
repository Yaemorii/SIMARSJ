<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\Aset;
use App\Models\JenisPemeliharaan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index ()
    {
        $pemeliharaan = Pemeliharaan::with(['asset', 'ruanganAsal', 'asset.kategoriAset', 'asset.kondisiAset', 'asset.satuanAset', 'asset.sumberDana', 'jenisPemeliharaan'])->get();
        return view('pemeliharaan.index', ['data' => $pemeliharaan]);
    }

    public function tambah()
    {
        $asets = Aset::all();
        $jenpel = JenisPemeliharaan::all();
        $ruangan = Ruangan::all();
        return view('pemeliharaan.form', ['asets' => $asets, 'jenpel' => $jenpel, 'ruangan' => $ruangan]);
    }

    public function simpan(Request $request)
    {
        $pemeliharaan = [
            'tgl_pemeliharaan'    => $request->tgl_pemeliharaan,
            'jenis_pemeliharaan'  => $request->jenis_pemeliharaan,
            'aset_pelihara'       => $request->aset_pelihara,
            'ruangan'             => $request->ruangan,
            'biaya_pemeliharaan'  => $request->biaya_pemeliharaan,
        ];

        Pemeliharaan::create($pemeliharaan);

        return redirect()->route('pemeliharaan');
    }

    public function edit($id)
    {
        $pemeliharaan = Pemeliharaan::where('id', $id)->first();
        $asets = Aset::all();
        $jenpel = JenisPemeliharaan::all();
        $ruangan = Ruangan::all();
        return view('pemeliharaan.form', ['pemeliharaan' => $pemeliharaan, 'asets' => $asets, 'jenpel' => $jenpel, 'ruangan' => $ruangan]);
    }

    public function update($id, Request $request)
    {
        $pemeliharaan = [
            'tgl_pemeliharaan'    => $request->tgl_pemeliharaan,
            'jenis_pemeliharaan'  => $request->jenis_pemeliharaan,
            'aset_pelihara'       => $request->aset_pelihara,
            'ruangan'             => $request->ruangan,
            'biaya_pemeliharaan'  => $request->biaya_pemeliharaan,
        ];
        Pemeliharaan::find($id)->update($pemeliharaan);

        return redirect()->route('pemeliharaan');
    }

    public function hapus($id)
    {
        $pemeliharaan = Pemeliharaan::findOrFail($id);
        $pemeliharaan->delete();

        return redirect()->route('pemeliharaan')->with('danger', 'Data berhasil dihapus');
    }
}
