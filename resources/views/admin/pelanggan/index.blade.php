@extends('layouts.template')

@section('addressTitle','Data Pelanggan')

@section('customStyle')
    <style>
        #tambahButton {
            margin: 0 0 3% 3%;
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
                                <div class="custom-title">Data Pelanggan</div>
                            </div>
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <table class="table table-responsive">
                                <thead>
                                    <th>Kode </th>
                                    <th>Nama </th>
                                    <th>E-Mail</th>
                                    <th>No.Telp</th>
                                    <th>Alamat</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scriptPlace')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableBarang').DataTable();
        });
    </script>
@endsection
