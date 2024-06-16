<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::all();

        return view('satuan.index', ['data' => $satuan]);
    }

    public function tambah()
    {
        return view('satuan.form');
    }

    public function simpan(Request $request)
    {
        $satuan = [
            'kode_satuan' => $request->kode_satuan,
            'nama_satuan' => $request->nama_satuan,
        ];

        Satuan::create($satuan);
        return redirect()->route('satuan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);

        return view('satuan.form', ['satuan' => $satuan]);
    }

    public function update($id, Request $request)
    {
        $satuan = [
            'kode_satuan' => $request->kode_satuan,
            'nama_satuan' => $request->nama_satuan,
        ];

        Satuan::find($id)->update($satuan);
        return redirect()->route('satuan')->with('warning', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->route('satuan')->with('danger', 'Data berhasil dihapus');
    }
}
