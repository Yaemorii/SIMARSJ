@extends('layouts.app')

@section('title', 'Form Ruangan')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong>
                </div>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($ruangan) ? route('ruangan.tambah.update', $ruangan->id) : route('ruangan.tambah.simpan') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @if (isset($ruangan))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($ruangan) ? 'Form Edit Aset' : 'Form Tambah Ruangan' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="no_gedung">Nomor Gedung</label>
                            <input type="text" class="form-control" id="no_gedung" name="no_gedung"
                                value="{{ isset($ruangan) ? $ruangan->no_gedung : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="no_lantai">Nomor Lantai</label>
                            <input type="text" class="form-control" id="no_lantai" name="no_lantai"
                                value="{{ isset($ruangan) ? $ruangan->no_lantai : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="no_ruangan">Nomor Ruangan</label>
                            <input type="text" class="form-control" id="no_ruangan" name="no_ruangan"
                                value="{{ isset($ruangan) ? $ruangan->no_ruangan : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_ruangan">Nama Ruangan</label>
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan"
                                value="{{ isset($ruangan) ? $ruangan->nama_ruangan : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab"
                                value="{{ isset($ruangan) ? $ruangan->penanggung_jawab : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip"
                                value="{{ isset($ruangan) ? $ruangan->nip : '' }}">
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
