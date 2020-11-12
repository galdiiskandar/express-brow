@extends('layouts.template')

@section('addressTitle','Data Pelanggan')

@section('contentHere')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Data Pelanggan</div>
                        <div class="custom-post-title">Data Pelanggan Tiara Gypsum</div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger errorAlert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="card-body">

                        <form method="POST" action="{{ route('subscriber-list.update', $pelanggan->kode_pelanggan) }}" enctype="multipart/form-data">
                            @method('PUT')

                        @csrf
                        <div class="form-group">
                            <label for="kodePelanggan">Kode Pelanggan</label>
                            <input class="form-control" id="kodePelanggan" name="kodePelanggan" type="text"
                                placeholder="Kode Pelanggan" value="{{ old('pelanggan', $pelanggan->kode_pelanggan) }}" {{ $pelanggan->kode_pelanggan ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="namaPelanggan">Nama Pelanggan</label>
                            <input class="form-control" id="namaPelanggan" name="namaPelanggan"
                                placeholder="Nama Produk" value="{{ old('pelanggan', $pelanggan->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="emailPelanggan">Email</label>
                            <input class="form-control" id="emailPelanggan" name="emailPelanggan" type="text"
                                placeholder="Email" value="{{ old('barang', $pelanggan->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="noTelpPelanggan">No Telp</label>
                            <input class="form-control" id="noTelpPelanggan" name="noTelpPelanggan" type="text"
                                placeholder="No Telp" value="{{ old('pelanggan', $pelanggan->no_telp_pelanggan) }}">
                        </div>

                        <div class="form-group">
                            <label for="alamatPelanggan">Alamat</label>
                            <textarea class="form-control" name="alamatPelanggan" placeholder="Alamat">{{ $pelanggan->alamat_pelanggan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="keteranganPelanggan">Keterangan Pelanggan</label>
                            <textarea class="form-control" name="keteranganPelanggan" placeholder="Keterangan">{{ $pelanggan->keterangan_pelanggan }}</textarea>
                        </div>

                        <a class="btn btn btn-info" href="{{ route('subscriber-list.index') }}">←</a>
                        <button class="btn btn-secondary" type="reset">Ulang</button>
                        <button class="btn btn-success btn-submit" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptPlace')
@endsection
