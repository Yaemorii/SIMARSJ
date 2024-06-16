@extends('layouts.app')

@section('title', 'Form Jenis Mutasi')

@section('content')
    <form action="{{ isset($jenmut) ? route('jenmut.tambah.update', $jenmut->id) : route('jenmut.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($jenmut))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($jenmut) ? 'Form Edit Jenis Mutasi' : 'Form Tambah Jenis Mutasi' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_mutasi">Kode Jenis Mutasi</label>
                            <input type="text" class="form-control" id="kode_mutasi" name="kode_mutasi"
                                value="{{ isset($jenmut) ? $jenmut->kode_mutasi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="jenismutasi">Nama Jenis Mutasi</label>
                            <input type="text" class="form-control" id="jenismutasi" name="jenismutasi"
                                value="{{ isset($jenmut) ? $jenmut->jenismutasi : '' }}">
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
