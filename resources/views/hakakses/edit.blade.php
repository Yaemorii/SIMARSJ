@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>

    <form action="{{ route('hakakses.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (Biarkan kosong jika tidak ingin mengubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Direktur" {{ $user->role == 'Direktur' ? 'selected' : '' }}>Direktur</option>
                <option value="Ka. Sub. Bag. Perlengkapan dan Aset" {{ $user->role == 'Ka. Sub. Bag. Perlengkapan dan Aset' ? 'selected' : '' }}>Ka. Sub. Bag. Perlengkapan dan Aset</option>
                <option value="Kepala Ruang Intensif Pria" {{ $user->role == 'Kepala Ruang Intensif Pria' ? 'selected' : '' }}>Kepala Ruang Intensif Pria</option>
                <option value="Kepala Instalasi Farmasi" {{ $user->role == 'Kepala Instalasi Farmasi' ? 'selected' : '' }}>Kepala Instalasi Farmasi</option>
            </select>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
