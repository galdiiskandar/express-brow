@extends('layouts.template')

@section('addressTitle','Data Subscriber')

@section('customStyle')
    <style>
        #sendButton {
            margin: 1% 0 0% 0%;
        }

        #selectAll {
            margin: 0 0 3% 0%;
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
                                <div class="custom-title">Data Subscriber</div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success successAlert">
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <form method="POST" action="{{ route('subscriber-list.send') }}">
                            @csrf
                                <div class="card-body pt-3 pb-4">
                                    <div class="form-group">
                                        <label> Pilih Promo </label>
                                        <select class="form-control col-md-3" name="selectPromo">
                                            @foreach ($promos as $promo)
                                                <option value="{{ $promo->kode_promo }}">{{ $promo->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="button" class="btn btn-primary check" id="selectAll" value="Pilih Semua Subscriber">

                                    <table class="table table-stripped" id="tableSubscribexr">
                                        <thead>
                                            <th width="1%"></th>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                                    @foreach ($subscribers as $scb => $subscriber)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" value="{{ $subscriber->kode_pelanggan }}" class="idSub" name="idSubscribe[]">
                                                            </td>
                                                            <td>{{ ++$scb }}</td>
                                                            <td>{{ $subscriber->name }}</td>
                                                            <td>{{ $subscriber->email }}</td>
                                                            <input type="hidden" name="subemail[]" value="{{ $subscriber->email }}">
                                                            <td>
                                                                <a class="btn btn-sm btn-warning light-s" href="{{ route('subscriber-list.edit',$subscriber->kode_pelanggan) }}"><span class="fa fa-pencil"></span></a>
                                                                <a class="btn btn-sm btn-danger light-s" href="{{ route('subscriber-list.delete',$subscriber->kode_pelanggan) }}"><span class="fa fa-trash"></span></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                            </tbody>
                                    </table>
                                        <input class="btn btn-primary" id="sendButton" type="submit" value="Send">
                                </div>
                        </form>
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
            $('#tableSubscriber').DataTable();
        });
    </script>

    <!-- if Checked -->
    <script type="text/javascript">
        $('#sendButton').hide();

        $(".idSub").change(function() {
            var numberChecked = $('input[type="checkbox"]:checked').length;

            if(numberChecked > 0){
                $('#sendButton').show();

            }else{
                $('#sendButton').hide();
            }
        });

        $(document).ready(function () {
            $('#selectAll:button').click(function(){
                var checkBoxes = $('input[type="checkbox"]');
                checkBoxes.prop("checked", !checkBoxes.prop("checked"));

                var numberChecked = $('input[type="checkbox"]:checked').length;

                if(numberChecked > 0){
                    $(this).val('Hapus');
                    $('#sendButton').show();
                }else{
                    $(this).val('Pilih Semua');
                    $('#sendButton').hide();
                }
            });

        })


    </script>
@endsection
