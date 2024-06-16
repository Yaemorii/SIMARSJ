@extends('layouts.app')

@section('title', 'Form Satuan')

@section('content')
    <form action="{{ isset($satuan) ? route('satuan.tambah.update', $satuan->id) : route('satuan.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($satuan))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($satuan) ? 'Form Edit Satuan' : 'Form Tambah Satuan' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_satuan">Kode Satuan</label>
                            <input type="text" class="form-control" id="kode_satuan" name="kode_satuan"
                                value="{{ isset($satuan) ? $satuan->kode_kategori : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_satuan">Nama Satuan</label>
                            <input type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                                value="{{ isset($satuan) ? $satuan->nama_satuan : '' }}">
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
