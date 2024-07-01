<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Aset;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index ()
    {
        $peminjaman = Pinjam::with(['asset', 'ruanganAsal', 'asset.kategoriAset', 'asset.kondisiAset', 'asset.satuanAset', 'asset.sumberDana'])->get();
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
        // Handle case where 'aset_dipinjam' is a single string or an array
        $asetDipinjam = is_array($request->aset_dipinjam) ? $request->aset_dipinjam[0] : $request->aset_dipinjam;

        $peminjaman = [
            'tgl_pinjam'      => $request->tgl_pinjam,
            'tgl_kembali'     => $request->tgl_kembali,
            'aset_dipinjam'   => $asetDipinjam,
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
        // Convert the single asset to an array for the edit view
        $selectedAsets = [$peminjaman->aset_dipinjam];
        return view('peminjaman.form', ['peminjaman' => $peminjaman, 'asets' => $asets, 'ruangan' => $ruangan, 'selectedAsets' => $selectedAsets]);
    }

    public function update($id, Request $request)
    {
        // Handle case where 'aset_dipinjam' is a single string or an array
        $asetDipinjam = is_array($request->aset_dipinjam) ? $request->aset_dipinjam[0] : $request->aset_dipinjam;

        $peminjaman = [
            'tgl_pinjam'      => $request->tgl_pinjam,
            'tgl_kembali'     => $request->tgl_kembali,
            'aset_dipinjam'   => $asetDipinjam,
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
