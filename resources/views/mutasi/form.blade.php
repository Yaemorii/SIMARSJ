@extends('layouts.app')

@section('title', 'Form Mutasi')

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
                        <select class="form-control" id="aset_mutasi" name="aset_mutasi">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Aset</option>
                            @foreach($asets as $aset)
                                <option value="{{ $aset->id }}" {{ isset($mutasi) && $mutasi->aset_mutasi == $aset->id ? 'selected' : '' }}>
                                    {{ $aset->nama_aset }} - {{ $aset->merek }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_mutasi">Jenis Mutasi</label>
                        <select class="form-control" id="jenis_mutasi" name="jenis_mutasi">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Jenis Mutasi</option>
                            <option value="Pindah Ruangan" {{ isset($mutasi) && $mutasi->jenis_mutasi == 'Pindah Ruangan' ? 'selected' : '' }}>Pindah Ruangan</option>
                            <option value="Hibah" {{ isset($mutasi) && $mutasi->jenis_mutasi == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                            <option value="Penjualan" {{ isset($mutasi) && $mutasi->jenis_mutasi == 'Penjualan' ? 'selected' : '' }}>Penjualan</option>
                        </select>
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
                        <select class="form-control" id="ruangan_asal" name="ruangan_asal">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Ruangan Asal</option>
                            @foreach($ruangan as $r)
                                <option value="{{ $r->id }}" {{ isset($mutasi) && $mutasi->ruangan_asal == $r->id ? 'selected' : '' }}>
                                    {{ $r->nama_ruangan }} - {{ $r->penanggung_jawab }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <select class="form-control" id="tujuan" name="tujuan">
                            <option disabled {{ !isset($mutasi) ? 'selected' : '' }}>Pilih Ruangan Tujuan</option>
                            @foreach($ruangan as $r)
                                <option value="{{ $r->id }}" {{ isset($mutasi) && $mutasi->tujuan == $r->id ? 'selected' : '' }}>
                                    {{ $r->nama_ruangan }} - {{ $r->penanggung_jawab }}
                                </option>
                            @endforeach
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
