<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index ()
    {
        $pemeliharaan = Pemeliharaan::get();

        return view('pemeliharaan.index', ['data'=>$pemeliharaan]);
    }

    public function tambah()
    {
        return view('pemeliharaan.form');
    }

    public function simpan(Request $request)
    {
        $pemeliharaan = [
            'tgl_pemeliharaan'    => $request->tgl_pemeliharaan,
            'jenis_pemeliharaan'  => $request->jenis_pemeliharaan,
            'aset_pelihara'       => $request->aset_pelihara,
            'ruangan'             => $request->ruangan,
            'jumlah_pelihara'     => $request->jumlah_pelihara,
            'biaya_pemeliharaan'  => $request->biaya_pemeliharaan,
        ];

        Pemeliharaan::create($pemeliharaan);

        return redirect()->route('pemeliharaan');
    }

    public function edit($id)
    {
        $pemeliharaan = Pemeliharaan::where('id',$id)->first();

        return view('pemeliharaan.form',['pemeliharaan' => $pemeliharaan]);
    }

    public function update($id, Request $request)
    {
        $pemeliharaan = [
            'tgl_pemeliharaan'    => $request->tgl_pemeliharaan,
            'jenis_pemeliharaan'  => $request->jenis_pemeliharaan,
            'aset_pelihara'       => $request->aset_pelihara,
            'ruangan'             => $request->ruangan,
            'jumlah_pelihara'     => $request->jumlah_pelihara,
            'biaya_pemeliharaan'  => $request->biaya_pemeliharaan,
        ];
        Pemeliharaan::find($id)->update($pemeliharaan);

        return redirect()->route('pemeliharaan');
    }

    public function hapus($id)
    {
        Pemeliharaan::find($id)->delete();
        
        return redirect()->route('pemeliharaan');
    }
}
