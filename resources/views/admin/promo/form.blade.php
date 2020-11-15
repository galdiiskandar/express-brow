@extends('layouts.template')

@section('addressTitle','Data Promo')

@section('contentHere')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Data Promo</div>
                        <div class="custom-post-title">Data Promo Tiara Gypsum</div>
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

                    @if ($promo->kode_promo == "")
                        <form method="POST" action="{{ route('promo.store') }}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action="{{ route('promo.update',$promo->kode_promo) }}" enctype="multipart/form-data">
                            @method('PUT')
                    @endif

                        @csrf
                        <div class="form-group">
                            <label for="kodePromo">Kode Promo</label>
                            <input class="form-control" id="kodePromo" name="kodePromo" type="text"
                                placeholder="Kode Promo" value="{{ old('promo', $promo->kode_promo) }}" {{ $promo->kode_promo ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="namaPromo">Nama Promo</label>
                            <input class="form-control" id="namaPromo" name="namaPromo"
                                placeholder="Nama Promo" value="{{ old('promo', $promo->nama) }}">
                        </div>

                        @if ($promo->foto_promo)
                            <label>Preview Gambar</label>
                            <br>
                            <img src="{{ url('/images/'.$promo->foto_promo) }}" style="width:150px; height:auto;">
                        @else
                            <p></p>
                        @endif

                        <div class="form-group">
                            <label for="gambarPromo"> Gambar Promo</label>
                            <input class="form-control" id="gambarPromo" name="gambarPromo" type="file">
                        </div>

                        <div class="form-group">
                            <label for="deskripsiPromo">Deskripsi Promo</label>
                            <textarea class="form-control" name="deskripsiPromo">{{ $promo->deskripsi }}</textarea>
                        </div>

                        <a class="btn btn btn-info" href="{{ route('promo.index') }}">←</a>
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
