@extends('layouts.app')

@section('title', 'Data Aset')

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
            <h6 class="m-0 font-weight-bold text-primary">Data Aset</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('aset.tambah') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar Aset</th>
                            <th>Kode Aset</th>
                            <th>Nama Aset</th>
                            <th>No.Register</th>
                            <th>Merek</th>
                            <th>Kategori Aset</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($data as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>
                                    @if ($row->gambar_aset)
                                        <img src="{{ Storage::url($row->gambar_aset) }}" alt="Gambar Aset" width="100">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>{{ $row->kode_aset }}</td>
                                <td>{{ $row->nama_aset }}</td>
                                <td>{{ $row->no_register }}</td>
                                <td>{{ $row->merek }}</td>
                                <td>{{ $row->kategori_aset }}</td>
                                <td>{{ $row->satuan }}</td>
                                <td>{{ $row->jumlah }}</td>
                                <td>
                                    <a href="{{ route('aset.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('aset.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#detailModal{{ $row->id }}">Detail</button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detailModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $row->id }}">Detail Aset:
                                                {{ $row->nama_aset }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @if ($row->gambar_aset)
                                                    <div class="col-md-4">
                                                        <img src="{{ Storage::url($row->gambar_aset) }}" alt="Gambar Aset"
                                                            width="100%">
                                                    </div>
                                                @endif
                                                <div class="{{ $row->gambar_aset ? 'col-md-8' : 'col-md-12' }}">
                                                    <p><strong>Kode Aset:</strong> {{ $row->kode_aset }}</p>
                                                    <p><strong>Nama Aset:</strong> {{ $row->nama_aset }}</p>
                                                    <p><strong>No. Register:</strong> {{ $row->no_register }}</p>
                                                    <p><strong>Merek:</strong> {{ $row->merek }}</p>
                                                    <p><strong>Ukuran:</strong> {{ $row->ukuran }}</p>
                                                    <p><strong>Kategori Aset:</strong> {{ $row->kategori_aset }}</p>
                                                    <p><strong>Satuan:</strong> {{ $row->satuan }}</p>
                                                    <p><strong>Tahun Pembelian:</strong> {{ $row->tahun_pembelian }}</p>
                                                    <p><strong>Sumber Dana:</strong> {{ $row->sumber_dana }}</p>
                                                    @if ($row->kategori_aset == 'Kendaraan')
                                                        <p><strong>Pabrik:</strong> {{ $row->pabrik }}</p>
                                                        <p><strong>No.Rangka:</strong> {{ $row->rangka }}</p>
                                                        <p><strong>No.Mesin:</strong> {{ $row->mesin }}</p>
                                                        <p><strong>No.Polisi:</strong> {{ $row->polisi }}</p>
                                                        <p><strong>No.BPKB:</strong> {{ $row->bpkb }}</p>
                                                    @endif
                                                    <p><strong>Jumlah:</strong> {{ $row->jumlah }}</p>
                                                    <p><strong>Kondisi:</strong> {{ $row->kondisi }}</p>
                                                    <p><strong>Harga Satuan:</strong> {{ $row->harga }}</p>
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
