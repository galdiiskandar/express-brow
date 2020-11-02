@extends('layouts.login-template')

@section('addressTitle','Login')

@section('loginForm')

    @if(Session::has('error'))
        <div class="alert alert-danger errorAlert">
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Email / Username" value="{{ old('username') }}" required autocomplete="username" name="username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-4">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" required autocomplete="current-password" name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group clearfix">
            <button type="submit" class="btn btn-block btn-purple float-right">LOGIN</button>
        </div>

    </form>
@endsection
