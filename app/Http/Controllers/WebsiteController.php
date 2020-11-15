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

    public function productPage(){
        $getContent = FrontSiteConfig::first();

        $barang = DB::table('barangs')
                        ->limit(10)->get();

        return view('website.produk',[
            'content' => $getContent,
            'barangs' => $barang
        ]);
    }

    public function detailProduct($id){
        $getContent = FrontSiteConfig::first();

        $getDetailBarang = DB::table('barangs')
                                ->where('kode_produk',$id)
                                ->first();

        return view('website.detail_produk',[
            'detailBarang' => $getDetailBarang,
            'content' => $getContent
        ]);
    }

    public function proyekPage(){
        $getContent = FrontSiteConfig::first();

        $proyek = DB::table('proyeks')
                        ->limit(10)->get();

        return view('website.proyek',[
            'content' => $getContent,
            'proyeks' => $proyek
        ]);
    }

    public function detailProyek($id){
        $getContent = FrontSiteConfig::first();

        $getDetailProyek = DB::table('proyeks')
                                ->where('kode_proyek',$id)
                                ->first();

        return view('website.detail_proyek',[
            'detailProyek' => $getDetailProyek,
            'content' => $getContent
        ]);
    }

    public function promoPage(){
        $getContent = FrontSiteConfig::first();

        return view('website.promo',[
            'content' => $getContent
        ]);
    }

    public function contactPage(){
        $getContent = FrontSiteConfig::first();

        return view('website.contact',[
            'content' => $getContent
        ]);
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'subscriberName' => 'required',
            'subscriberEmail' => 'required'
        ]);

        //check if data is exist
        $checkPelanggan = DB::table('pelanggans')->get();

        $prefixID = 'PLG';

        $newGeneratedID = "";

        if($checkPelanggan->isEmpty()){
            $newGeneratedID = $prefixID.'-'.'001';

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
