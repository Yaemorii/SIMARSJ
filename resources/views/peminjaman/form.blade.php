@extends('layouts.app')

@section('title', 'Form Peminjaman')

@section('content')
    <form
        action="{{ isset($peminjaman) ? route('peminjaman.tambah.update', $peminjaman->id) : route('peminjaman.tambah.simpan') }}"
        method="post">
        @csrf
        @if (isset($peminjaman))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($peminjaman) ? 'Form Edit Peminjaman' : 'Form Tambah Peminjaman' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tgl_pinjam">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam"
                                value="{{ isset($peminjaman) ? $peminjaman->tgl_pinjam : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_kembali">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali"
                                value="{{ isset($peminjaman) ? $peminjaman->tgl_kembali : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="aset_dipinjam">Aset yang dipinjam</label>
                            @if (isset($peminjaman))
                                <input type="text" class="form-control" id="aset_dipinjam" 
                                    value="{{ $peminjaman->asset->nama_aset }} - {{ $peminjaman->asset->merek }} - {{ $peminjaman->asset->kode_aset }}" disabled>
                                <input type="hidden" name="aset_dipinjam" value="{{ $peminjaman->aset_dipinjam }}">
                            @else
                                <select class="form-control select2" id="aset_dipinjam" name="aset_dipinjam[]">
                                    <option disabled selected>Pilih Aset</option>
                                    @foreach($asets as $aset)
                                        <option value="{{ $aset->id }}">
                                            {{ $aset->nama_aset }} - {{ $aset->merek }} - {{ $aset->kode_aset }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ruangan_peminjam">Ruangan Peminjam</label>
                            <select class="form-control select2" id="ruangan_peminjam" name="ruangan_peminjam"
                                value="{{ isset($peminjaman) ? $peminjaman->ruangan_peminjam : '' }}">
                            <option disabled {{ !isset($peminjaman) ? 'selected' : '' }}>Pilih Ruangan</option>
                            @foreach ($ruangan as $r)
                                <option value="{{ $r->id }}"
                                    {{ isset($peminjaman) && $peminjaman->ruangan_peminjam == $r->id ? 'selected' : '' }}>
                                    {{ $r->nama_ruangan }} - {{ $r->penanggung_jawab }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="peminjam">Nama Peminjam</label>
                            <input type="text" class="form-control" id="peminjam" name="peminjam"
                                value="{{ isset($peminjaman) ? $peminjaman->peminjam : '' }}">
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
