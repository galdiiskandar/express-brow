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

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $proyeks = new Proyek();

        $proyek =  (object) $proyeks->getDefaultValues();

        return view('admin/proyek.form',[
            'proyek' => $proyek
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
        $proyek = new Proyek();

        $validate = $request->validate([
            'gambarProyek'=> 'mimes:jpg,jpeg,png|max:4096',
            'statusProyek' => 'required',
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

            return redirect('admin/proyek')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/proyek/create')->with('error','Data Gagal Disimpan');
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
    public function edit($id)
    {
        $proyek = new Proyek();

        $findProyek = $proyek::where('kode_proyek',$id)->first();

        return view('admin/proyek.form',[
            'proyek' => $findProyek,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $proyek = new Proyek();

        if($request->gambarProyek == null){
            $dataWoPhoto = [
                'nama_proyek' => $request->namaProyek,
                'deskripsi_proyek' => $request->deskripsiProyek,
                'status_proyek'=> $request->statusProyek
            ];

            $updateProyek = $proyek::where('kode_proyek', $request->kodeProyek)
                                    ->update($dataWoPhoto);

            if($updateProyek){
                return redirect('admin/proyek')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/proyek/'.$request->kodeProyek.'/edit')->with('error','Data Gagal Diperbaharui');
            }

        }else{

            $gambarProyek = $request->file('gambarProyek');

            $gambarName = time().'_'.$request->namaProyek.'_'.'.'.$request->gambarProyek->extension();

            $dataWPhoto = [
                'nama_proyek' => $request->namaProyek,
                'deskripsi_proyek' => $request->deskripsiProyek,
                'status_proyek'=> $request->statusProyek,
                'gambar_proyek' => $gambarName
            ];

            $updateProyek = $proyek::where('kode_proyek', $request->kodeProyek)
                                    ->update($dataWPhoto);

            if($updateProyek){
                $gambarProyek->move('images',$gambarName);

                return redirect('admin/proyek')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/proyek/'.$request->kodeProyek.'/edit')->with('error','Data Gagal Diperbaharui');
            }
        }
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
