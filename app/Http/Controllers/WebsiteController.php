<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrontSiteConfig;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WebsiteController extends Controller
{
    public function index(){
        $getContent = FrontSiteConfig::first();

        return view('website.index',[
            'content' => $getContent,
        ]);
    }

    public function store(Request $request)
    {
        //check if data is exist
        $checkPelanggan = DB::table('pelanggans')->get();

        $prefixID = 'PLG';

        $newGeneratedID = "";

        if($checkPelanggan->isEmpty()){
            $newGeneratedID = $prefixID.'-'.'001';

        }else{
            //count fist
            $checkPelanggan = DB::table('pelanggans')
                                ->select(
                                    'kode_pelanggan',
                                    DB::raw('MAX(kode_pelanggan)')
                                )
                                ->groupBy('kode_pelanggan')
                                ->orderByDesc('kode_pelanggan')
                                ->first();
        }

        $ASCOrder = substr($checkPelanggan->kode_pelanggan,0,3);
        $maxid=explode("-",$checkPelanggan->kode_pelanggan);
        $noUrut = $maxid[1];
        $noUrut++;

        $newGeneratedID = $prefixID.'-'.sprintf('%03s',$noUrut);

        $validate = $request->validate([
            'subscriberName' => 'required',
            'subscriberEmail' => 'required'
        ]);

        $insertData = DB::table('pelanggans')->insert([
                        'kode_pelanggan' => $newGeneratedID,
                        'name' => $request->subscriberName,
                        'email'=> $request->subscriberEmail,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

        if($insertData){
            return redirect('/')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('/')->with('error','Data Gagal Disimpan');
        }
    }
}
