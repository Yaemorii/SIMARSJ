<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index ()
    {
        $pengadaan = Pengadaan::get();

        return view('pengadaan.index', ['data'=>$pengadaan]);
    }

    public function tambah()
    {
        return view('pengadaan.form');
    }

    public function simpan(Request $request)
    {
        $pengadaan = [
            'tgl_pengadaan'    => $request->tgl_pengadaan,
            'sumber_dana'      => $request->sumber_dana,
            'aset_dibeli'      => $request->aset_dibeli,
            'jumlah_pengadaan' => $request->jumlah_pengadaan,
            'biaya_pengadaan'  => $request->biaya_pengadaan,
        ];

        Pengadaan::create($pengadaan);

        return redirect()->route('pengadaan');
    }

    public function edit($id)
    {
        $pengadaan = Pengadaan::where('id',$id)->first();

        return view('pengadaan.form',['pengadaan' => $pengadaan]);
    }

    public function update($id, Request $request)
    {
        $pengadaan = [
            'tgl_pengadaan'    => $request->tgl_pengadaan,
            'sumber_dana'      => $request->sumber_dana,
            'aset_dibeli'      => $request->aset_dibeli,
            'jumlah_pengadaan' => $request->jumlah_pengadaan,
            'biaya_pengadaan'  => $request->biaya_pengadaan,
        ];
        Pengadaan::find($id)->update($pengadaan);

        return redirect()->route('pengadaan');
    }

    public function hapus($id)
    {
        Pengadaan::find($id)->delete();
        
        return redirect()->route('pengadaan');
    }
}
