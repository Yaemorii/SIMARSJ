@extends('layouts.app')

@section('title', 'Pemeliharaan Aset')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pemeliharaan Aset</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Jenis Pemeliharaan</th>
                            <th>Aset yang dipelihara</th>
                            <th>Ruangan</th>
                            <th>Biaya Pemeliharaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->check())
                            @php($no = 1)
                            @foreach ($data as $row)
                                @if (auth()->user()->role === 'Direktur' ||
                                        (auth()->user()->role === 'Ka. Sub. Bag. Perlengkapan dan Aset' &&
                                            optional($row->asset->ruanganAsal)->nama_ruangan === 'Ruang Kepala Sub Bagian Perlengkapan dan Aset') ||
                                        (auth()->user()->role === 'Kepala Ruang Intensif Pria' &&
                                            optional($row->asset->ruanganAsal)->nama_ruangan === 'Ruang Intensif Pria') ||
                                        (auth()->user()->role === 'Kepala Instalasi Farmasi' &&
                                            optional($row->asset->ruanganAsal)->nama_ruangan === 'Instalasi Farmasi Depo II') ||
                                        auth()->user()->role === 'Admin')
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <td>{{ $row->tgl_pemeliharaan }}</td>
                                        <td>{{ $row->jenisPemeliharaan->jenispemeliharaan }}</td>
                                        <td>{{ $row->asset->nama_aset ?? 'N/A' }}</td>
                                        <td>{{ optional($row->asset->ruanganAsal)->nama_ruangan ?? 'N/A' }}</td>
                                        <td>Rp.{{ $row->biaya_pemeliharaan }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <div class="d-flex flex-row mb-2">
                                                    @if (auth()->user()->role === 'Admin')
                                                        <a href="{{ route('pemeliharaan.edit', $row->id) }}"
                                                            class="btn btn-warning mr-2"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <button class="btn btn-danger mr-2" data-toggle="modal"
                                                            data-target="#hapusModal{{ $row->id }}"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    @endif
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#detailModal{{ $row->id }}"><i
                                                            class="fa-solid fa-circle-info"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif

                        {{-- Modal Hapus --}}
                        @foreach ($data as $row)
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
                                            Apakah anda yakin ingin menghapus data pemeliharaan
                                            "{{ $row->asset->nama_aset ?? 'N/A' }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ route('pemeliharaan.hapus', $row->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        {{-- Modal Detail --}}
                        @foreach ($data as $row)
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detailModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $row->id }}">Detail
                                                Pemeliharaan:
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
                                                    <p><strong>Tanggal Pemeliharaan:</strong> {{ $row->tgl_pemeliharaan }}
                                                    </p>
                                                    <p><strong>Jenis Pemeliharaan:</strong>
                                                        {{ $row->jenisPemeliharaan->jenispemeliharaan }}
                                                    </p>
                                                    <p><strong>Biaya Pemeliharaan:</strong>
                                                        Rp.{{ $row->biaya_pemeliharaan }}
                                                    <p><strong>Nama Aset:</strong> {{ $row->asset->nama_aset ?? 'N/A' }}
                                                    </p>
                                                    <p><strong>Kode Aset:</strong> {{ $row->asset->kode_aset ?? 'N/A' }}
                                                    </p>
                                                    <p><strong>No. Register:</strong>
                                                        {{ $row->asset->no_register ?? 'N/A' }}
                                                    </p>
                                                    <p><strong>Merek:</strong> {{ $row->asset->merek ?? 'N/A' }}</p>
                                                    <p><strong>Kategori Aset:</strong>
                                                        {{ $row->asset->kategoriAset->kategori ?? 'N/A' }}</p>
                                                    <p><strong>Satuan:</strong>
                                                        {{ $row->asset->satuanAset->nama_satuan ?? 'N/A' }}</p>
                                                    <p><strong>Tahun Pembelian:</strong>
                                                        {{ $row->asset->tahun_pembelian ?? 'N/A' }}</p>
                                                    <p><strong>Sumber Dana:</strong>
                                                        {{ $row->asset->sumberDana->kode_sumberdana ?? 'N/A' }}</p>
                                                    @if ($row->asset->kategoriAset->kategori === 'Kendaraan Bermotor')
                                                        <p><strong>Pabrik:</strong> {{ $row->pabrik }}</p>
                                                        <p><strong>No. Rangka:</strong> {{ $row->asset->rangka }}</p>
                                                        <p><strong>No. Mesin:</strong> {{ $row->asset->mesin }}</p>
                                                        <p><strong>No. Polisi:</strong> {{ $row->asset->polisi }}</p>
                                                        <p><strong>No. BPKB:</strong> {{ $row->asset->bpkb }}</p>
                                                    @endif
                                                    <p><strong>Kondisi:</strong>
                                                        {{ $row->asset->kondisiAset->nama_kondisi ?? 'N/A' }}</p>
                                                    <p><strong>Ruangan:</strong>
                                                        {{ $row->asset->ruanganAsal->nama_ruangan ?? 'N/A' }}</p>
                                                    <p><strong>Penanggung Jawab:</strong>
                                                        {{ $row->asset->ruanganAsal->penanggung_jawab ?? 'N/A' }}</p>
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
