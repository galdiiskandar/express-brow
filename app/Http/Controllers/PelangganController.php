<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
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
        $pelanggan = new Pelanggan();

        $selectPelanggan = Pelanggan::all();

        return view('admin/pelanggan.index',[
            'pelanggans' => $selectPelanggan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggans = new Pelanggan();

        $pelanggan =  (object) $pelanggans->getDefaultValues();

        return view('admin/pelanggan.form',[
            'pelanggan' => $pelanggan
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
        if($request->statusPelanggan == null)
            $request->statusPelanggan = 0;

        $pelanggan = new Pelanggan();

        // dd($request->all());

        $validate = $request->validate([
            'kodePelanggan'=> 'required',
            'namaPelanggan' => 'required',
            'emailPelanggan' => 'required',
            'telpPelanggan' => 'required',
            'alamatPelanggan' => 'required',
            'keteranganPelanggan' => 'required',
            'statusPelanggan' => 'required'
        ]);

        $data = [
            'kode_pelanggan' => $request->kodePelanggan,
            'nama_pelanggan' => $request->namaPelanggan,
            'alamat_email' => $request->emailPelanggan,
            'no_telp_pelanggan' => $request->telpPelanggan,
            'alamat_pelanggan' => $request->alamatPelanggan,
            'keterangan_pelanggan' => $request->keteranganPelanggan,
            'status' => $request->statusPelanggan
        ];

        $insertData = $pelanggan::create($data);

        if($insertData){
            return redirect('admin/pelanggan')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/pelanggan/create')->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = new Pelanggan();

        $dataPelanggan = $pelanggan::where('kode_pelanggan',$id)->get();

        return view('admin/pelanggan.show',['dataPelanggan'=>$dataPelanggan])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = new Pelanggan();

        $findPelanggan = $pelanggan::where('kode_pelanggan',$id)->first();

        return view('admin/pelanggan.form',[
            'pelanggan' => $findPelanggan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if($request->statusPelanggan == null)
            $request->statusPelanggan = 0;

        $pelanggan = new Pelanggan();

        $data = [
            'kode_pelanggan' => $request->kodePelanggan,
            'nama_pelanggan' => $request->namaPelanggan,
            'alamat_email' => $request->emailPelanggan,
            'no_telp_pelanggan' => $request->telpPelanggan,
            'alamat_pelanggan' => $request->alamatPelanggan,
            'keterangan_pelanggan' => $request->keteranganPelanggan,
            'status' => $request->statusPelanggan
        ];

        $updatePelanggan = $pelanggan::where('kode_pelanggan', $request->kodePelanggan)
                                ->update($data);

        if($updatePelanggan){
            return redirect('admin/pelanggan')->with('success','Data Berhasil Diperbaharui');
        }else{
            return redirect('admin/pelanggan/'.$request->kodePelanggan.'/edit')->with('error','Data Gagal Diperbaharui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
