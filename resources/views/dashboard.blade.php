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
                        <a href="{{ route('aset') }}" class="text-s font-weight-bold text-danger text-uppercase mb-1">
                            Jumlah Aset</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAset }}</div>
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
                    <a href="{{ route('mutasi') }}" class="text-s font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah Mutasi</a>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMutasi }}</div>
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
                            <a href="{{ route('pemeliharaan') }}" class="text-s font-weight-bold text-success text-uppercase mb-1">
                                Pemeliharaan Aset</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPemeliharaan }}</div>
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
                            <a href="{{ route('ruangan') }}" class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                Pemeliharaan Aset</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRuangan }}</div>
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
