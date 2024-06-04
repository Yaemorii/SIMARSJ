<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetController extends Controller
{
    public function index()
    {
        $aset = Aset::all();

        return view('aset.index', ['data' => $aset]);
    }

    public function tambah()
    {
        return view('aset.form');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode_aset' => 'required|string|max:255',
            'nama_aset' => 'required|string|max:255',
            'no_register' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'kategori_aset' => 'required|string',
            'satuan' => 'required|string|max:255',
            'tahun_pembelian' => 'required|date',
            'sumber_dana' => 'required|string|max:255',
            'pabrik' => 'required|string|max:255',
            'rangka' => 'required|string|max:255',
            'mesin' => 'required|string|max:255',
            'polisi' => 'required|string|max:255',
            'bpkb' => 'required|string|max:255',
            'gambar_aset' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kondisi' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
            'gambar_aset.max' => 'Gambar yang diinput tidak boleh melebihi 2MB',
        ]);

        $path = null;
        if ($request->hasFile('gambar_aset')) {
            $path = $request->file('gambar_aset')->store('public/aset_images');
        }

        $data = [
            'kode_aset' => $request->kode_aset,
            'gambar_aset' => $path,
            'nama_aset' => $request->nama_aset,
            'no_register' => $request->no_register,
            'merek' => $request->merek, 
            'ukuran' => $request->ukuran,
            'kategori_aset' => $request->kategori_aset,
            'satuan' => $request->satuan,
            'tahun_pembelian' => $request->tahun_pembelian,
            'sumber_dana' => $request->sumber_dana,
            'pabrik' => $request->pabrik,
            'rangka' => $request->rangka,
            'mesin' => $request->mesin,
            'polisi' => $request->polisi,
            'bpkb' => $request->bpkb,
            'kondisi' => $request->kondisi,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ];

        Aset::create($data);

        return redirect()->route('aset')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $aset = Aset::findOrFail($id);

        return view('aset.form', ['aset' => $aset]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'kode_aset' => 'required|string|max:255',
            'nama_aset' => 'required|string|max:255',
            'no_register' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'kategori_aset' => 'required|string',
            'satuan' => 'required|string|max:255',
            'tahun_pembelian' => 'required|date',
            'sumber_dana' => 'required|string|max:255',
            'pabrik' => 'required|string|max:255',
            'rangka' => 'required|string|max:255',
            'mesin' => 'required|string|max:255',
            'polisi' => 'required|string|max:255',
            'bpkb' => 'required|string|max:255',
            'gambar_aset' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kondisi' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
            'gambar_aset.max' => 'Gambar yang diinput tidak boleh melebihi 2MB',
        ]);

        $aset = Aset::findOrFail($id);

        $data = [
            'kode_aset' => $request->kode_aset,
            'nama_aset' => $request->nama_aset,
            'no_register' => $request->no_register,
            'merek' => $request->merek,
            'ukuran' => $request->ukuran,
            'kategori_aset' => $request->kategori_aset,
            'satuan' => $request->satuan,
            'tahun_pembelian' => $request->tahun_pembelian,
            'sumber_dana' => $request->sumber_dana,
            'pabrik' => $request->pabrik,
            'rangka' => $request->rangka,
            'mesin' => $request->mesin,
            'polisi' => $request->polisi,
            'bpkb' => $request->bpkb,
            'kondisi' => $request->kondisi,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('gambar_aset')) {
            if ($aset->gambar_aset) {
                Storage::delete($aset->gambar_aset);
            }
            $data['gambar_aset'] = $request->file('gambar_aset')->store('public/aset_images');
        }

        $aset->update($data);

        return redirect()->route('aset')->with('success', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $aset = Aset::findOrFail($id);

        if ($aset->gambar_aset) {
            Storage::delete($aset->gambar_aset);
        }

        $aset->delete();

        return redirect()->route('aset')->with('danger', 'Data berhasil dihapus');
    }
}
