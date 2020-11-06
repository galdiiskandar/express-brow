<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
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
        $promos = Promo::all();

        return view('admin/promo.index',[
            'promos' => $promos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promos = new Promo();

        $promo =  (object) $promos->getDefaultValues();

        return view('admin/promo.form',[
            'promo' => $promo
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
        $promo = new Promo();

        $validate = $request->validate([
            'gambarPromo'=> 'mimes:jpg,jpeg,png|max:4096',
            'kodePromo' => 'required',
            'namaPromo' => 'required',
            'statusPromo' => 'required'
        ]);


        $gambarPromo = $request->file('gambarPromo');

        $gambarName = time().'_'.$request->namaPromo.'_'.'.'.$request->gambarPromo->extension();

        $data = [
            'kode_promo' => $request->kodePromo,
            'nama' => $request->namaPromo,
            'deskripsi' => $request->deskripsiPromo,
            'foto_promo' => $gambarName,
            'status'=> $request->statusPromo
        ];

        $insertData = $promo::create($data);

        if($insertData){
            $gambarPromo->move('images',$gambarName);

            return redirect('admin/promo')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/promo/create')->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promo = new Promo();

        $dataPromo = $promo::where('kode_promo',$id)->get();

        return view('admin/promo.show',['dataPromo'=>$dataPromo])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promo = new Promo();

        $findPromo = $promo::where('kode_promo',$id)->first();

        return view('admin/promo.form',[
            'promo' => $findPromo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $promo = new Promo();


        if($request->gambarPromo == null){
            $dataWoPhoto = [
                'kode_promo' => $request->kodePromo,
                'nama' => $request->namaPromo,
                'deskripsi' => $request->deskripsiPromo,
                'status'=> $request->statusPromo
            ];

            $updatePromo = $promo::where('kode_promo', $request->kodePromo)
                                    ->update($dataWoPhoto);

            if($updatePromo){
                return redirect('admin/promo')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/promo/'.$request->kodePromo.'/edit')->with('error','Data Gagal Diperbaharui');
            }

        }else{

            $gambarPromo = $request->file('gambarPromo');

            $gambarName = time().'_'.$request->namaPromo.'_'.'.'.$request->gambarPromo->extension();

            $dataWPhoto = [
                'kode_promo' => $request->kodePromo,
                'nama' => $request->namaPromo,
                'deskripsi' => $request->deskripsiPromo,
                'foto_promo' => $gambarName,
                'status'=> $request->statusPromo
            ];

            $updatePromo = $promo::where('kode_promo', $request->kodePromo)
                                    ->update($dataWPhoto);

            if($updatePromo){
                $gambarPromo->move('images',$gambarName);

                return redirect('admin/promo')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/promo/'.$request->kodePromo.'/edit')->with('error','Data Gagal Diperbaharui');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        //
    }
}
