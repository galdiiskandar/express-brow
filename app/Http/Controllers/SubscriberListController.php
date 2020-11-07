<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Exception;

if(!function_exists('freeRedirect')){

    function freeRedirect($to = '/'){

        throw new \Illuminate\Http\Exceptions\HttpResponseException(redirect($to));
    }

}

class SubscriberListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $selectSubscriber = DB::table('subscribe_list')
                            ->get();

        $selectPromo = DB::table('promos')
                            ->where('status','1')
                            ->get();

        return view('admin/subscriber.index',[
            'subscribers' => $selectSubscriber,
            'promos' => $selectPromo,
        ]);
    }

    public function SendEmail(Request $request){

        $getPromo = $request->selectPromo;

        $selectPromo = DB::table('promos')
                            ->where('kode_promo', $getPromo)
                            ->first();

        $namaPromo = $selectPromo->nama;

        $deskripsiPromo = $selectPromo->deskripsi;

        $fotoPromo = $selectPromo->foto_promo;

        $data = $request->idSubscribe;
        $x = count($data);

        $emails = $request->subemail;

        for($y=0;$y<$x;$y++){

            $reSelect = DB::table('subscribe_list')
                        ->select('email')
                        ->where('id',$request->idSubscribe[$y])
                        ->first();

            $separateEmail = $reSelect->email;

            try{

                Mail::send('email.mail', ['pesan' => $deskripsiPromo,'foto' => $fotoPromo], function ($message) use ($request, $separateEmail, $namaPromo)
                {
                    $message->subject($namaPromo);
                    $message->from('test@test.com', 'Tiara Gypsum');
                    $message->to($separateEmail);
                });

            }
            catch (Exception $e){
                return $e->getMessage();
            }

        }

        return redirect('admin/subscriber-list')->with('success','Berhasil Kirim Email');
    }

}
