@extends('layouts.template')

@section('addressTitle','Data Transaksi')

@section('customStyle')
    <style>
        input.text-label:focus {
            outline: none;
        }
    </style>
@endsection

@section('contentHere')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Data Transaksi</div>
                        <div class="custom-post-title">Data Transaksi Tiara Gypsum</div>
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
                    @if ($transaksi->kode_transaksi == "")
                        <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data" id="regForm">
                    @else
                        <form method="POST" action="{{ route('transaksi.update', $transaksi->transaksi) }}" enctype="multipart/form-data" id="regForm">
                            @method('PUT')
                    @endif
                        @csrf
                            <div class="form-group">
                                <label for="kodeTransaksi">Kode Transaksi</label>
                                <input class="form-control" id="kodeTransaksi" name="kodeTransaksi" type="text"
                                    placeholder="Masukan Kode Transaksi" value="{{ old('transaksi', $transaksi->kode_transaksi) }}" {{ $transaksi->kode_transaksi ? "readonly=true" : "" }}>
                            </div>

                            <div class="form-group">
                                <label for="tanggalTransaksi">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="tanggalTransaksi" name="tanggalTransaksi" value="{{ old('transaksi', $transaksi->tanggal) }}">
                            </div>

                            <div class="listProduk">
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="kodeProduk">Produk</label>
                                        <select class="form-control select2 y" style="width: 100%;" name="kodeProduk[]">
                                            <option></option>
                                            @foreach($produk as $produk)
                                                <option value="{{$produk->kode_produk}}">{{$produk->nama_produk}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                    <label for="qtyProduk">Qty</label>
                                        <input type="number" class="form-control q" placeholder="qty" name="qtyProduk[]">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="hargaProduk">Harga</label>
                                        <input type="number" readonly class="form-control-plaintext text-label" name="hargaProduk[]">
                                    </div>
                                </div>
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" class="btn btn-primary add">Add</button>
                                    <button type="button" class="btn btn-danger remove">Remove</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="totalTransaksi">Total</label>
                                <input type="number" readonly class="form-control-plaintext text-label" id="totalTransaksi" name="totalTransaksi">
                            </div>

                            <div class="form-group">
                                <label for="keteranganTransaksi">Keterangan Transaksi</label>
                                <textarea class="form-control" name="keteranganTransaksi">{{ $transaksi->keterangan_transaksi }}</textarea>
                            </div>

                            <a class="btn btn btn-info" href="{{ route('transaksi.index') }}">←</a>
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
<script type="text/javascript">
    $('.select2').select2({
        placeholder: "Pilih Satu"
    });

    $('.remove').hide();
    $('input[name="qtyProduk[]"]').eq(0).val(1);
    $('input[name="hargaProduk[]"]').eq(0).val(0);


    function totalPrice(){
        var i = 0
        var total = 0
        var r = $('input[name="qtyProduk[]"]').length

        for(i=0; i<r; i++){
            var harga = $('input[name="hargaProduk[]"]').eq(i).val()
            var qty = $('input[name="qtyProduk[]"]').eq(i).val()
            total += parseFloat(harga) * parseFloat(qty)
        }
        $('input[name="totalTransaksi"]').val(total)
    }

    $(document).on('change input', '.q', function() {
        totalPrice();
    });

    $(document).on('change select', '.y', function() {
        var selectKode = $('select[name="kodeProduk[]"]');
        var index = selectKode.index( this );
        var kodeProduk = $('select[name="kodeProduk[]"]').eq(index).val();
        if(kodeProduk != ""){
            var harga = [
                @foreach($produk1 as $produk)
                [ "{{$produk->kode_produk}}", "{{$produk->harga}}" ],
                @endforeach
            ];
            var arr = harga.filter( function( el ) {
                return !!~el.indexOf( kodeProduk );
            } );

            $('input[name="hargaProduk[]"]').eq(index).val(arr[0][1]);
        }else{
            $('input[name="qtyProduk[]"]').eq(index).val(1);
            $('input[name="hargaProduk[]"]').eq(index).val(0);
        }
        if($('input[name="qtyProduk[]"]').eq(index).val() == ""){
            $('input[name="qtyProduk[]"]').eq(index).val(1);
        }

        totalPrice();

        // start by setting everything to enabled
        $('select[name*="kodeProduk"] option').prop('disabled',false);

        // loop each select and set the selected value to disabled in all other selects
        $('select[name*="kodeProduk"]').each(function(){
            var $this = $(this);
            $('select[name*="kodeProduk"]').not($this).find('option').each(function(){
            if($(this).attr('value') == $this.val()){
                $(this).prop('disabled',true);
            }
            });
        });
    });

    $(document).ready(function(){
        var countProduk = [
                @foreach($produk1 as $produk)
                [ "{{$produk->kode_produk}}"],
                @endforeach
            ];

        if(countProduk.length == 1)
        {
            $('.add').hide();
        }

        $('.add').click(function() {
            $(".listProduk").append(
                '<div class="listProduk2" id="listProduk2">'+
                '<div class="form-row form-group">'+
                '<div class="col">'+
                '<label for="kodeProduk">Produk</label>'+
                '<select class="form-control select2 y" style="width: 100%;" name="kodeProduk[]">'+
                '<option></option>'+
                '@foreach($produk1 as $produk)'+
                '<option value="{{$produk->kode_produk}}">{{$produk->nama_produk}}</option>'+
                '@endforeach'+
                '</select>'+
                '</div>'+
                '<div class="col-md-2">'+
                '<label for="qtyProduk">Qty</label>'+
                '<input type="number" class="form-control q" placeholder="qty" name="qtyProduk[]" value="">'+
                '</div>'+
                '<div class="col-md-2">'+
                '<label for="hargaProduk">Harga</label>'+
                '<input type="number" readonly class="form-control-plaintext text-label" name="hargaProduk[]" value="">'+
                '</div>'+
                '</div>'+
                '</div>'
            );
            $('.remove').show();

            $('.select2').select2({
                placeholder: "Pilih Satu"
            });

            // start by setting everything to enabled
            $('select[name*="kodeProduk"] option').prop('disabled',false);

            // loop each select and set the selected value to disabled in all other selects
            $('select[name*="kodeProduk"]').each(function(){
                var $this = $(this);
                $('select[name*="kodeProduk"]').not($this).find('option').each(function(){
                if($(this).attr('value') == $this.val()){
                    $(this).prop('disabled',true);
                }
                });
            });

            var r = $('input[name="qtyProduk[]"]').length
            if($('input[name="qtyProduk[]"]').eq(r-1).val() == ""){
                $('input[name="qtyProduk[]"]').eq(r-1).val(1);
                $('input[name="hargaProduk[]"]').eq(r-1).val(0);
            }

            var countProduk = [
                @foreach($produk1 as $produk)
                [ "{{$produk->kode_produk}}"],
                @endforeach
            ];

            if(r >= countProduk.length)
            {
                $('.add').hide();
            }
            totalPrice();
            console.log(r,countProduk)

        });

        $(document).on('click', '.remove',function(){
            var val = $('.listProduk2:last-child').remove().find('select').val();
            $(".y option[value='" + val + "']").attr("disabled", false);
            var r = $('input[name="qtyProduk[]"]').length
            if(r < 2)
            {
                $('.remove').hide();
            }
            totalPrice();
            var countProduk = [
                @foreach($produk1 as $produk)
                [ "{{$produk->kode_produk}}"],
                @endforeach
            ];

            if(r < countProduk.length)
            {
                $('.add').show();
            }
        });
    });
</script>
@endsection
