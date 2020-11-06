@extends('layouts.template')

@section('addressTitle','Data Promo')

@section('customStyle')
    <style>
        #tambahButton {
            margin: 0 0 3% 2%;
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
                                <div class="custom-title">Data Promo</div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success successAlert">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <a class="btn btn-primary" id="tambahButton" href="{{ route('promo.create') }}"> <i class="fa fa-book"></i> Tambah Promo </a>
                            <table class="table table-stripped" id="tablePromo">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($promos as $prs => $promo)
                                        <tr>
                                            <td>{{ ++$prs }}</td>
                                            <td>{{ $promo->nama }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info light-s" data-toggle="modal" data-id="{{ $promo->kode_promo }}" data-target="#detailPromoModal"><span class="fa fa-eye"></span></a>
                                                <a class="btn btn-sm btn-warning light-s" href="{{ route('promo.edit', $promo->kode_promo) }}"><span class="fa fa-pencil"></span></a>
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

        <div class="modal fade bd-example-modal-lg" id="detailPromoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Barang</h4>
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
            $('#tablePromo').DataTable();
        });
    </script>

    <!-- Init Modal -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#detailPromoModal").on('show.bs.modal', function(e){

                var kodePromo = $(e.relatedTarget).data('id');

                $.get('/admin/promo/'+kodePromo, function(data){
                    $(".modal-body").html(data);
                });
            });
        });
    </script>
<!-- End -->
@endsection
