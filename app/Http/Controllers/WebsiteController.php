<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrontSiteConfig;
use Illuminate\Support\Facades\DB;

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
        $validate = $request->validate([
            'subscriberName' => 'required',
            'subscriberEmail' => 'required'
        ]);

        $insertData = DB::table('subscribe_list')->insert([
                        'name' => $request->subscriberName,
                        'email'=> $request->subscriberEmail,
                    ]);

        if($insertData){
            return redirect('/')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('/')->with('error','Data Gagal Disimpan');
        }
    }
}
