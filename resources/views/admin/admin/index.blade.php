@extends('layouts.template')

@section('addressTitle','Data Admin')

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
                                <div class="custom-title">Data Admin</div>
                            </div>
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <a class="btn btn-primary" id="tambahButton" href="{{ route('admin.create') }}"> <i class="fa fa-book"></i> Tambah Admin </a>
                            <table class="table table-stripped" id="tableAdmin">
                                <thead>
                                    <th>No. </th>
                                    <th>Nama </th>
                                    <th>No.Telp</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $adm => $admin)
                                        <tr>
                                            <td>{{ ++$adm }}</td>
                                            <td>{{ $admin->nama_user }}</td>
                                            <td>{{ $admin->no_telp_user }}</td>
                                            <td>{{ $admin->alamat }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info light-s" data-toggle="modal" data-id="{{ $admin->kode_user }}" data-target="#detailAdminModal"><span class="fa fa-eye"></span></a>
                                                <a class="btn btn-sm btn-warning light-s" href="{{ route('admin.edit', $admin->kode_user) }}"><span class="fa fa-pencil"></span></a>
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

        <div class="modal fade bd-example-modal-lg" id="detailAdminModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Admin</h4>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableAdmin').DataTable();
        });
    </script>

    <!-- Init Modal -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#detailAdminModal").on('show.bs.modal', function(e){

                var kodeUser = $(e.relatedTarget).data('id');

                $.get('/admin/admin/'+kodeUser, function(data){
                    $(".modal-body").html(data);
                });
            });
        });
    </script>
    <!-- End -->
@endsection
