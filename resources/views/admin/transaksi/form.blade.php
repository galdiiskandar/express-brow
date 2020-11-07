@extends('layouts.template')

@section('addressTitle','Data Transaksi')

@section('customStyle')
    <style>
        /* Style the input fields */
        input {
            width: 100%;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }

        input#totalTransaksi:focus {
            outline: none;
        }
        input.z:focus {
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
                            <div class="tab">
                                <div class="form-group">
                                    <label for="kodeTransaksi">Kode Transaksi</label>
                                    <input class="form-control" id="kodeTransaksi" name="kodeTransaksi" type="text"
                                        placeholder="Masukan Kode Transaksi" value="{{ old('transaksi', $transaksi->kode_transaksi) }}" {{ $transaksi->kode_transaksi ? "readonly=true" : "" }}>
                                </div>

                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="statusPelanggan">Member</label>
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="switch">
                                            <input type="checkbox" id="statusPelanggan" name="statusPelanggan" value="1">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group listMember">
                                    <label for="kodePelanggan">Nama Pelanggan</label>
                                    <select class="form-control select2" style="width: 100%;" name="kodePelanggan">
                                        @foreach($pelanggan->where('kode_pelanggan','!=','CS0000') as $pelanggan)
                                            <option value="{{$pelanggan->kode_pelanggan}}">{{$pelanggan->nama_pelanggan}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kodeProyek">Proyek</label>
                                    <select class="form-control select2" style="width: 100%;" name="kodeProyek">
                                        @foreach($proyek as $proyek)
                                            <option value="{{$proyek->kode_proyek}}">{{$proyek->nama_proyek}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggalTransaksi">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggalTransaksi" name="tanggalTransaksi" value="{{ old('transaksi', $transaksi->tanggal) }}">
                                </div>
                            </div>

                            <div class="tab">
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
                                            <input type="number" readonly class="form-control-plaintext z" name="hargaProduk[]">
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
                                    <input type="number" readonly class="form-control-plaintext" id="totalTransaksi" name="totalTransaksi">
                                </div>

                                <div class="form-group">
                                    <label for="keteranganTransaksi">Keterangan</label>
                                    <input class="form-control" id="keteranganTransaksi" name="keteranganTransaksi" type="text"
                                        placeholder="Masukan Keterangan Transaksi" value="{{ old('transaksi', $transaksi->keterangan_transaksi) }}">
                                </div>
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    <button class="btn btn-success btn-submit" id="submitBtn" type="submit">Simpan</button>
                                </div>
                            </div>
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step" style="col"></span>
                                <span class="step"></span>
                            </div>
                        </form>
                        <div id="box"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptPlace')
<script type="text/javascript">
    $('.select2').select2({
        placeholder: "Pilih Satu",
        allowClear: true
    });

    $('#submitBtn').hide();
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
        $('.listMember').hide();

        $('#statusPelanggan').change(function(){
            if(this.checked)
                $('.listMember').show();
            else
                $('.listMember').hide();
        });

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
                '<input type="number" readonly class="form-control-plaintext z" name="hargaProduk[]" value="">'+
                '</div>'+
                '</div>'+
                '</div>'
            );
            $('.remove').show();

            $('.select2').select2({
                placeholder: "Pilih Satu",
                allowClear: true
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

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = "none";
            $('#submitBtn').show()
        } else {
            document.getElementById("nextBtn").style.display = "inline";
            $('#submitBtn').hide()
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>
@endsection
