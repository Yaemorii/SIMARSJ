<?php

namespace App\Http\Controllers;

use App\Models\JenisMutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JenisMutasiController extends Controller
{
    public function index()
    {
        $jenmut = JenisMutasi::all();

        return view('jenmut.index', ['data' => $jenmut]);
    }

    public function tambah()
    {
        return view('jenmut.form');
    }

    public function simpan(Request $request)
    {
        $jenmut = [
            'kode_mutasi' => $request->kode_mutasi,
            'jenismutasi' => $request->jenismutasi,
        ];

        JenisMutasi::create($jenmut);
        return redirect()->route('jenmut')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenmut = JenisMutasi::findOrFail($id);

        return view('jenmut.form', ['jenmut' => $jenmut]);
    }

    public function update($id, Request $request)
    {
        $jenmut = [
            'kode_mutasi' => $request->kode_mutasi,
            'jenismutasi' => $request->jenismutasi,
        ];

        JenisMutasi::find($id)->update($jenmut);
        return redirect()->route('jenmut')->with('warning', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $jenmut = JenisMutasi::findOrFail($id);
        $jenmut->delete();

        return redirect()->route('jenmut')->with('danger', 'Data berhasil dihapus');
    }
}
