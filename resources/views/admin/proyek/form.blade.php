@extends('layouts.template')

@section('addressTitle','Data Proyek')

@section('contentHere')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Data Proyek</div>
                        <div class="custom-post-title">Data Proyek Tiara Gypsum</div>
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
                    <form method="POST" action="{{ route('proyek.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kodeProyek">Kode Proyek</label>
                            <input class="form-control" id="kodeProyek" name="kodeProyek" type="text"
                                placeholder="Masukan Kode Proyek">
                        </div>

                        <div class="form-group">
                            <label for="namaProyek">Nama Proyek</label>
                            <input class="form-control" id="namaPrpyek" name="namaProyek"
                                placeholder="Masukan Nama Proyek">
                        </div>
                        <div class="form-group">
                            <label for="deskripsiProyek">Deskripsi Proyek</label>
                            <textarea class="form-control" name="deskripsiProyek"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambarProduk"> Gambar Proyek</label>
                            <input class="form-control" id="gambarProyek" name="gambarProyek" type="file"
                                >
                        </div>

                        <div class="form-group">
                            <label for="statusProyek">Status Proyek</label>
                            <input class="form-control" id="statusProyek" name="statusProyek"
                                placeholder="Masukan Nama Proyek">
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
@endsection
