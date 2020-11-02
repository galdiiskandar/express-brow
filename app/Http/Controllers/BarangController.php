<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang = new Barang();

        $selectBarang = Barang::all();

        return view('admin/barang.index',[
            'barangs' => $selectBarang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = new Barang();

        $barang =  (object) $barangs->getDefaultValues();

        return view('admin/barang.form',[
            'barang' => $barang
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
        $barang = new Barang();

        // dd($request->all());

        $validate = $request->validate([
            'gambarProduk'=> 'mimes:jpg,jpeg,png|max:4096',
            'hargaProduk' => 'required|numeric',
            'kodeProduk' => 'required',
            'namaProduk' => 'required'
        ]);


        $gambarProduk = $request->file('gambarProduk');

        $gambarName = time().'_'.$request->namaProduk.'_'.'.'.$request->gambarProduk->extension();

        $data = [
            'kode_produk' => $request->kodeProduk,
            'nama_produk' => $request->namaProduk,
            'harga' => $request->hargaProduk,
            'satuan' => $request->satuanProduk,
            'gambar_produk' => $gambarName,
            'keterangan' => $request->keteranganProduk
        ];

        $insertData = $barang::create($data);

        if($insertData){
            $gambarProduk->move('images',$gambarName);

            return redirect('admin/barang')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/barang/create')->with('error','Data Gagal Disimpan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = new Barang();

        $dataBarang = $barang::where('kode_produk',$id)->get();

        return view('admin/barang.show',['dataBarang'=>$dataBarang])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = new Barang();

        $findBarang = $barang::where('kode_produk',$id)->first();

        return view('admin/barang.form',[
            'barang' => $findBarang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $barang = new Barang();


        if($request->gambarProduk == null){
            $dataWoPhoto = [
                'nama_produk' => $request->namaProduk,
                'harga' => $request->hargaProduk,
                'satuan'=> $request->satuanProduk,
                'keterangan' => $request->keteranganProduk
            ];

            $updateBarang = $barang::where('kode_produk', $request->kodeProduk)
                                    ->update($dataWoPhoto);

            if($updateBarang){
                return redirect('admin/barang')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/barang/'.$request->kodeProduk.'/edit')->with('error','Data Gagal Diperbaharui');
            }

        }else{

            $gambarProduk = $request->file('gambarProduk');

            $gambarName = time().'_'.$request->namaProduk.'_'.'.'.$request->gambarProduk->extension();

            $dataWPhoto = [
                'nama_produk' => $request->namaProduk,
                'harga' => $request->hargaProduk,
                'satuan'=> $request->satuanProduk,
                'gambar_produk' => $gambarName,
                'keterangan' => $request->keteranganProduk
            ];

            $updateBarang = $barang::where('kode_produk', $request->kodeProduk)
                                    ->update($dataWPhoto);

            if($updateBarang){
                $gambarProduk->move('images',$gambarName);

                return redirect('admin/barang')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/barang/'.$request->kodeProduk.'/edit')->with('error','Data Gagal Diperbaharui');
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
