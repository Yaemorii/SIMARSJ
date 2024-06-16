<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KondisiController extends Controller
{
    public function index()
    {
        $kondisi = Kondisi::all();

        return view('kondisi.index', ['data' => $kondisi]);
    }

    public function tambah()
    {
        return view('kondisi.form');
    }

    public function simpan(Request $request)
    {
        $kondisi = [
            'nama_kondisi' => $request->nama_kondisi,
            'kode_kondisi' => $request->kode_kondisi,
        ];

        Kondisi::create($kondisi);
        return redirect()->route('kondisi')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kondisi = Kondisi::findOrFail($id);

        return view('kondisi.form', ['kondisi' => $kondisi]);
    }

    public function update($id, Request $request)
    {
        $kondisi = [
            'nama_kondisi' => $request->nama_kondisi,
            'kode_kondisi' => $request->kode_kondisi,
        ];

        Kondisi::find($id)->update($kondisi);
        return redirect()->route('kondisi')->with('warning', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $kondisi = Kondisi::findOrFail($id);
        $kondisi->delete();

        return redirect()->route('kondisi')->with('danger', 'Data berhasil dihapus');
    }
}
