@extends('layouts.app')

@section('title','Mutasi Aset')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mutasi Aset</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Mutasi</th>
                        <th>Jenis Mutasi</th>
                        <th>Aset yang dimutasi</th>
                        <th>Ruangan Asal</th>
                        <th>Tujuan</th>
                        <th>Nilai Aset</th>
                        <th>Alasan Mutasi</th>
                        <th>Sumber Dana</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->tgl_mutasi }}</td>
                        <td>{{ $row->jenis_mutasi }}</td>
                        <td>{{ $row->aset_mutasi }}</td>
                        <td>{{ $row->ruangan_asal }}</td>
                        <td>{{ $row->tujuan }}</td>
                        <td>{{ $row->nilai_aset }}</td>
                        <td>{{ $row->alasan_mutasi }}</td>
                        <td>{{ $row->sumber_dana }}</td>
                        <td>
                            <a href="{{ route('mutasi.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('mutasi.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <a href="{{ route('mutasi.tambah') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>
        </div>
    </div>
</div>
@endsection