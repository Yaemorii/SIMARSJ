<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Aset;
use App\Models\JenisMutasi;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasi = Mutasi::with(['asset', 'jenisMutasi', 'ruanganTujuan', 'asset.ruanganAsal', 'asset.kategoriAset', 'asset.kondisiAset', 'asset.satuanAset', 'asset.sumberDana', 'jenisMutasi'])->get();
        return view('mutasi.index', ['data' => $mutasi]);
    }

    public function tambahDenganAset($asetId)
    {
        $asets = Aset::all();
        $jenmutasi = JenisMutasi::all();
        $ruangan = Ruangan::all();
        $selectedAset = Aset::find($asetId); // Mendapatkan aset yang dipilih
    
        return view('mutasi.form', [
            'asets' => $asets,
            'jenmutasi' => $jenmutasi,
            'ruangan' => $ruangan,
            'selectedAset' => $selectedAset
        ]);
    }

    public function simpan(Request $request)
    {
        $mutasi = [
            'tgl_mutasi' => $request->tgl_mutasi,
            'jenis_mutasi' => $request->jenis_mutasi,
            'aset_mutasi' => $request->aset_mutasi,
            'tujuan' => $request->tujuan,
            'alasan_mutasi' => $request->alasan_mutasi,
        ];

        $aset = Aset::findOrFail($request->aset_mutasi);
        $aset->update(['ruangan_asal' => $request->tujuan]);

        Mutasi::create($mutasi);
        return redirect()->route('mutasi');
    }

    public function edit($id)
    {
        $mutasi = Mutasi::with('asset')->where('id', $id)->first();
        $asets = Aset::all();
        $jenmutasi = JenisMutasi::all();  
        $ruangan = Ruangan::all();
        $selectedAset = $mutasi->asset; // Mendapatkan aset yang terkait dengan mutasi
        return view('mutasi.form', ['mutasi' => $mutasi, 'asets' => $asets, 'jenmutasi' => $jenmutasi, 'ruangan' => $ruangan]);
    }

    public function update($id, Request $request)
    {
        $mutasi = [
            'tgl_mutasi' => $request->tgl_mutasi,
            'jenis_mutasi' => $request->jenis_mutasi,
            'aset_mutasi' => $request->aset_mutasi,
            'tujuan' => $request->tujuan,
            'alasan_mutasi' => $request->alasan_mutasi,
        ];

        $aset = Aset::findOrFail($request->aset_mutasi);
        $aset->update(['ruangan_asal' => $request->tujuan]);

        Mutasi::find($id)->update($mutasi);
        return redirect()->route('mutasi');
    }

    public function hapus($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->delete();

        return redirect()->route('mutasi')->with('danger', 'Data berhasil dihapus');
    }
}
