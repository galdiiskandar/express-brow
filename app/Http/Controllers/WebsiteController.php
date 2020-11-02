<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrontSiteConfig;

class WebsiteController extends Controller
{
    public function index(){
        $getContent = FrontSiteConfig::first();

        return view('website.index',[
            'content' => $getContent,
        ]);
    }
}
