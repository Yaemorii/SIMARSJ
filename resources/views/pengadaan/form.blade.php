@extends('layouts.app')

@section('title','Form Pengadaan')

@section('content')
<form action="{{ isset($pengadaan) ? route('pengadaan.tambah.update', $pengadaan->id) : route('pengadaan.tambah.simpan') }}" method="post">
@csrf
@if(isset($pengadaan))
    @method('PUT')
@endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($pengadaan) ? 'Form Edit Pengadaan' : 'Form Tambah Pengadaan' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="aset_dibeli">Aset yang dibeli</label>
                        <input type="text" class="form-control" id="aset_dibeli" name="aset_dibeli" value="{{ isset($pengadaan) ? $pengadaan->aset_dibeli : '' }}">
                    </div>
                        <div class="form-group">
                            <label for="jumlah_pengadaan">Jumlah aset yang dibeli</label>
                            <input type="number" class="form-control" id="jumlah_pengadaan" name="jumlah_pengadaan" value="{{ isset($pengadaan) ? $pengadaan->jumlah_pengadaan : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="biaya_pengadaan">Total Biaya</label>
                            <input type="text" class="form-control" id="biaya_pengadaan" name="biaya_pengadaan" value="{{ isset($pengadaan) ? $pengadaan->biaya_pengadaan : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="sumber_dana">Sumber Dana</label>
                            <select class="form-control" id="sumber_dana" name="sumber_dana">
                                <option disabled {{ !isset($pengadaan) ? 'selected' : '' }}>Pilih Sumber Dana</option>
                                <option value="Test" {{ isset($pengadaan) && $pengadaan->ruangan == 'Test' ? 'selected' : '' }}>Test</option>
                                {{-- <option value="APBN" {{ isset($pengadaan) && $pengadaan->sumber_dana == 'APBN' ? 'selected' : '' }}>APBN</option>
                                <option value="APBD" {{ isset($pengadaan) && $pengadaan->sumber_dana == 'APBD' ? 'selected' : '' }}>APBD</option>
                                <option value="Hibah" {{ isset($pengadaan) && $pengadaan->sumber_dana == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                                <option value="Donasi" {{ isset($pengadaan) && $pengadaan->sumber_dana == 'Donasi' ? 'selected' : '' }}>Donasi</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pengadaan">Tanggal Pengadaan</label>
                            <input type="date" class="form-control" id="tgl_pengadaan" name="tgl_pengadaan" value="{{ isset($pengadaan) ? $pengadaan->tgl_pengadaan : '' }}">
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