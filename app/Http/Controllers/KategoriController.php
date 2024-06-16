<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('kategori.index', ['data' => $kategori]);
    }

    public function tambah()
    {
        return view('kategori.form');
    }

    public function simpan(Request $request)
    {
        $kategori = [
            'kode_kategori' => $request->kode_kategori,
            'kategori' => $request->kategori,
        ];

        Kategori::create($kategori);
        return redirect()->route('kategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.form', ['kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $kategori = [
            'kode_kategori' => $request->kode_kategori,
            'kategori' => $request->kategori,
        ];

        Kategori::find($id)->update($kategori);
        return redirect()->route('kategori')->with('warning', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori')->with('danger', 'Data berhasil dihapus');
    }
}
