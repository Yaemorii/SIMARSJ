@extends('layouts.app')

@section('title','Pengadaan Aset')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pengadaan Aset</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex justify-content-end">
                <a href="{{ route('pengadaan.tambah') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>
            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengadaan</th>
                        <th>Sumber Dana</th>
                        <th>Aset yang dibeli</th>
                        <th>Jumlah</th>
                        <th>Total Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->tgl_pengadaan }}</td>
                        <td>{{ $row->sumber_dana }}</td>
                        <td>{{ $row->aset_dibeli }}</td>
                        <td>{{ $row->jumlah_pengadaan }}</td>
                        <td>{{ $row->biaya_pengadaan }}</td>
                        <td>
                            <a href="{{ route('pengadaan.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('pengadaan.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection