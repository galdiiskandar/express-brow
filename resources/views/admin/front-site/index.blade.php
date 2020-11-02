@extends('layouts.template')

@section('addressTitle','Pengaturan Konten')

@section('customStyle')
    <style>
        .input-file{
            border:none !important;
        }

        .preview-image{
            width:40%;
            height:auto;
        }
    </style>
@endsection

@section('contentHere')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title">Pengaturan Halaman Website</div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success successAlert">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if(!isset($findContent->id))
                                <form method="POST" action="{{ route('pengaturan-konten.store') }}" enctype="multipart/form-data">
                            @else
                                <form method="POST" action="{{ route('pengaturan-konten.update', $findContent->id) }}" enctype="multipart/form-data">
                                @method('put')
                            @endif

                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="bannerHome1">Current Banner Home 1 : </label>

                                            @if ($request->bannerHome)
                                                <br>
                                                <img class="preview-image" src="{{ url('/images/'.$request->bannerHome)}}">
                                                <br>
                                                <br>
                                            @else
                                                <strong>Banner Home Tidak Tersedia</strong>
                                            @endif

                                            <div class="form-group">
                                                <label for="bannerHome">Banner Home 1</label>
                                                <input class="form-control input-file" id="bannerHome" name="bannerHome" type="file">
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <label for="bannerPromo1">Current Promo 1 : </label>

                                            @if ($request->bannerPromo1)
                                                <br>
                                                <img class="preview-image" src="{{ url('/images/'.$request->bannerPromo1)}}">
                                                <br>
                                                <br>
                                            @else
                                                <strong>Banner Promo Tidak Tersedia</strong>
                                            @endif

                                            <div class="form-group">
                                                <label for="bannerPromo1">Banner Promo 1</label>
                                                <input class="form-control input-file" id="bannerPromo1" name="bannerPromo1" type="file">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="bannerPromo2">Current Promo 2 : </label>

                                            @if ($request->bannerPromo2)
                                                <br>
                                                <img class="preview-image" src="{{ url('/images/'.$request->bannerPromo2)}}">
                                                <br>
                                                <br>
                                            @else
                                                <strong>Banner Promo Tidak Tersedia</strong>
                                            @endif

                                            <div class="form-group">
                                                <label for="bannerPromo2">Banner Promo 2</label>
                                                <input class="form-control input-file" id="bannerPromo2" name="bannerPromo2" type="file">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="bannerPromo">Current Promo 3 : </label>

                                            @if ($request->bannerPromo3)
                                                <br>
                                                <img class="preview-image" src="{{ url('/images/'.$request->bannerPromo3)}}">
                                                <br>
                                                <br>
                                            @else
                                                <strong>Banner Promo Tidak Tersedia</strong>
                                            @endif

                                            <div class="form-group3">
                                                <label for="bannerPromo3">Banner Promo 3</label>
                                                <input class="form-control input-file" id="bannerPromo3" name="bannerPromo3" type="file">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="contactDetail">Contact</label>
                                                <textarea class="form-control" id="contactDetail" name="contactDetail" type="text" placeholder="Contact"></textarea>
                                            </div>
                                        </div>

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
