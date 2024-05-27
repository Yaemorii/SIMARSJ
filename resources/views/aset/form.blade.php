@extends('layouts.app')

@section('title','Form Aset')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ $errors->first('gambar_aset') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form action="{{ isset($aset) ? route('aset.tambah.update', $aset->id) : route('aset.tambah.simpan') }}" method="post" enctype="multipart/form-data">
@csrf
@if(isset($aset))
    @method('PUT')
@endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($aset) ? 'Form Edit Aset' : 'Form Tambah Aset' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode_aset">Kode Aset</label>
                        <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="{{ isset($aset) ? $aset->kode_aset : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_aset">Nama Aset</label>
                        <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="{{ isset($aset) ? $aset->nama_aset : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="no_register">No.Register</label>
                        <input type="text" class="form-control" id="no_register" name="no_register" value="{{ isset($aset) ? $aset->no_register : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" class="form-control" id="merek" name="merek" value="{{ isset($aset) ? $aset->merek : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ isset($aset) ? $aset->ukuran : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_aset">Kategori Aset</label>
                        <select class="form-control" id="kategori_aset" name="kategori_aset" value="{{ isset($aset) ? $aset->kategori_aset : '' }}">
                            <option disabled {{ !isset($aset) ? 'selected' : '' }}>Pilih Kategori Aset</option>
                            <option value="Elektronik" {{ isset($aset) && $aset->kategori_aset == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="ATK" {{ isset($aset) && $aset->kategori_aset == 'ATK' ? 'selected' : '' }}>Alat Tulis Kantor</option>
                            <option value="Furnitur" {{ isset($aset) && $aset->kategori_aset == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($aset) && $aset->kategori_aset == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($aset) && $aset->kategori_aset == 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select class="form-control" id="satuan" name="satuan">
                            <option disabled {{ !isset($aset) ? 'selected' : '' }}>Pilih Satuan</option>
                            <option value="Unit" {{ isset($aset) && $aset->sumber_dana == 'Unit' ? 'selected' : '' }}>Unit</option>
                            <option value="Pack" {{ isset($aset) && $aset->sumber_dana == 'Pack' ? 'selected' : '' }}>Pack</option>
                            <option value="Buah" {{ isset($aset) && $aset->sumber_dana == 'Buah' ? 'selected' : '' }}>Buah</option>
                            <option value="Pasang" {{ isset($aset) && $aset->sumber_dana == 'Pasang' ? 'selected' : '' }}>Pasang</option>
                            <option value="Lembar" {{ isset($aset) && $aset->sumber_dana == 'Lembar' ? 'selected' : '' }}>Lembar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun_pembelian">Tahun Pembelian</label>
                        <input type="date" class="form-control" id="tahun_pembelian" name="tahun_pembelian" value="{{ isset($aset) ? $aset->tahun_pembelian : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <select class="form-control" id="sumber_dana" name="sumber_dana">
                            <option disabled {{ !isset($aset) ? 'selected' : '' }}>Pilih Sumber Dana</option>
                            <option value="APBN" {{ isset($aset) && $aset->sumber_dana == 'APBN' ? 'selected' : '' }}>APBN</option>
                            <option value="APBD" {{ isset($aset) && $aset->sumber_dana == 'APBD' ? 'selected' : '' }}>APBD</option>
                            <option value="Hibah" {{ isset($aset) && $aset->sumber_dana == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                            <option value="Donasi" {{ isset($aset) && $aset->sumber_dana == 'Donasi' ? 'selected' : '' }}>Donasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ isset($aset) ? $aset->jumlah : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="text" class="form-control" id="kondisi" name="kondisi" value="{{ isset($aset) ? $aset->kondisi : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Satuan</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($aset) ? $aset->harga : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="gambar_aset">Gambar Aset</label>
                        <input type="file" class="form-control-file" id="gambar_aset" name="gambar_aset">
                        <small class="form-text text-danger">*Ukuran maks. 2MB</small>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection