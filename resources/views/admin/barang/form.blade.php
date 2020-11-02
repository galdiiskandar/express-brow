@extends('layouts.template')

@section('addressTitle','Data Barang')

@section('contentHere')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Data Produk</div>
                        <div class="custom-post-title">Data Produk Tiara Gypsum</div>
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

                    @if ($barang->kode_produk == "")
                        <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action="{{ route('barang.update', $barang->kode_produk) }}" enctype="multipart/form-data">
                            @method('PUT')
                    @endif

                        @csrf
                        <div class="form-group">
                            <label for="kodeProduk">Kode Produk</label>
                            <input class="form-control" id="kodeProduk" name="kodeProduk" type="text"
                                placeholder="Kode Produk" value="{{ old('barang', $barang->kode_produk) }}" {{ $barang->kode_produk ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="namaProduk">Nama Produk</label>
                            <input class="form-control" id="namaProduk" name="namaProduk"
                                placeholder="Nama Produk" value="{{ old('barang', $barang->nama_produk) }}">
                        </div>

                        <div class="form-group">
                            <label for="hargaProduk">Harga Produk</label>
                            <input class="form-control" id="hargaProduk" name="hargaProduk" type="text"
                                placeholder="Harga Produk" value="{{ old('barang', $barang->harga) }}">
                        </div>

                        <div class="form-group">
                            <label for="satuanProduk">Satuan Produk</label>
                            <input class="form-control" id="satuanProduk" name="satuanProduk" type="text"
                                placeholder="Satuan Produk" value="{{ old('barang', $barang->satuan) }}">
                        </div>

                        @if ($barang->gambar_produk)
                            <label>Preview Gambar</label>
                            <br>
                            <img src="{{ url('/images/'.$barang->gambar_produk) }}" style="width:150px; height:auto;">
                        @else
                            <p></p>
                        @endif

                        <div class="form-group">
                            <label for="gambarProduk"> Gambar Produk</label>
                            <input class="form-control" id="gambarProduk" name="gambarProduk" type="file">
                        </div>

                        <div class="form-group">
                            <label for="keteranganProduk">Keterangan Produk</label>
                            <textarea class="form-control" name="keteranganProduk">{{ $barang->keterangan }}</textarea>
                        </div>

                        <a class="btn btn btn-info" href="{{ route('barang.index') }}">←</a>
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
