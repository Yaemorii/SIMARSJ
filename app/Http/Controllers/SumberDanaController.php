<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SumberDanaController extends Controller
{
    public function index()
    {
        $sumber = SumberDana::all();

        return view('sumberdana.index', ['data' => $sumber]);
    }

    public function tambah()
    {
        return view('sumberdana.form');
    }

    public function simpan(Request $request)
    {
        $sumber = [
            'kode_sumberdana' => $request->kode_sumberdana,
            'sumberdana' => $request->sumberdana,
        ];

        SumberDana::create($sumber);
        return redirect()->route('sumberdana')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sumber = SumberDana::findOrFail($id);

        return view('sumberdana.form', ['sumberdana' => $sumber]);
    }

    public function update($id, Request $request)
    {
        $sumber = [
            'kode_sumberdana' => $request->kode_sumberdana,
            'sumberdana' => $request->sumberdana,
        ];

        SumberDana::find($id)->update($sumber);
        return redirect()->route('sumberdana')->with('warning', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $sumber = SumberDana::findOrFail($id);
        $sumber->delete();

        return redirect()->route('sumberdana')->with('danger', 'Data berhasil dihapus');
    }
}
