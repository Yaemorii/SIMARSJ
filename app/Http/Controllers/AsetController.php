<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Ruangan;
use App\Models\Kategori;
use App\Models\Kondisi;
use App\Models\Satuan;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        $query = Aset::with(['ruanganAsal', 'kategoriAset', 'kondisiAset', 'satuanAset', 'sumberDana']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('kode_aset', 'LIKE', "%{$search}%")
                    ->orWhere('nama_aset', 'LIKE', "%{$search}%")
                    ->orWhere('no_register', 'LIKE', "%{$search}%")
                    ->orWhere('merek', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('kategori') && $request->kategori != '') {
            $kategori = $request->input('kategori');
            $query->where('kategori_aset', $kategori);
        }

        $aset = $query->get();
        $kategoris = Kategori::all(); 

        return view('aset.index', ['data' => $aset, 'kategoris' => $kategoris]);
    }

    public function tambah()
    {
        $kategoris = Kategori::all();  
        $kondisis = Kondisi::all();
        $satuans = Satuan::all();
        $sumbers = SumberDana::all();
        $ruangan = Ruangan::all();
        // Mendapatkan ID kategori Kendaraan Bermotor
        $kategoriKendaraan = Kategori::where('kategori', 'Kendaraan Bermotor')->first();

        return view('aset.form', [
            'kategoris' => $kategoris,
            'kondisis' => $kondisis,
            'satuans' => $satuans,
            'sumbers' => $sumbers,
            'ruangan' => $ruangan,
            'kategoriKendaraanId' => $kategoriKendaraan->id
        ]);
    }

    public function simpan(Request $request)
    {
        $kategoriKendaraanId = Kategori::where('kategori', 'Kendaraan Bermotor')->first()->id;
    
        $request->validate([
            'kode_aset' => 'required|string|max:255',
            'nama_aset' => 'required|string|max:255',
            'no_register' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'kategori_aset' => 'required|string',
            'tahun_pembelian' => 'required|date',
            'gambar_aset' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kondisi' => 'required|string|max:255',
            'sumber_dana' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'ruangan_asal' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
            'gambar_aset.max' => 'Gambar yang diinput tidak boleh melebihi 2MB',
        ]);
    
        if ($request->kategori_aset == $kategoriKendaraanId) {
            $request->validate([
                'pabrik' => 'required|string|max:255',
                'rangka' => 'required|string|max:255',
                'mesin' => 'required|string|max:255',
                'polisi' => 'required|string|max:255',
                'bpkb' => 'required|string|max:255',
            ]);
        }
    
        $path = null;
        if ($request->hasFile('gambar_aset')) {
            $path = $request->file('gambar_aset')->store('public/aset_images');
        }
    
        $aset = [
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
            'kondisi' => $request->kondisi,
            'harga' => $request->harga,
            'ruangan_asal' => $request->ruangan_asal,
            'keterangan' => $request->keterangan,
        ];
    
        if ($request->kategori_aset == $kategoriKendaraanId) {
            $aset['pabrik'] = $request->pabrik;
            $aset['rangka'] = $request->rangka;
            $aset['mesin'] = $request->mesin;
            $aset['polisi'] = $request->polisi;
            $aset['bpkb'] = $request->bpkb;
        }
    
        Aset::create($aset);
    
        return redirect()->route('aset')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $aset = Aset::where('id', $id)->first();
        $kategoris = Kategori::all();
        $kondisis = Kondisi::all();
        $satuans = Satuan::all();
        $sumbers = SumberDana::all();
        $ruangan = Ruangan::all();
        // Mendapatkan ID kategori Kendaraan Bermotor
        $kategoriKendaraan = Kategori::where('kategori', 'Kendaraan Bermotor')->first();

        return view('aset.form', [
            'aset' => $aset,
            'kategoris' => $kategoris,
            'kondisis' => $kondisis,
            'satuans' => $satuans,
            'sumbers' => $sumbers,
            'ruangan' => $ruangan,
            'kategoriKendaraanId' => $kategoriKendaraan->id
        ]);
    }
    
    public function update($id, Request $request)
    {
        $kategoriKendaraanId = Kategori::where('kategori', 'Kendaraan Bermotor')->first()->id;
    
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
            'kondisi' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'ruangan_asal' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
            'gambar_aset.max' => 'Gambar yang diinput tidak boleh melebihi 2MB',
        ]);
    
        if ($request->kategori_aset == $kategoriKendaraanId) {
            $request->validate([
                'pabrik' => 'required|string|max:255',
                'rangka' => 'required|string|max:255',
                'mesin' => 'required|string|max:255',
                'polisi' => 'required|string|max:255',
                'bpkb' => 'required|string|max:255',
            ]);
        }
    
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
            'kondisi' => $request->kondisi,
            'harga' => $request->harga,
            'ruangan_asal' => $request->ruangan_asal,
            'keterangan' => $request->keterangan,
        ];
    
        if ($request->kategori_aset == $kategoriKendaraanId) {
            $data['pabrik'] = $request->pabrik;
            $data['rangka'] = $request->rangka;
            $data['mesin'] = $request->mesin;
            $data['polisi'] = $request->polisi;
            $data['bpkb'] = $request->bpkb;
        }
    
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
