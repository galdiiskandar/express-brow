<?php

namespace App\Http\Controllers;

use App\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = new Proyek();

        $selectProyek = Proyek::all();

        return view('admin/proyek.index',[
            'proyeks' => $selectProyek
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/proyek.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyek = new Proyek();

        // dd($request->all());

        $validate = $request->validate([
            'gambarProyek'=> 'mimes:jpg,jpeg,png|max:4096',
            'statusProyek' => 'required|numeric',
            'kodeProyek' => 'required',
            'namaProyek' => 'required',
            'deskripsiProyek' => 'required',
        ]);


        $gambarProyek = $request->file('gambarProyek');

        $gambarName = time().'_'.$request->namaProyek.'_'.'.'.$request->gambarProyek->extension();

        $data = [
            'kode_proyek' => $request->kodeProyek,
            'nama_proyek' => $request->namaProyek,
            'deskripsi_proyek' => $request->deskripsiProyek,
            'status_proyek' => $request->statusProyek,
            'gambar_proyek' => $gambarName
        ];

        $insertData = $proyek::create($data);

        if($insertData){
            $gambarProyek->move('images',$gambarName);

            return redirect('proyek')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('proyek/create')->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyek = new Proyek();

        $dataProyek = $proyek::where('kode_proyek',$id)->get();



        return view('admin/proyek.show',['dataProyek'=>$dataProyek])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyek $proyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyek $proyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyek $proyek)
    {
        //
    }
}
