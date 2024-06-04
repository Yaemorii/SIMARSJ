@extends('layouts.app')

@section('title', 'Peminjaman Aset')

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
                            <th>Tanggal Pengembalian</th>
                            <th>Aset yang dipinjam</th>
                            <th>Merek</th>
                            <th>Peminjam</th>
                            <th>Ruangan Peminjam</th>
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
                                <td>{{ $row->asset->nama_aset ?? 'N/A' }}</td>
                                <td>{{ $row->asset->merek ?? 'N/A' }}</td>
                                <td>{{ $row->peminjam }}</td>
                                <td>{{ $row->ruanganAsal->nama_ruangan ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('peminjaman.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('peminjaman.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#detailModal{{ $row->id }}">Detail</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detailModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $row->id }}">Detail
                                                Peminjaman:
                                                {{ $row->asset->nama_aset ?? 'N/A' }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @if ($row->asset && $row->asset->gambar_aset)
                                                    <div class="col-md-4">
                                                        <img src="{{ Storage::url($row->asset->gambar_aset) }}"
                                                            alt="Gambar Aset" width="100%">
                                                    </div>
                                                @endif
                                                <div
                                                    class="{{ $row->asset && $row->asset->gambar_aset ? 'col-md-8' : 'col-md-12' }}">
                                                    <p><strong>Tanggal Peminjaman:</strong> {{ $row->tgl_pinjam }} </p>
                                                    <p><strong>Tanggal Kembali:</strong> {{ $row->tgl_kembali }}
                                                    <p><strong>Nama Aset:</strong> {{ $row->asset->nama_aset }}</p>
                                                    <p><strong>Kode Aset:</strong> {{ $row->asset->kode_aset }}</p>
                                                    <p><strong>No.Register:</strong> {{ $row->asset->no_register }}</p>
                                                    <p><strong>Merek:</strong> {{ $row->asset->merek }}</p>
                                                    <p><strong>Kategori Aset:</strong> {{ $row->asset->kategori_aset }}</p>
                                                    <p><strong>Satuan:</strong> {{ $row->asset->satuan }}</p>
                                                    @if ($row->asset->kategori_aset == 'Kendaraan')
                                                        <p><strong>Pabrik:</strong> {{ $row->asset->pabrik }}</p>
                                                        <p><strong>No.Rangka:</strong> {{ $row->asset->rangka }}</p>
                                                        <p><strong>No.Mesin:</strong> {{ $row->asset->mesin }}</p>
                                                        <p><strong>No.Polisi:</strong> {{ $row->asset->polisi }}</p>
                                                        <p><strong>No.BPKB:</strong> {{ $row->asset->bpkb }}</p>
                                                    @endif
                                                    <p><strong>Kondisi:</strong> {{ $row->asset->kondisi }}</p>
                                                    <p><strong>Nama Peminjam:</strong> {{ $row->peminjam }}
                                                    <p><strong>Ruangan Peminjam:</strong>
                                                        {{ $row->ruanganAsal->nama_ruangan ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
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
