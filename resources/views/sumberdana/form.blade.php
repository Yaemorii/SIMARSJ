@extends('layouts.app')

@section('title', 'Form Sumber Dana')

@section('content')
    <form action="{{ isset($sumber) ? route('sumberdana.tambah.update', $sumber->id) : route('sumberdana.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($sumber))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($sumber) ? 'Form Edit Sumber Dana' : 'Form Tambah Sumber Dana' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_sumberdana">Kode Sumber Dana</label>
                            <input type="text" class="form-control" id="kode_sumberdana" name="kode_sumberdana"
                                value="{{ isset($sumber) ? $sumber->kode_sumberdana : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="sumberdana">Nama Sumber Dana</label>
                            <input type="text" class="form-control" id="sumberdana" name="sumberdana"
                                value="{{ isset($sumber) ? $sumber->sumberdana : '' }}">
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
