<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuanganController extends Controller
{
    public function index ()
    {
        $ruangan = Ruangan::get();

        return view('ruangan.index', ['data'=>$ruangan]);
    }

    public function tambah()
    {
        return view('ruangan.form');
    }

    public function simpan(Request $request)
    {
        $ruangan = [
            'no_gedung'        => $request->no_gedung,
            'no_lantai'        => $request->no_lantai,
            'no_ruangan'        => $request->no_ruangan,
            'nama_ruangan'      => $request->nama_ruangan,
            'penanggung_jawab'  => $request->penanggung_jawab,
            'jabatan'           => $request->jabatan,
            'nip'               => $request->nip,
        ];

        Ruangan::create($ruangan);

        return redirect()->route('ruangan');
    }

    public function edit($id)
    {
        $ruangan = Ruangan::where('id',$id)->first();

        return view('ruangan.form',['ruangan' => $ruangan]);
    }

    public function update($id, Request $request)
    {
        $ruangan = [
            'no_gedung'        => $request->no_gedung,
            'no_lantai'        => $request->no_lantai,
            'no_ruangan'        => $request->no_ruangan,
            'nama_ruangan'      => $request->nama_ruangan,
            'penanggung_jawab'  => $request->penanggung_jawab,
            'jabatan'           => $request->jabatan,
            'nip'               => $request->nip,
        ];
        Ruangan::find($id)->update($ruangan);

        return redirect()->route('ruangan');
    }

    public function hapus($id)
    {
        Ruangan::find($id)->delete();
        
        return redirect()->route('ruangan');
    }
}
