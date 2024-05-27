<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index ()
    {
        $mutasi = Mutasi::get();

        return view('mutasi.index', ['data'=>$mutasi]);
    }

    public function tambah()
    {
        return view('mutasi.form');
    }

    public function simpan(Request $request)
    {
        $mutasi = [
            'tgl_mutasi'    => $request->tgl_mutasi,
            'jenis_mutasi'  => $request->jenis_mutasi,
            'aset_mutasi'   => $request->aset_mutasi,
            'ruangan_asal'  => $request->ruangan_asal,
            'tujuan'        => $request->tujuan,
            'nilai_aset'    => $request->nilai_aset,
            'alasan_mutasi' => $request->alasan_mutasi,
            'sumber_dana'   => $request->sumber_dana,
        ];

        Mutasi::create($mutasi);

        return redirect()->route('mutasi');
    }

    public function edit($id)
    {
        $mutasi = Mutasi::where('id',$id)->first();

        return view('mutasi.form',['mutasi' => $mutasi]);
    }

    public function update($id, Request $request)
    {
        $mutasi = [
            'tgl_mutasi'    => $request->tgl_mutasi,
            'jenis_mutasi'  => $request->jenis_mutasi,
            'aset_mutasi'   => $request->aset_mutasi,
            'ruangan_asal'  => $request->ruangan_asal,
            'tujuan'        => $request->tujuan,
            'nilai_aset'    => $request->nilai_aset,
            'alasan_mutasi' => $request->alasan_mutasi,
            'sumber_dana'   => $request->sumber_dana,
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
