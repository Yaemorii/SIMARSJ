@extends('layouts.app')

@section('title','Peminjaman Aset')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Peminjaman Aset</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex justify-content-end">
                <a href="{{ route('peminjaman.tambah') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>
            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Sumber Pengembalian</th>
                        <th>Aset yang dipinjam</th>
                        <th>Jumlah</th>
                        <th>Peminjam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->tgl_pinjam }}</td>
                        <td>{{ $row->tgl_kembali }}</td>
                        <td>{{ $row->aset_dipinjam }}</td>
                        <td>{{ $row->jumlah_dipinjam }}</td>
                        <td>{{ $row->peminjam }}</td>
                        <td>
                            <a href="{{ route('peminjaman.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('peminjaman.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection