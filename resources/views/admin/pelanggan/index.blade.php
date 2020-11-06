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
                            <a class="btn btn-primary" id="tambahButton" href="{{ route('pelanggan.create') }}"> <i class="fa fa-book"></i> Tambah Pelanggan </a>
                            <table class="table table-stripped" id="tablePelanggan">
                                <thead>
                                    <th>No. </th>
                                    <th>Kode </th>
                                    <th>Nama </th>
                                    <th>E-Mail</th>
                                    <th>No.Telp</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggans as $plg => $pelanggan)
                                        <tr>
                                            <td>{{ ++$plg }}</td>
                                            <td>{{ $pelanggan->kode_pelanggan }}</td>
                                            <td>{{ $pelanggan->nama_pelanggan }}</td>
                                            <td>{{ $pelanggan->alamat_email }}</td>
                                            <td>{{ $pelanggan->no_telp_pelanggan }}</td>
                                            <td>{{ $pelanggan->alamat_pelanggan }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info light-s" data-toggle="modal" data-id="{{ $pelanggan->kode_pelanggan }}" data-target="#detailPelangganModal"><span class="fa fa-eye"></span></a>
                                                <a class="btn btn-sm btn-warning light-s" href="{{ route('pelanggan.edit', $pelanggan->kode_pelanggan) }}"><span class="fa fa-pencil"></span></a>
                                                {{-- <a class="btn btn-sm btn-danger light-s"><span class="fa fa-trash"></span></a> --}}
                                                <a class="btn btn-sm btn-primary light-s"><span class="fa fa-upload"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="detailPelangganModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Pelanggan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scriptPlace')
    <!-- Add Class in mobile screen -->
    <script type="text/javascript">
        $(window).on('resize', function() {
            if($(window).width() < 767) {
                $('.table').toggleClass('table-responsive');
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablePelanggan').DataTable();
        });
    </script>

    <!-- Init Modal -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#detailPelangganModal").on('show.bs.modal', function(e){

                var kodePelanggan = $(e.relatedTarget).data('id');

                $.get('/admin/pelanggan/'+kodePelanggan, function(data){
                    $(".modal-body").html(data);
                });
            });
        });
    </script>
    <!-- End -->
@endsection
