<?php

namespace App\Http\Controllers;

use App\FrontSiteConfig;
use Illuminate\Http\Request;

class FrontSiteConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $findContent = FrontSiteConfig::get();

        if($findContent->isEmpty()){
            $websiteContent = new FrontSiteConfig();

            $requests =  (object) $websiteContent->getDefaultValues();

            return view('admin/front-site.index', [
                    'request' => $requests,
                    'findContent' => $websiteContent
                ]);
        }else{
            $websiteContent = FrontSiteConfig::where('id',1)->first();

            $requests =  (object) $websiteContent;

            return view('admin/front-site.index', [
                        'findContent' => $websiteContent,
                        'request' => $requests
                    ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'bannerHome'=> 'mimes:jpg,jpeg,png|max:4096',
            'bannerPromo1'=> 'mimes:jpg,jpeg,png|max:4096',
            'bannerPromo2'=> 'mimes:jpg,jpeg,png|max:4096',
            'bannerPromo3'=> 'mimes:jpg,jpeg,png|max:4096',
        ]);

        // Banner Home
        $bannerHome = $request->file('bannerHome');

        //Banner home name
        $bannerHome1name = time().'_'.'Banner-Home-1'.'_'.'.'.$request->bannerHome->extension();

        // Banner Promo
        $bannerPromo1 = $request->file('bannerPromo1');
        $bannerPromo2 = $request->file('bannerPromo2');
        $bannerPromo3 = $request->file('bannerPromo3');

        //Banner Promo name
        $bannerPromo1name = time().'_'.'Banner-Promo-1'.'_'.'.'.$request->bannerPromo1->extension();
        $bannerPromo2name = time().'_'.'Banner-Promo-2'.'_'.'.'.$request->bannerPromo2->extension();
        $bannerPromo3name = time().'_'.'Banner-Promo-3'.'_'.'.'.$request->bannerPromo3->extension();

        $data = [
            'bannerHome'   => $bannerHome1name,
            'bannerPromo1'  => $bannerPromo1name,
            'bannerPromo2'  => $bannerPromo2name,
            'bannerPromo3'  => $bannerPromo3name,
            'contact'       => $request->contact,
        ];

        $insertData = FrontSiteConfig::create($data);

        if($insertData){
            $bannerHome->move('images',$bannerHome1name);
            $bannerPromo1->move('images',$bannerPromo1name);
            $bannerPromo2->move('images',$bannerPromo2name);
            $bannerPromo3->move('images',$bannerPromo3name);

            return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/pengaturan-konten')->with('error','Data Gagal Disimpan');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontSiteConfig  $frontSiteConfig
     * @return \Illuminate\Http\Response
     */
    public function show(FrontSiteConfig $frontSiteConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontSiteConfig  $frontSiteConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontSiteConfig $frontSiteConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontSiteConfig  $frontSiteConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $frontSiteConfig = new FrontSiteConfig();

        // Banner Home
        $bannerHome = $request->file('bannerHome');

        // Banner Promo
        $bannerPromo1 = $request->file('bannerPromo1');
        $bannerPromo2 = $request->file('bannerPromo2');
        $bannerPromo3 = $request->file('bannerPromo3');

        if(($bannerHome == null) && ($bannerPromo1 == null)){
            //Banner Promo name
            $bannerPromo2name = time().'_'.'Banner-Promo-2'.'_'.'.'.$request->bannerPromo2->extension();
            $bannerPromo3name = time().'_'.'Banner-Promo-3'.'_'.'.'.$request->bannerPromo3->extension();

            $data = [
                'bannerPromo2'  => $bannerPromo2name,
                'bannerPromo3'  => $bannerPromo3name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerPromo2->move('images',$bannerPromo2name);
                $bannerPromo3->move('images',$bannerPromo3name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerHome == null) && ($bannerPromo2 == null)){

            //Banner Promo name
            $bannerPromo1name = time().'_'.'Banner-Promo-1'.'_'.'.'.$request->bannerPromo1->extension();
            $bannerPromo3name = time().'_'.'Banner-Promo-3'.'_'.'.'.$request->bannerPromo3->extension();

            $data = [
                'bannerPromo1'  => $bannerPromo1name,
                'bannerPromo3'  => $bannerPromo3name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerPromo1->move('images',$bannerPromo1name);
                $bannerPromo3->move('images',$bannerPromo3name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerHome == null) && ($bannerPromo3 == null)){

            //Banner Promo name
            $bannerPromo1name = time().'_'.'Banner-Promo-1'.'_'.'.'.$request->bannerPromo1->extension();
            $bannerPromo2name = time().'_'.'Banner-Promo-2'.'_'.'.'.$request->bannerPromo2->extension();

            $data = [
                'bannerPromo1'  => $bannerPromo1name,
                'bannerPromo2'  => $bannerPromo2name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerPromo1->move('images',$bannerPromo1name);
                $bannerPromo2->move('images',$bannerPromo2name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerPromo1 == null) && ($bannerPromo2 == null)){
            //Banner home name
            $bannerHome1name = time().'_'.'Banner-Home-1'.'_'.'.'.$request->bannerHome->extension();

            //Banner Promo name
            $bannerPromo3name = time().'_'.'Banner-Promo-3'.'_'.'.'.$request->bannerPromo3->extension();

            $data = [
                'bannerHome'   => $bannerHome1name,
                'bannerPromo3'  => $bannerPromo3name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerHome->move('images',$bannerHome1name);
                $bannerPromo3->move('images',$bannerPromo3name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerPromo2 == null) && ($bannerPromo3 == null)){
            //Banner home name
            $bannerHome1name = time().'_'.'Banner-Home-1'.'_'.'.'.$request->bannerHome->extension();

            //Banner Promo name
            $bannerPromo1name = time().'_'.'Banner-Promo-1'.'_'.'.'.$request->bannerPromo1->extension();

            $data = [
                'bannerHome'   => $bannerHome1name,
                'bannerPromo1'  => $bannerPromo1name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerHome->move('images',$bannerHome1name);
                $bannerPromo1->move('images',$bannerPromo1name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerPromo1 == null) && ($bannerPromo3 == null)){
            //Banner home name
            $bannerHome1name = time().'_'.'Banner-Home-1'.'_'.'.'.$request->bannerHome->extension();

            //Banner Promo name
            $bannerPromo2name = time().'_'.'Banner-Promo-2'.'_'.'.'.$request->bannerPromo2->extension();

            $data = [
                'bannerHome'   => $bannerHome1name,
                'bannerPromo2'  => $bannerPromo2name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerHome->move('images',$bannerHome1name);
                $bannerPromo2->move('images',$bannerPromo2name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerPromo1 == null) && ($bannerPromo2 == null) && ($bannerPromo3 == null)){

        // if(($bannerPromo1 == null) && ($bannerPromo2 == null) && ($bannerPromo3 == null)){
            //Banner home name
            $bannerHome1name = time().'_'.'Banner-Home-1'.'_'.'.'.$request->bannerHome->extension();

            $data = [
                'bannerHome'   => $bannerHome1name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerHome->move('images',$bannerHome1name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerHome == null) && ($bannerPromo2 == null) && ($bannerPromo3 == null)){
            //Banner Promo name
            $bannerPromo1name = time().'_'.'Banner-Promo-1'.'_'.'.'.$request->bannerPromo1->extension();

            $data = [
                'bannerPromo1'   => $bannerPromo1name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerPromo1->move('images',$bannerPromo1name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerHome == null) && ($bannerPromo1 == null) && ($bannerPromo3 == null)){
            //Banner Promo name
            $bannerPromo2name = time().'_'.'Banner-Promo-2'.'_'.'.'.$request->bannerPromo2->extension();

            $data = [
                'bannerPromo2'   => $bannerPromo2name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerPromo2->move('images',$bannerPromo2name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }else if(($bannerHome == null) && ($bannerPromo1 == null) && ($bannerPromo2 == null)){
            //Banner Promo name
            $bannerPromo3name = time().'_'.'Banner-Promo-3'.'_'.'.'.$request->bannerPromo3->extension();

            $data = [
                'bannerPromo3'   => $bannerPromo3name,
                'contact'       => $request->contact,
            ];

            $updateData = $frontSiteConfig::where('id',$id)
                            ->update($data);

            if($updateData){
                $bannerPromo3->move('images',$bannerPromo3name);

                return redirect('admin/pengaturan-konten')->with('success','Data Berhasil Diperbaharui');
            }else{
                return redirect('admin/pengaturan-konten')->with('error','Data Gagal Diperbaharui');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontSiteConfig  $frontSiteConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontSiteConfig $frontSiteConfig)
    {
        //
    }
}
