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
                            <th>Kategori</th>
                            <th>Sumber Dana</th>
                            <th>Kondisi</th>
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
                                <td>{{ $row->kategoriAset->kode_kategori ?? 'N/A' }}</td>
                                <td>{{ $row->sumberDana->kode_sumberdana ?? 'N/A' }}</td>
                                <td>{{ $row->kondisiAset->kode_kondisi ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('aset.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#hapusModal{{ $row->id }}">Hapus</button>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#detailModal{{ $row->id }}">Detail</button>
                                </td>
                            </tr>

                            <!-- Detail Modal -->
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
                                                    <p><strong>Kategori Aset:</strong> {{ $row->kategoriAset->kategori ?? 'N/A'  }}</p>
                                                    <p><strong>Satuan:</strong> {{ $row->satuanAset->nama_satuan ?? 'N/A' }}</p>
                                                    <p><strong>Tahun Pembelian:</strong> {{ $row->tahun_pembelian }}</p>
                                                    <p><strong>Sumber Dana:</strong> {{ $row->sumberDana->sumberdana ?? 'N/A' }}</p>
                                                    {{-- @if ($row->kategori_aset == 'Kendaraan')
                                                        <p><strong>Pabrik:</strong> {{ $row->pabrik }}</p>
                                                        <p><strong>No.Rangka:</strong> {{ $row->rangka }}</p>
                                                        <p><strong>No.Mesin:</strong> {{ $row->mesin }}</p>
                                                        <p><strong>No.Polisi:</strong> {{ $row->polisi }}</p>
                                                        <p><strong>No.BPKB:</strong> {{ $row->bpkb }}</p>
                                                    @endif --}}
                                                    <p><strong>Kondisi:</strong> {{ $row->kondisiAset->nama_kondisi ?? 'N/A' }}</p>
                                                    <p><strong>Harga Satuan:</strong> Rp.{{ $row->harga }}</p>
                                                    <p><strong>Keterangan:</strong> {{ $row->keterangan }}</p>
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
                                            Apakah anda yakin ingin menghapus data aset "{{ $row->nama_aset }}" ? Data mungkin akan terhapus juga pada bagian mutasi, pemeliharaan dan peminjaman.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ route('aset.hapus', $row->id) }}" method="POST"
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
