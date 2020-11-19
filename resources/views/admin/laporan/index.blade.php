@extends('layouts.template')

@section('addressTitle','Laporan')

@section('customStyle')
    <style>
        #tambahButton {
            margin: 0 0 3% 3%;
        }

        #mainNav .navbar-brand {
            width: 265px !important;
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
                                <div class="custom-title">Laporan</div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success successAlert">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                                <form method="POST" action="{{ route('laporan-transaksi.get') }}" class="form-inline mt-3">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mr-3">Dari Tanggal</label>

                                        <input type="date" name="dariTanggal" class="form-control">
                                    </div>
                                    <div class="form-group ml-5">
                                        <label class="mr-3">Sampai Tanggal</label>

                                        <input type="date" name="sampaiTanggal" class="form-control">
                                    </div>
                                    <div class="form-group ml-5">
                                        <button type="submit" name="action" class="btn btn-info" value="printData"><i class="fa fa-print"></i> Cetak Data</button>
                                        <button type="submit" name="action" class="btn btn-success ml-3" value="cariData"><i class="fa fa-search"></i> Cari Data</button>
                                    </div>
                                </form>

                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <table class="table table-stripped" id="tableReport">
                                <thead>
                                    <th>No.</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @foreach ($getData as $dt => $data)
                                        <tr>
                                            <td>{{ ++$dt }}</td>
                                            <td>{{ $data->kode_transaksi }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
@endsection
