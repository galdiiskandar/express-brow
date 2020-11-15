{{-- call template --}}
@extends('layouts.website-template')

{{-- Custom Style, drop custom style here --}}
@section('customStyle')
        <style>
            section.jumbotron.text-center{
                background-color:yellowgreen;
                background-position: center;
                background-size: cover;
                color: #fff;
            }

            .product-label{
                font-weight: 700;
                font-size: 30px;
                text-align: center;
            }
        </style>
@endsection

{{-- Address Title | Above the browser --}}
@section('addressTitle','Gypsum')

{{-- Nav Title | Top Left Corner of the site --}}
@section('navTitle','Gypsum')

{{-- Site Heading 1 | placed at jumbotron --}}
@section('siteHeading','Gypsum')

{{-- Jumbotron Subtitle --}}
@section('subTitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius augue massa, eu lacinia tellus dapibus ac')

{{-- First Container Content --}}
@section('firstContainer')
<div class="row">
<!-- Image -->
<div class="col-12 col-lg-6">
    <div class="card bg-light mb-3">
        <div class="card-body">
            <a href="" data-toggle="modal" data-target="#productModal">
                <img class="img-fluid" src="{{ url('images/'.$detailProyek->gambar_proyek) }}" />
            </a>
        </div>
    </div>
</div>

<!-- Add to cart -->
<div class="col-12 col-lg-6 add_to_cart_block">
    <div class="card bg-light mb-3">
        <div class="card-body">
            <p class="product-label">{{ $detailProyek->nama_proyek }}</p>
            {{-- <p class="price">{{ 'Rp.'.number_format($detailProyek->harga) }}</p> --}}
            <br>
            <p>{{ $detailProyek->deskripsi_proyek }}</p>

            <div class="product_rassurance">
                <ul class="list-inline">
                    <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Fast delivery</li>
                    <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Secure payment</li>
                    <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+33 1 22 54 65 60</li>
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
@endsection

{{-- Second Container --}}
@section('secondContainer')

@endsection

{{-- Third Container --}}
@section('thirdContainer')

@endsection

{{-- Site Footer --}}
@section('siteFooter')
<div class="row">
    <div class="col-md-3 col-lg-4 col-xl-3">
        <h5>Tentang</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <p class="mb-0">
            Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
        </p>
    </div>

    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
        <h5>Informations</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <ul class="list-unstyled">
            <li><a href="">Link 1</a></li>
            <li><a href="">Link 2</a></li>
            <li><a href="">Link 3</a></li>
            <li><a href="">Link 4</a></li>
        </ul>
    </div>

    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
        <h5>Others links</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <ul class="list-unstyled">
            <li><a href="">Link 1</a></li>
            <li><a href="">Link 2</a></li>
            <li><a href="">Link 3</a></li>
            <li><a href="">Link 4</a></li>
        </ul>
    </div>

    <div class="col-md-4 col-lg-3 col-xl-3">
        <h5>Contact</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <ul class="list-unstyled">
            <li><i class="fa fa-home mr-2"></i> My company</li>
            <li><i class="fa fa-envelope mr-2"></i> email@example.com</li>
            <li><i class="fa fa-phone mr-2"></i> + 33 12 14 15 16</li>
            <li><i class="fa fa-print mr-2"></i> + 33 12 14 15 16</li>
        </ul>
    </div>
    <div class="col-12 copyright mt-3">
        <p class="float-left">
            <a href="#">Back to top</a>
        </p>
        <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.html"><i>t-php</i></a> | <span>v. 1.0</span></p>
    </div>
</div>
@endsection
