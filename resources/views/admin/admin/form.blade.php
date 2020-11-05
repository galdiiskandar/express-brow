@extends('layouts.template')

@section('addressTitle','Data Admin')

@section('contentHere')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Data Admin</div>
                        <div class="custom-post-title">Data Admin Tiara Gypsum</div>
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

                    {{-- @if ($barang->kode_produk == "")
                        SAT
                    @else
                        asdasd
                    @endif --}}

                    @if ($admin->kode_user == "")
                        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action="{{ route('admin.update', $admin->kode_user) }}" enctype="multipart/form-data">
                            @method('PUT')
                    @endif

                        @csrf
                        <div class="form-group">
                            <label for="kodeAdmin">Kode Admin</label>
                            <input class="form-control" id="kodeAdmin" name="kodeAdmin" type="text"
                                placeholder="Kode Admin" value="{{ old('admin', $admin->kode_user) }}" {{ $admin->kode_user ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="usernameAdmin">Username</label>
                            <input class="form-control" id="usernameAdmin" name="usernameAdmin" type="text"
                                placeholder="Username" value="{{ old('admin', $admin->username) }}" {{ $admin->username ? "readonly=true" : "" }}>
                        </div>

                        @if($admin->password == null)
                        <div class="form-group">
                            <label for="passwordAdmin">Password</label>
                            <input class="form-control" id="passwordAdmin" name="passwordAdmin" type="password"
                                placeholder="Password">
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="namauserAdmin">Nama User</label>
                            <input class="form-control" id="namauserAdmin" name="namauserAdmin" type="text"
                                placeholder="Nama User" value="{{ old('admin', $admin->nama_user) }}" {{ $admin->nama_user ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="alamatAdmin">Alamat</label>
                            <textarea class="form-control" name="alamatAdmin" {{ $admin->alamat ? "readonly=true" : "" }}>{{ $admin->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="notelpuserAdmin">No Telp</label>
                            <input class="form-control" id="notelpuserAdmin" name="notelpuserAdmin" type="number"
                                placeholder="Telp" value="{{ old('admin', $admin->no_telp_user) }}" {{ $admin->no_telp_user ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="emailuserAdmin">Email</label>
                            <input class="form-control" id="emailuserAdmin" name="emailuserAdmin" type="email"
                                placeholder="Email" value="{{ old('admin', $admin->email_user) }}" {{ $admin->email_user ? "readonly=true" : "" }}>
                        </div>

                        <div class="form-group">
                            <label for="fotoAdmin">Foto</label>
                            <input class="form-control" id="fotoAdmin" name="fotoAdmin" type="file">
                        </div>

                        <div class="form-group">
                            <label for="statusAdmin">Status</label>
                            <div class="form-group">
                                <label class="switch">
                                    <input type="checkbox" id="statusAdmin" name="statusAdmin" value="1" {{ $admin->status==1 ? "checked='checked'" : "" }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <a class="btn btn btn-info" href="{{ route('admin.index') }}">←</a>
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
