@extends('layouts.app')

@section('title', 'Ruangan')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('ruangan.tambah') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>
                <table class ="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Penanggung Jawab</th>
                            <th>NIP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($data as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->no_ruangan }}</td>
                                <td>{{ $row->nama_ruangan }}</td>
                                <td>{{ $row->penanggung_jawab }}</td>
                                <td>{{ $row->nip }}</td>
                                <td>
                                    <a href="{{ route('ruangan.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('ruangan.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
