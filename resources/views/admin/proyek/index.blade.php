@extends('layouts.template')

@section('addressTitle','Data Proyek')

@section('contentHere')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title">Data Proyek</div>
                            </div>
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <table class="table table-responsive">
                                <thead>
                                    <th>Kode Proyek</th>
                                    <th>Nama Proyek</th>
                                    <th>Deskripsi Proyek</th>
                                    <th>Gambar Proyek</th>
                                    <th>Status Proyek</th>
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
