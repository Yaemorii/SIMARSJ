@extends('layouts.app')

@section('title', 'Form Pemeliharaan')

@section('content')
    <form
        action="{{ isset($pemeliharaan) ? route('pemeliharaan.tambah.update', $pemeliharaan->id) : route('pemeliharaan.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($pemeliharaan))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($pemeliharaan) ? 'Form Edit Pemeliharaan' : 'Form Tambah Pemeliharaan' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tgl_pemeliharaan">Tanggal Pemeliharaan</label>
                            <input type="date" class="form-control" id="tgl_pemeliharaan" name="tgl_pemeliharaan"
                                value="{{ isset($pemeliharaan) ? $pemeliharaan->tgl_pemeliharaan : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                            <select class="form-control select2" id="jenis_pemeliharaan" name="jenis_pemeliharaan">
                                <option disabled {{ !isset($pemeliharaan) ? 'selected' : '' }}>Pilih Jenis Pemeliharaan</option>
                                @foreach($jenpel as $j)
                                    <option value="{{ $j->id }}" {{ isset($pemeliharaan) && $pemeliharaan->jenis_pemeliharaan == $j->id ? 'selected' : '' }}>
                                        {{ $j->kode_pemeliharaan }} - {{ $j->jenispemeliharaan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="aset_pelihara">Aset yang dipelihara</label>
                                <select class="form-control select2" id="aset_pelihara" name="aset_pelihara">
                                    <option disabled {{ !isset($pemeliharaan) ? 'selected' : '' }}>Pilih Aset</option>
                                    @foreach($asets as $aset)
                                        <option value="{{ $aset->id }}" {{ isset($pemeliharaan) && $pemeliharaan->aset_pelihara == $aset->id ? 'selected' : '' }}>
                                            {{ $aset->nama_aset }} - {{ $aset->merek }} - {{ $aset->kode_aset }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ruangan">Ruangan</label>
                                <select class="form-control select2" id="ruangan" name="ruangan">
                                    <option disabled {{ !isset($pemeliharaan) ? 'selected' : '' }}>Pilih Ruangan</option>
                                    @foreach($ruangan as $r)
                                        <option value="{{ $r->id }}" {{ isset($pemeliharaan) && $pemeliharaan->ruangan == $r->id ? 'selected' : '' }}>
                                            {{ $r->nama_ruangan }} - {{ $r->penanggung_jawab }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="biaya_pemeliharaan">Biaya Pemeliharaan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="biaya_pemeliharaan" name="biaya_pemeliharaan"
                                    value="{{ isset($pemeliharaan) ? $pemeliharaan->biaya_pemeliharaan : '' }}">
                            </div>
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
