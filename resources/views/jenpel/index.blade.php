@extends('layouts.app')

@section('title', 'Jenis Pemeliharaan')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Aset</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('jenpel.tambah') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jenis Pemeliharaan</th>
                            <th>Jenis Pemeliharaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($data as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->kode_pemeliharaan }}</td>
                                <td>{{ $row->jenispemeliharaan }}</td>
                                <td>
                                    <a href="{{ route('jenpel.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#hapusModal{{ $row->id }}">Hapus</button>
                                </td>
                            </tr>

                            <!-- Hapus Modal -->
                            <div class="modal fade" id="hapusModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="hapusModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusModalLabel{{ $row->id }}">Konfirmasi
                                                Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus Jenis Pemeliharaan "{{ $row->jenispemeliharaan }}" ? Data mungkin akan terhapus juga pada bagian mutasi, pemeliharaan dan peminjaman.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ route('jenpel.hapus', $row->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE') <!-- Menggunakan metode DELETE -->
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
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
