<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Proyek;
use App\Pelanggan;
use App\Barang;
use App\DetailTransaksi;
use Illuminate\Http\Request;

use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transkasi = new Transaksi();

        $selectTransaksi = Transaksi::all();

        // dd($selectTransaksi);

        return view('admin/transaksi.index',[
            'transaksis' => $selectTransaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksis = new Transaksi();

        $transaksi =  (object) $transaksis->getDefaultValues();

        $proyek = new Proyek();
        $pelanggan = new Pelanggan();
        $produk = new Barang();

        $selectProyek = Proyek::select('kode_proyek','nama_proyek')->get();
        $selectPelanggan = Pelanggan::select('kode_pelanggan','nama_pelanggan')->get();
        $selectProduk = Barang::select('kode_produk','nama_produk')->get();

        return view('admin/transaksi.form',[
            'transaksi' => $transaksi,
            'proyek' => $selectProyek,
            'pelanggan' => $selectPelanggan,
            'produk' => $selectProduk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $detailtransaksi = new DetailTransaksi();

        // dd($request->all());

        $validate = $request->validate([
            'kodeTransaksi'=> 'required',
            'tanggalTransaksi' => 'required',
            'totalTransaksi' => 'required',
            'keteranganTransaksi' => 'required'
        ]);

        $data = [
            'kode_transaksi' => $request->kodeTransaksi,
            'kode_proyek' => $request->kodeProyek,
            'kode_pelanggan' => $request->kodePelanggan,
            'kode_user' => Auth::user()->kode_user,
            'tanggal' => $request->tanggalTransaksi,
            'total' => $request->totalTransaksi,
            'keterangan_transaksi' => $request->keteranganTransaksi
        ];

        $insertData = $transaksi::create($data);

        $dataDT = [
            'kode_transaksi' => $request->kodeTransaksi,
            'kode_produk' => $request->kodeProduk,
            'qty' => 0,
            'harga' => 0
        ];

        $insertDataDT = $detailtransaksi::create($dataDT);


        if($insertDataDT){
            return redirect('admin/transaksi')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/transaksi/create')->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = new Transaksi();

        $dataTransaksi = $transaksi::where('kode_transaksi',$id)->get();

        return view('admin/transaksi.show',['dataTransaksi'=>$dataTransaksi])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
