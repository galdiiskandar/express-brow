<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< Updated upstream
        //
=======
        $transkasi = new Transaksi();

        $selectTransaksi = Transaksi::all();

        return view('admin/transaksi.index',[
            'transaksis' => $selectTransaksi
        ]);
>>>>>>> Stashed changes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< Updated upstream
        //
=======
        $transaksis = new Transaksi();

        $transaksi =  (object) $transaksis->getDefaultValues();

        $proyek = new Proyek();
        $pelanggan = new Pelanggan();
        $produk = new Barang();

        $selectProyek = Proyek::select('kode_proyek','nama_proyek')->get();
        $selectPelanggan = Pelanggan::select('kode_pelanggan','nama_pelanggan')->get();
        $selectProduk = Barang::all();

        return view('admin/transaksi.form',[
            'transaksi' => $transaksi,
            'proyek' => $selectProyek,
            'pelanggan' => $selectPelanggan,
            'produk' => $selectProduk,
            'produk1' => $selectProduk
        ]);
>>>>>>> Stashed changes
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< Updated upstream
        //
=======
        $r = count($request->qtyProduk);

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

        for($i=0; $i<$r; $i++){
            $dataDT = [
                'kode_transaksi' => $request->kodeTransaksi,
                'kode_produk' => $request->kodeProduk[$i],
                'qty' => $request->qtyProduk[$i],
                'harga' => $request->hargaProduk[$i]
            ];

            $insertDataDT = $detailtransaksi::create($dataDT);
        }

        if($insertDataDT){
            return redirect('admin/transaksi')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/transaksi/create')->with('error','Data Gagal Disimpan');
        }
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
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
