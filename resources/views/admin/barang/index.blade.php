@extends('layouts.template')

@section('addressTitle','Data Barang')

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
                                <div class="custom-title">Data Produk</div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success successAlert">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <a class="btn btn-primary" id="tambahButton" href="{{ route('barang.create') }}"> <i class="fa fa-book"></i> Tambah Barang </a>
                            <table class="table table-stripped" id="tableBarang">
                                <thead>
                                    <th>No.</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($barangs as $brg => $barang)
                                        <tr>
                                            <td>{{ ++$brg }}</td>
                                            <td>{{ $barang->kode_produk }}</td>
                                            <td>{{ $barang->nama_produk }}</td>
                                            <td>{{ $barang->harga }}</td>
                                            <td>{{ $barang->satuan }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info light-s" data-toggle="modal" data-id="{{ $barang->kode_produk }}" data-target="#detailBarangModal"><span class="fa fa-eye"></span></a>
                                                <a class="btn btn-sm btn-warning light-s" href="{{ route('barang.edit', $barang->kode_produk) }}"><span class="fa fa-pencil"></span></a>
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

<!-- Init Modal -->

<div class="modal fade bd-example-modal-lg" id="detailBarangModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableBarang').DataTable();
        });
    </script>

    <!-- Init Modal -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#detailBarangModal").on('show.bs.modal', function(e){

                var kodeBarang = $(e.relatedTarget).data('id');

                $.get('/admin/barang/'+kodeBarang, function(data){
                    $(".modal-body").html(data);
                });
            });
        });
    </script>
<!-- End -->
@endsection
