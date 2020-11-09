<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Barang;
use App\DetailTransaksi;
use Illuminate\Http\Request;

use Auth;
use DB;

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

        $produk = new Barang();

        $selectProduk = Barang::all();

        return view('admin/transaksi.form',[
            'transaksi' => $transaksi,
            'produk' => $selectProduk,
            'produk1' => $selectProduk
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataTransaksi = DB::table('transaksis')
                                ->join('users', 'transaksis.kode_user', '=', 'users.kode_user')
                                ->select('transaksis.*','users.nama_user as nama_user')
                                ->where('kode_transaksi',$id)
                                ->get();

        $datadetailTransaksi = DB::table('detail_transaksis')
                                ->join('barangs', 'detail_transaksis.kode_produk', '=', 'barangs.kode_produk')
                                ->select('detail_transaksis.*','barangs.nama_produk as nama_produk','barangs.harga as harga_produk','barangs.satuan as satuan_produk')
                                ->where('kode_transaksi',$id)
                                ->get();

        return view('admin/transaksi.show',[
            'dataTransaksi'=>$dataTransaksi,
            'datadetailTransaksi'=>$datadetailTransaksi])->render();
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
