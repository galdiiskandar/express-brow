@extends('layouts.template')

@section('addressTitle','Data Proyek')

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
                                <div class="custom-title">Data Proyek</div>
                            </div>
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <a class="btn btn-primary" id="tambahButton" href="{{ route('proyek.create') }}"> <i class="fa fa-book"></i> Tambah Proyek </a>
                            <table class="table table-stripped" id="tableBarang">
                                <thead>
                                    <th>No.</th>
                                    <th>Kode Proyek</th>
                                    <th>Nama Proyek</th>
                                    <th>Deskripsi Proyek</th>
                                    <th>Status Proyek</th>
                                </thead>
                                <tbody>
                                    @foreach ($proyeks as $pry => $proyek)
                                        <tr>
                                            <td>{{ ++$pry }}</td>
                                            <td>{{ $proyek->kode_proyek }}</td>
                                            <td>{{ $proyek->nama_proyek }}</td>
                                            <td>{{ $proyek->deskripsi_proyek }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info light-s" data-toggle="modal" data-id="{{ $proyek->kode_proyek }}" data-target="#detailProyekModal"><span class="fa fa-eye"></span></a>
                                                <a class="btn btn-sm btn-warning light-s" href="{{ route('proyek.edit', $proyek->kode_proyek) }}"><span class="fa fa-pencil"></span></a>
                                                <a class="btn btn-sm btn-danger light-s"><span class="fa fa-trash"></span></a>
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

        <!-- Init Modal -->

        <div class="modal fade bd-example-modal-lg" id="detailProyekModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Proyek</h4>
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
            $('#tableBarang').DataTable();
        });
    </script>

     <!-- Init Modal -->
     <script type="text/javascript">
        $(document).ready(function(){
            $("#detailProyekModal").on('show.bs.modal', function(e){

                var kodeProyek = $(e.relatedTarget).data('id');

                $.get('/admin/proyek/'+kodeProyek, function(data){
                    $(".modal-body").html(data);
                });
            });
        });
    </script>
    <!-- End -->
@endsection
