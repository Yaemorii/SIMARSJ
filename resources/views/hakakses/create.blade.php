@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container">
    <h1>Tambah Pengguna</h1>

    <form action="{{ route('hakakses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="Admin">Admin</option>
                <option value="Direktur">Direktur</option>
                <option value="Ka. Sub. Bag. Perlengkapan dan Aset">Ka. Sub. Bag. Perlengkapan dan Aset</option>
                <option value="Kepala Ruang Intensif Pria">Kepala Ruang Intensif Pria</option>
                <option value="Kepala Instalasi Farmasi">Kepala Instalasi Farmasi</option>
            </select>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
@endsection
