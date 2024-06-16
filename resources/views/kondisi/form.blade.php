@extends('layouts.app')

@section('title', 'Form Kondisi')

@section('content')
    <form action="{{ isset($kondisi) ? route('kondisi.tambah.update', $kondisi->id) : route('kondisi.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($kondisi))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($kondisi) ? 'Form Edit Kondisi' : 'Form Tambah Kondisi' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_kondisi">Kode Kondisi</label>
                            <input type="text" class="form-control" id="kode_kondisi" name="kode_kondisi"
                                value="{{ isset($kondisi) ? $kondisi->kode_kondisi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_kondisi">Nama Kondisi</label>
                            <input type="text" class="form-control" id="nama_kondisi" name="nama_kondisi"
                                value="{{ isset($kondisi) ? $kondisi->nama_kondisi : '' }}">
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
