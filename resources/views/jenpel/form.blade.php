@extends('layouts.app')

@section('title', 'Form Jenis Pemeliharaan')

@section('content')
    <form action="{{ isset($jenpel) ? route('jenpel.tambah.update', $jenpel->id) : route('jenpel.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($jenpel))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($jenpel) ? 'Form Edit Jenis Pemeliharaan' : 'Form Tambah Jenis Pemeliharaan' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_pemeliharaan">Kode Jenis Pemeliharaan</label>
                            <input type="text" class="form-control" id="kode_pemeliharaan" name="kode_pemeliharaan"
                                value="{{ isset($jenpel) ? $jenpel->kode_pemeliharaan : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="jenispemeliharaan">Nama Jenis Pemeliharaan</label>
                            <input type="text" class="form-control" id="jenispemeliharaan" name="jenispemeliharaan"
                                value="{{ isset($jenpel) ? $jenpel->jenispemeliharaan : '' }}">
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
