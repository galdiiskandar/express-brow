{{-- call template --}}
@extends('layouts.website-template')

{{-- Custom Style, drop custom style here --}}
@section('customStyle')
    <style>
        section.jumbotron.text-center{
            background-image:url('{{ url('/images/'.$content->bannerHome) }}');
            background-position: center;
            background-size: cover;
            color: #fff;
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
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-header bg-success text-white text-uppercase">
                <i class="fa fa-envelope"></i> Subscribe List
            </div>
            {{-- <img class="img-fluid border-0" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap"> --}}
            <div class="card-body">
                {{-- <h4 class="card-title text-center"><a href="product.html" title="View Product">Product title</a></h4> --}}
                @if (Session::has('success'))
                    <div class="alert alert-success successAlert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger errorAlert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    {{-- <div class="col">
                        <p class="btn btn-danger btn-block">99.00 $</p>
                    </div>
                    <div class="col">
                        <a href="product.html" class="btn btn-success btn-block">View</a>
                    </div> --}}
                    <div class="col">
                        <form method="POST" action="{{ route('subscribelist.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>

                                <input class="form-control" name="subscriberName" type="text">
                            </div>
                            <div class="form-group">
                                <label>Email</label>

                                <input class="form-control" name="subscriberEmail" type="email">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success btn-block" type="submit" name="submit" value="Subscribe">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @if ($content == null)
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/55595c/fff" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/a30ca3/fff" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://dummyimage.com/855x365/1443ff/fff" alt="Third slide">
                    </div>
                @else
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ url('/images/'.$content->bannerPromo1) }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/images/'.$content->bannerPromo2) }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/images/'.$content->bannerPromo3) }}" alt="Third slide">
                    </div>
                @endif

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
