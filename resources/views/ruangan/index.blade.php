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
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Penanggung Jawab</th>
                            <th>Jabatan</th>
                            <th>NIP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($data as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->no_gedung }}.{{ $row->no_lantai }}.{{ $row->no_ruangan }}</td>
                                <td>{{ $row->nama_ruangan }}</td>
                                <td>{{ $row->penanggung_jawab }}</td>
                                <td>{{ $row->jabatan }}</td>
                                <td>{{ $row->nip }}</td>
                                <td>
                                    <a href="{{ route('ruangan.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('ruangan.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#detailModal{{ $row->id }}">Detail</button>
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $row->id }}">Detail Ruangan: {{ $row->nama_ruangan }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nomor Gedung:</strong> {{ $row->no_gedung }}</p>
                                            <p><strong>Nomor Lantai:</strong> {{ $row->no_lantai }}</p>
                                            <p><strong>Nomor Ruangan:</strong> {{ $row->no_ruangan }}</p>
                                            <p><strong>Penanggung Jawab:</strong> {{ $row->penanggung_jawab }}</p>
                                            <p><strong>Jabatan:</strong> {{ $row->jabatan }}</p>
                                            <p><strong>NIP:</strong> {{ $row->nip }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
