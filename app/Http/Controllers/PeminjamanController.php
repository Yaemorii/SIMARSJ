<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index ()
    {
        $peminjaman = Pinjam::get();

        return view('peminjaman.index', ['data'=>$peminjaman]);
    }

    public function tambah()
    {
        return view('peminjaman.form');
    }

    public function simpan(Request $request)
    {
        $peminjaman = [
            'tgl_pinjam'      => $request->tgl_pinjam,
            'tgl_kembali'     => $request->tgl_kembali,
            'aset_dipinjam'   => $request->aset_dipinjam,
            'jumlah_dipinjam' => $request->jumlah_dipinjam,
            'peminjam'        => $request->peminjam,
        ];

        Pinjam::create($peminjaman);

        return redirect()->route('peminjaman');
    }

    public function edit($id)
    {
        $peminjaman = Pinjam::where('id',$id)->first();

        return view('peminjaman.form',['peminjaman' => $peminjaman]);
    }

    public function update($id, Request $request)
    {
        $peminjaman = [
            'tgl_pinjam'      => $request->tgl_pinjam,
            'tgl_kembali'     => $request->tgl_kembali,
            'aset_dipinjam'   => $request->aset_dipinjam,
            'jumlah_dipinjam' => $request->jumlah_dipinjam,
            'peminjam'        => $request->peminjam,
        ];
        Pinjam::find($id)->update($peminjaman);

        return redirect()->route('peminjaman');
    }

    public function hapus($id)
    {
        Pinjam::find($id)->delete();
        
        return redirect()->route('peminjaman');
    }
}
