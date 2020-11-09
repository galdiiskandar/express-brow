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
                    @if ($pelanggan->kode_pelanggan == "")
                        <form method="POST" action="{{ route('pelanggan.store') }}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action="{{ route('pelanggan.update', $pelanggan->kode_pelanggan) }}" enctype="multipart/form-data">
                            @method('PUT')
                    @endif

                        @csrf
                        <div class="form-group">
                            <label for="kodePelanggan">Kode Pelanggan</label>
                            <input class="form-control" id="kodePelanggan" name="kodePelanggan" type="text"
                                placeholder="Kode Pelanggan" value="{{ old('pelanggan', $pelanggan->kode_pelanggan) }}" {{ $pelanggan->kode_pelanggan ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="namaPelanggan">Nama Pelanggan</label>
                            <input class="form-control" id="namaPelanggan" name="namaPelanggan"
                                placeholder="Nama Pelanggan" value="{{ old('pelanggan', $pelanggan->nama_pelanggan) }}">
                        </div>

                        <div class="form-group">
                            <label for="emailPelanggan">Email Pelanggan</label>
                            <input class="form-control" id="emailPelanggan" name="emailPelanggan" type="email"
                                placeholder="Email Pelanggan" value="{{ old('pelanggan', $pelanggan->alamat_email) }}">
                        </div>

                        <div class="form-group">
                            <label for="telpPelanggan">No Telp Pelanggan</label>
                            <input class="form-control" id="telpPelanggan" name="telpPelanggan" type="number"
                                placeholder="Telp Pelanggan" value="{{ old('pelanggan', $pelanggan->no_telp_pelanggan) }}">
                        </div>

                        <div class="form-group">
                            <label for="alamatPelanggan">Alamat Pelanggan</label>
                            <textarea class="form-control" name="alamatPelanggan">{{ $pelanggan->alamat_pelanggan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="keteranganPelanggan">Keterangan Pelanggan</label>
                            <textarea class="form-control" name="keteranganPelanggan">{{ $pelanggan->keterangan_pelanggan }}</textarea>
                        </div>

                        <a class="btn btn btn-info" href="{{ route('pelanggan.index') }}">←</a>
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
