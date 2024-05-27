@extends('layouts.app')

@section('title','Form Peminjaman')

@section('content')
<form action="{{ isset($peminjaman) ? route('peminjaman.tambah.update', $peminjaman->id) : route('peminjaman.tambah.simpan') }}" method="post">
@csrf
@if(isset($peminjaman))
    @method('PUT')
@endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($peminjaman) ? 'Form Edit Peminjaman' : 'Form Tambah Peminjaman' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{ isset($peminjaman) ? $peminjaman->tgl_pinjam : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="{{ isset($peminjaman) ? $peminjaman->tgl_kembali : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="peminjam">Peminjam</label>
                        <input type="text" class="form-control" id="peminjam" name="peminjam" value="{{ isset($peminjaman) ? $peminjaman->peminjam : '' }}">
                    </div>
                        <div class="form-group">
                            <label for="sumber_dana">Aset yang dipinjam</label>
                            <select class="form-control" id="sumber_dana" name="sumber_dana">
                                <option disabled {{ !isset($peminjaman) ? 'selected' : '' }}>Pilih Sumber Dana</option>
                                <option value="Test" {{ isset($peminjaman) && $peminjaman->ruangan == 'Test' ? 'selected' : '' }}>Test</option>
                                {{-- <option value="APBN" {{ isset($peminjaman) && $peminjaman->sumber_dana == 'APBN' ? 'selected' : '' }}>APBN</option>
                                <option value="APBD" {{ isset($peminjaman) && $peminjaman->sumber_dana == 'APBD' ? 'selected' : '' }}>APBD</option>
                                <option value="Hibah" {{ isset($peminjaman) && $peminjaman->sumber_dana == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                                <option value="Donasi" {{ isset($peminjaman) && $peminjaman->sumber_dana == 'Donasi' ? 'selected' : '' }}>Donasi</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_dipinjam">Tanggal Pengadaan</label>
                            <input type="number" class="form-control" id="jumlah_dipinjam" name="jumlah_dipinjam" value="{{ isset($peminjaman) ? $peminjaman->jumlah_dipinjam : '' }}">
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