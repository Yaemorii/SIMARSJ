@extends('layouts.app')

@section('title','Pemeliharaan Aset')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pemeliharaan Aset</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex justify-content-end">
                <a href="{{ route('pemeliharaan.tambah') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>
            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemeliharaan</th>
                        <th>Jenis Pemeliharaan</th>
                        <th>Aset yang dipelihara</th>
                        <th>Ruangan</th>
                        <th>Jumlah</th>
                        <th>Biaya Pemeliharaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->tgl_pemeliharaan }}</td>
                        <td>{{ $row->jenis_pemeliharaan }}</td>
                        <td>{{ $row->aset_pelihara }}</td>
                        <td>{{ $row->ruangan }}</td>
                        <td>{{ $row->jumlah_pelihara }}</td>
                        <td>{{ $row->biaya_pemeliharaan }}</td>
                        <td>
                            <a href="{{ route('pemeliharaan.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('pemeliharaan.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection