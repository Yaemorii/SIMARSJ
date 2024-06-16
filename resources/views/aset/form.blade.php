@extends('layouts.app')

@section('title', 'Form Aset')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ $errors->first('gambar_aset') }}
                </div>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($aset) ? route('aset.tambah.update', $aset->id) : route('aset.tambah.simpan') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @if (isset($aset))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($aset) ? 'Form Edit Aset' : 'Form Tambah Aset' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_aset">Kode Aset</label>
                            <input type="text" class="form-control" id="kode_aset" name="kode_aset"
                                value="{{ isset($aset) ? $aset->kode_aset : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_aset">Nama Aset</label>
                            <input type="text" class="form-control" id="nama_aset" name="nama_aset"
                                value="{{ isset($aset) ? $aset->nama_aset : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="no_register">No.Register</label>
                            <input type="text" class="form-control" id="no_register" name="no_register"
                                value="{{ isset($aset) ? $aset->no_register : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="merek">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek"
                                value="{{ isset($aset) ? $aset->merek : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Ukuran / CC</label>
                            <input type="text" class="form-control" id="ukuran" name="ukuran"
                                value="{{ isset($aset) ? $aset->ukuran : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select class="form-control select2" id="satuan" name="satuan">
                                <option disabled {{ !isset($aset) ? 'selected' : '' }}>Pilih Satuan</option>
                                @foreach($satuans as $satuan)
                                    <option value="{{ $satuan->id }}" {{ isset($aset) && $aset->kategori_aset == $satuan->id ? 'selected' : '' }}>
                                        {{ $satuan->kode_satuan }} - {{ $satuan->nama_satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_pembelian">Tahun Pembelian</label>
                            <input type="date" class="form-control" id="tahun_pembelian" name="tahun_pembelian"
                                value="{{ isset($aset) ? $aset->tahun_pembelian : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori_aset">Kategori Aset</label>
                            <select class="form-control select2" id="kategori_aset" name="kategori_aset">
                                <option disabled {{ !isset($aset) ? 'selected' : '' }}>Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ isset($aset) && $aset->kategori_aset == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->kode_kategori }} - {{ $kategori->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- <div id="form-kendaraan" style="display: none;">
                            <div class="form-group">
                                <label for="pabrik">Pabrik</label>
                                <input type="text" class="form-control" id="pabrik" name="pabrik"
                                    data-value="{{ isset($aset) ? $aset->pabrik : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="rangka">Rangka</label>
                                <input type="text" class="form-control" id="rangka" name="rangka"
                                    data-value="{{ isset($aset) ? $aset->rangka : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="mesin">Mesin</label>
                                <input type="text" class="form-control" id="mesin" name="mesin"
                                    data-value="{{ isset($aset) ? $aset->mesin : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="polisi">Polisi</label>
                                <input type="text" class="form-control" id="polisi" name="polisi"
                                    data-value="{{ isset($aset) ? $aset->polisi : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="bpkb">BPKB</label>
                                <input type="text" class="form-control" id="bpkb" name="bpkb"
                                    data-value="{{ isset($aset) ? $aset->bpkb : '' }}">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="harga">Harga Satuan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    value="{{ isset($aset) ? $aset->harga : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sumber_dana">Sumber Dana</label>
                            <select class="form-control select2" id="sumber_dana" name="sumber_dana">
                                <option disabled {{ !isset($aset) ? 'selected' : '' }}>Pilih Kondisi</option>
                                @foreach($sumbers as $sumber)
                                    <option value="{{ $sumber->id }}" {{ isset($aset) && $aset->sumber_dana == $sumber->id ? 'selected' : '' }}>
                                        {{ $sumber->kode_sumberdana }} - {{ $sumber->sumberdana }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi Aset</label>
                            <select class="form-control select2" id="kondisi" name="kondisi">
                                <option disabled {{ !isset($aset) ? 'selected' : '' }}>Pilih Kondisi</option>
                                @foreach($kondisis as $kondisi)
                                    <option value="{{ $kondisi->id }}" {{ isset($aset) && $aset->kondisi == $kondisi->id ? 'selected' : '' }}>
                                        {{ $kondisi->kode_kondisi }} - {{ $kondisi->nama_kondisi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="{{ isset($aset) ? $aset->keterangan : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="gambar_aset">Gambar Aset</label>
                            <input type="file" class="form-control-file" id="gambar_aset" name="gambar_aset">
                            <small class="form-text text-danger">*Ukuran maks. 2MB</small>
                        </div>
                        <!-- Form input for kendaraan -->

                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
