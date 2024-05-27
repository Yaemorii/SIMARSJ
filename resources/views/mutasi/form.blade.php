@extends('layouts.app')

@section('title','Form Mutasi')

@section('content')
<form action="{{ isset($mutasi) ? route('mutasi.tambah.update', $mutasi->id) : route('mutasi.tambah.simpan') }}" method="post">
@csrf
@if(isset($mutasi))
    @method('PUT')
@endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($mutasi) ? 'Form Edit Mutasi' : 'Form Tambah Mutasi' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="aset_mutasi">Aset yang dimutasi</label>
                        <select class="form-control" id="aset_mutasi" name="aset_mutasi" value="{{ isset($mutasi) ? $mutasi->aset_mutasi : '' }}">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Aset</option>
                            {{-- <option value="Elektronik" {{ isset($mutasi) && $mutasi->aset_mutasi == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Furnitur" {{ isset($mutasi) && $mutasi->aset_mutasi == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($mutasi) && $mutasi->aset_mutasi == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($mutasi) && $mutasi->aset_mutasi == 'Peralatan' ? 'selected' : '' }}>Peralatan</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_mutasi">Jenis Mutasi</label>
                        <select class="form-control" id="jenis_mutasi" name="jenis_mutasi" value="{{ isset($mutasi) ? $mutasi->jenis_mutasi : '' }}">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Jenis Mutasi</option>
                            {{-- <option value="Elektronik" {{ isset($mutasi) && $mutasi->jenis_mutasi == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Furnitur" {{ isset($mutasi) && $mutasi->jenis_mutasi == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($mutasi) && $mutasi->jenis_mutasi == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($mutasi) && $mutasi->jenis_mutasi == 'Peralatan' ? 'selected' : '' }}>Peralatan</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai_aset">Nilai Mutasi</label>
                        <input type="text" class="form-control" id="nilai_aset" name="nilai_aset" value="{{ isset($mutasi) ? $mutasi->nilai_aset : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="alasan_mutasi">Alasan Mutasi</label>
                        <input type="text" class="form-control" id="alasan_mutasi" name="alasan_mutasi" value="{{ isset($mutasi) ? $mutasi->alasan_mutasi : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_mutasi">Tanggal Mutasi</label>
                        <input type="date" class="form-control" id="tgl_mutasi" name="tgl_mutasi" value="{{ isset($mutasi) ? $mutasi->tgl_mutasi : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="ruangan_asal">Ruangan Asal</label>
                        <select class="form-control" id="ruangan_asal" name="ruangan_asal" value="{{ isset($mutasi) ? $mutasi->ruangan_asal : '' }}">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Ruangan Asal</option>
                            {{-- <option value="Elektronik" {{ isset($mutasi) && $mutasi->ruangan_asal == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Furnitur" {{ isset($mutasi) && $mutasi->ruangan_asal == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($mutasi) && $mutasi->ruangan_asal == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($mutasi) && $mutasi->ruangan_asal == 'Peralatan' ? 'selected' : '' }}>Peralatan</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <select class="form-control" id="tujuan" name="tujuan" value="{{ isset($mutasi) ? $mutasi->tujuan : '' }}">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Ruangan Tujuan</option>
                            <option value="Test" {{ isset($mutasi) && $mutasi->ruangan == 'Test' ? 'selected' : '' }}>Test</option>
                            {{-- <option value="Elektronik" {{ isset($mutasi) && $mutasi->tujuan == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Furnitur" {{ isset($mutasi) && $mutasi->tujuan == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($mutasi) && $mutasi->tujuan == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($mutasi) && $mutasi->tujuan == 'Peralatan' ? 'selected' : '' }}>Peralatan</option> --}}
                        </select>
                    </div>                 
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <select class="form-control" id="sumber_dana" name="sumber_dana">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Sumber Dana</option>
                            <option value="Test" {{ isset($mutasi) && $mutasi->ruangan == 'Test' ? 'selected' : '' }}>Test</option>
                            {{-- <option value="APBN" {{ isset($mutasi) && $mutasi->sumber_dana == 'APBN' ? 'selected' : '' }}>APBN</option>
                            <option value="APBD" {{ isset($mutasi) && $mutasi->sumber_dana == 'APBD' ? 'selected' : '' }}>APBD</option>
                            <option value="Hibah" {{ isset($mutasi) && $mutasi->sumber_dana == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                            <option value="Donasi" {{ isset($mutasi) && $mutasi->sumber_dana == 'Donasi' ? 'selected' : '' }}>Donasi</option> --}}
                        </select>
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