@extends('layouts.template')

@section('addressTitle','Data Transaksi')

@section('contentHere')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Data Transaksi</div>
                        <div class="custom-post-title">Data Transaksi Tiara Gypsum</div>
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
                    @if ($transaksi->kode_transaksi == "")
                        <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action="{{ route('transaksi.update', $transaksi->transaksi) }}" enctype="multipart/form-data">
                            @method('PUT')
                    @endif
                        @csrf
                            <div class="form-group">
                                <label for="kodeTransaksi">Kode Transaksi</label>
                                <input class="form-control" id="kodeTransaksi" name="kodeTransaksi" type="text"
                                    placeholder="Masukan Kode Transaksi" value="{{ old('transaksi', $transaksi->kode_transaksi) }}" {{ $transaksi->kode_transaksi ? "readonly=true" : "" }}>
                            </div>

                            <div class="form-group">
                                <label for="kodeProyek">Kode Proyek</label>
                                <select class="form-control select2" name="kodeProyek">
                                    @foreach($proyek as $proyek)
                                        <option value="{{$proyek->kode_proyek}}">{{$proyek->nama_proyek}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kodePelanggan">Kode Pelanggan</label>
                                <select class="form-control select2" name="kodePelanggan">
                                    @foreach($pelanggan as $pelanggan)
                                        <option value="{{$pelanggan->kode_pelanggan}}">{{$pelanggan->kode_pelanggan}} - {{$pelanggan->nama_pelanggan}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kodeProduk">Produk</label>
                                <select class="form-control select2" name="kodeProduk">
                                    @foreach($produk as $produk)
                                        <option value="{{$produk->kode_produk}}">{{$produk->kode_produk}} - {{$produk->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggalTransaksi">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="tanggalTransaksi" name="tanggalTransaksi" value="{{ old('transaksi', $transaksi->tanggal) }}">
                            </div>

                            <div class="form-group">
                                <label for="totalTransaksi">Total</label>
                                <input type="number" class="form-control" id="totalTransaksi" name="totalTransaksi" value="{{ old('transaksi', $transaksi->total) }}">
                            </div>

                            <div class="form-group">
                                <label for="keteranganTransaksi">Keterangan</label>
                                <input class="form-control" id="keteranganTransaksi" name="keteranganTransaksi" type="text"
                                    placeholder="Masukan Keterangan Transaksi" value="{{ old('transaksi', $transaksi->keterangan_transaksi) }}">
                            </div>

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
<script type="text/javascript">

        $('.select2').select2()

</script>
@endsection
