@extends('layouts.app')

@section('title', 'Form Kategori')

@section('content')
    <form action="{{ isset($kategori) ? route('kategori.tambah.update', $kategori->id) : route('kategori.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($kategori))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($kategori) ? 'Form Edit Kategori' : 'Form Tambah Kategori' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_kategori">Kode Kategori</label>
                            <input type="text" class="form-control" id="kode_kategori" name="kode_kategori"
                                value="{{ isset($kategori) ? $kategori->kode_kategori : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori"
                                value="{{ isset($kategori) ? $kategori->kategori : '' }}">
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
