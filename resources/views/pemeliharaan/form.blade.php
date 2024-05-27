@extends('layouts.app')

@section('title','Form Pemeliharaan')

@section('content')
<form action="{{ isset($pemeliharaan) ? route('pemeliharaan.tambah.update', $pemeliharaan->id) : route('pemeliharaan.tambah.simpan') }}" method="post">
@csrf
@if(isset($pemeliharaan))
    @method('PUT')
@endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($pemeliharaan) ? 'Form Edit Pemeliharaan' : 'Form Tambah Pemeliharaan' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="tgl_pemeliharaan">Tanggal Pemeliharaan</label>
                        <input type="date" class="form-control" id="tgl_pemeliharaan" name="tgl_pemeliharaan" value="{{ isset($pemeliharaan) ? $pemeliharaan->tgl_pemeliharaan : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                        <select class="form-control" id="jenis_pemeliharaan" name="jenis_pemeliharaan" value="{{ isset($pemeliharaan) ? $pemeliharaan->jenis_pemeliharaan : '' }}">
                            <option disabled {{ !isset($pemeliharaan) ? 'selected' : '' }}>Pilih Jenis Pemeliharaan</option>
                            {{-- <option value="Elektronik" {{ isset($pemeliharaan) && $pemeliharaan->jenis_pemeliharaan == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Furnitur" {{ isset($pemeliharaan) && $pemeliharaan->jenis_pemeliharaan == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($pemeliharaan) && $pemeliharaan->jenis_pemeliharaan == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($pemeliharaan) && $pemeliharaan->jenis_pemeliharaan == 'Peralatan' ? 'selected' : '' }}>Peralatan</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aset_pelihara">Aset yang dipelihara</label>
                        <select class="form-control" id="aset_pelihara" name="aset_pelihara" value="{{ isset($pemeliharaan) ? $pemeliharaan->aset_pelihara : '' }}">
                            <option disabled {{ !isset($pemeliharaan) ? 'selected' : '' }}>Pilih Aset</option>
                            <option value="Test" {{ isset($pemeliharaan) && $pemeliharaan->ruangan == 'Test' ? 'selected' : '' }}>Test</option>
                            {{-- <option value="Elektronik" {{ isset($pemeliharaan) && $pemeliharaan->aset_pelihara == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Furnitur" {{ isset($pemeliharaan) && $pemeliharaan->aset_pelihara == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($pemeliharaan) && $pemeliharaan->aset_pelihara == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($pemeliharaan) && $pemeliharaan->aset_pelihara == 'Peralatan' ? 'selected' : '' }}>Peralatan</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <select class="form-control" id="ruangan" name="ruangan" value="{{ isset($pemeliharaan) ? $pemeliharaan->ruangan : '' }}">
                            <option disabled {{ !isset($pemeliharaan) ? 'selected' : '' }}>Pilih Ruangan</option>
                            <option value="Test" {{ isset($pemeliharaan) && $pemeliharaan->ruangan == 'Test' ? 'selected' : '' }}>Test</option>
                            {{-- <option value="Elektronik" {{ isset($pemeliharaan) && $pemeliharaan->ruangan == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Furnitur" {{ isset($pemeliharaan) && $pemeliharaan->ruangan == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                            <option value="Kendaraan" {{ isset($pemeliharaan) && $pemeliharaan->ruangan == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Peralatan" {{ isset($pemeliharaan) && $pemeliharaan->ruangan == 'Peralatan' ? 'selected' : '' }}>Peralatan</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pelihara">Jumlah aset yang dipelihara</label>
                        <input type="number" class="form-control" id="jumlah_pelihara" name="jumlah_pelihara" value="{{ isset($pemeliharaan) ? $pemeliharaan->jumlah_pelihara : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya_pemeliharaan">Biaya Pemeliharaan</label>
                        <input type="text" class="form-control" id="biaya_pemeliharaan" name="biaya_pemeliharaan" value="{{ isset($pemeliharaan) ? $pemeliharaan->biaya_pemeliharaan : '' }}">
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