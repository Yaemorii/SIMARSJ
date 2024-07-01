<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class JenisPemeliharaanController extends Controller
{
    public function index()
    {
        $jenpel = JenisPemeliharaan::all();

        return view('jenpel.index', ['data' => $jenpel]);
    }

    public function tambah()
    {
        return view('jenpel.form');
    }

    public function simpan(Request $request)
    {
        $jenpel = [
            'kode_pemeliharaan' => $request->kode_pemeliharaan,
            'jenispemeliharaan' => $request->jenispemeliharaan,
        ];

        JenisPemeliharaan::create($jenpel);
        return redirect()->route('jenpel')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenpel = JenisPemeliharaan::findOrFail($id);

        return view('jenpel.form', ['jenpel' => $jenpel]);
    }

    public function update($id, Request $request)
    {
        $jenpel = [
            'kode_jenis' => $request->kode_pemeliharaan,
            'jenispemeliharaan' => $request->jenispemeliharaan,
        ];

        JenisPemeliharaan::find($id)->update($jenpel);
        return redirect()->route('jenpel')->with('warning', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $jenpel = JenisPemeliharaan::findOrFail($id);
        $jenpel->delete();

        return redirect()->route('jenpel')->with('danger', 'Data berhasil dihapus');
    }
}
