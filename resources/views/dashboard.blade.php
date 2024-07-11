@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <!-- Jumlah Aset Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            @if (auth()->user()->role == 'Admin')
                                <a href="{{ route('aset') }}" class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                    Jumlah Aset</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAset }}</div>
                            @endif
                            @if (auth()->user()->role == 'Direktur')
                                <a href="{{ route('aset') }}"
                                    class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                    Jumlah Aset</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAset }}</div>
                            @endif
                            @if (auth()->user()->role == 'Ka. Sub. Bag. Perlengkapan dan Aset')
                                <p class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                    Jumlah Aset</p>
                                @php
                                    $totalAsetKasubbag = App\Models\Aset::whereHas('ruanganAsal', function ($query) {
                                        $query->where('nama_ruangan', 'Ruang Kepala Sub Bagian Perlengkapan dan Aset');
                                    })->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAsetKasubbag }}</div>
                            @endif
                            @if (auth()->user()->role == 'Kepala Ruang Intensif Pria')
                                <p class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                    Jumlah Aset</p>
                                @php
                                    $totalAsetintensifpria = App\Models\Aset::whereHas('ruanganAsal', function (
                                        $query,
                                    ) {
                                        $query->where('nama_ruangan', 'Ruang Intensif Pria');
                                    })->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAsetintensifpria }}</div>
                            @endif
                            @if (auth()->user()->role == 'Kepala Instalasi Farmasi')
                                <p class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                    Jumlah Aset</p>
                                @php
                                    $totalAsetinstalasafarmasi = App\Models\Aset::whereHas('ruanganAsal', function (
                                        $query,
                                    ) {
                                        $query->where('nama_ruangan', 'Instalasi Farmasi Depo II');
                                    })->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAsetinstalasafarmasi }}</div>
                            @endif
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-boxes-stacked fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Mutasi Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            @if (auth()->user()->role == 'Admin')
                                <a href="{{ route('mutasi') }}"
                                    class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Mutasi</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMutasi }}</div>
                            @endif
                            @if (auth()->user()->role == 'Direktur')
                                <a href="{{ route('mutasi') }}"
                                    class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Mutasi</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMutasi }}</div>
                            @endif
                            @if (auth()->user()->role == 'Ka. Sub. Bag. Perlengkapan dan Aset')
                                <p class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Mutasi</p>
                                @php
                                    $totalMutasiKasubbag = App\Models\Mutasi::whereHas('ruanganTujuan', function (
                                        $query,
                                    ) {
                                        $query->where('nama_ruangan', 'Ruang Kepala Sub Bagian Perlengkapan dan Aset');
                                    })->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMutasiKasubbag }}</div>
                            @endif
                            @if (auth()->user()->role == 'Kepala Ruang Intensif Pria')
                                <p class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Mutasi</p>
                                @php
                                    $totalMutasiIntensifPria = App\Models\Mutasi::whereHas('ruanganTujuan', function (
                                        $query,
                                    ) {
                                        $query->where('nama_ruangan', 'Ruang Intensif Pria');
                                    })->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMutasiIntensifPria }}</div>
                            @endif
                            @if (auth()->user()->role == 'Kepala Instalasi Farmasi')
                                <p class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Mutasi</p>
                                @php
                                    $totalMutasiInstalasiFarmasi = App\Models\Mutasi::whereHas(
                                        'ruanganTujuan',
                                        function ($query) {
                                            $query->where('nama_ruangan', 'Instalasi Farmasi Depo II');
                                        },
                                    )->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMutasiInstalasiFarmasi }}
                                </div>
                            @endif
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-arrow-right-arrow-left fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pemeliharaan Aset Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Direktur')
                                <a href="{{ route('pemeliharaan') }}"
                                    class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Pemeliharaan Aset</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPemeliharaan }}</div>
                            @endif
                            @if (auth()->user()->role == 'Ka. Sub. Bag. Perlengkapan dan Aset')
                                <p class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Pemeliharaan Aset</p>
                                @php
                                    $totalPemeliharaanKasubbag = App\Models\Pemeliharaan::whereHas(
                                        'ruanganAsal',
                                        function ($query) {
                                            $query->where(
                                                'nama_ruangan',
                                                'Ruang Kepala Sub Bagian Perlengkapan dan Aset',
                                            );
                                        },
                                    )->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPemeliharaanKasubbag }}</div>
                            @endif
                            @if (auth()->user()->role == 'Kepala Ruang Intensif Pria')
                                <p class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Pemeliharaan Aset</p>
                                @php
                                    $totalPemeliharaanIntensifPria = App\Models\Pemeliharaan::whereHas(
                                        'ruanganAsal',
                                        function ($query) {
                                            $query->where('nama_ruangan', 'Ruang Intensif Pria');
                                        },
                                    )->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPemeliharaanIntensifPria }}
                                </div>
                            @endif
                            @if (auth()->user()->role == 'Kepala Instalasi Farmasi')
                                <p class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Pemeliharaan Aset</p>
                                @php
                                    $totalPemeliharaanInstalasiFarmasi = App\Models\Pemeliharaan::whereHas(
                                        'ruanganAsal',
                                        function ($query) {
                                            $query->where('nama_ruangan', 'Instalasi Farmasi Depo II');
                                        },
                                    )->count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalPemeliharaanInstalasiFarmasi }}</div>
                            @endif
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-gears fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ruangan Card (example placeholder for future additions) -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            @if (auth()->user()->role == 'Admin')
                                <a href="{{ route('ruangan') }}"
                                    class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    Ruangan</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRuangan }}</div>
                            @endif
                            @if (auth()->user()->role != 'Admin')
                                <p class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    Ruangan</p>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRuangan }}</div>
                            @endif
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
