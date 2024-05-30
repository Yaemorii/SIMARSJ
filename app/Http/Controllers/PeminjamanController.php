<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Aset;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index ()
    {
        $peminjaman = Pinjam::with(['asset', 'ruanganAsal'])->get();
        return view('peminjaman.index', ['data' => $peminjaman]);
    }

    public function tambah()
    {
        $asets = Aset::all();
        $ruangan = Ruangan::all();
        return view('peminjaman.form', ['asets' => $asets, 'ruangan' => $ruangan]);
    }

    public function simpan(Request $request)
    {
        $peminjaman = [
            'tgl_pinjam'      => $request->tgl_pinjam,
            'tgl_kembali'     => $request->tgl_kembali,
            'aset_dipinjam'   => $request->aset_dipinjam,
            'jumlah_dipinjam' => $request->jumlah_dipinjam,
            'peminjam'        => $request->peminjam,
            'ruangan_peminjam'=> $request->ruangan_peminjam,
        ];

        Pinjam::create($peminjaman);

        return redirect()->route('peminjaman');
    }

    public function edit($id)
    {
        $peminjaman = Pinjam::where('id', $id)->first();
        $asets = Aset::all();
        $ruangan = Ruangan::all();
        return view('peminjaman.form', ['peminjaman' => $peminjaman, 'asets' => $asets, 'ruangan' => $ruangan]);
    }

    public function update($id, Request $request)
    {
        $peminjaman = [
            'tgl_pinjam'      => $request->tgl_pinjam,
            'tgl_kembali'     => $request->tgl_kembali,
            'aset_dipinjam'   => $request->aset_dipinjam,
            'jumlah_dipinjam' => $request->jumlah_dipinjam,
            'peminjam'        => $request->peminjam,
            'ruangan_peminjam'=> $request->ruangan_peminjam,
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
