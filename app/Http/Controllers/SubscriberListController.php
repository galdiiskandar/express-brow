<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\nPelanggan;
use Carbon\Carbon;
use Exception;

class SubscriberListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $selectSubscriber = DB::table('pelanggans')
                            ->whereNull('deleted_at')
                            ->get();

        $selectPromo = DB::table('promos')
                            ->get();

        return view('admin/subscriber.index',[
            'subscribers' => $selectSubscriber,
            'promos' => $selectPromo,
        ]);
    }

    public function delete($id){

        $Subscriber = DB::table('pelanggans')
                    ->where('kode_pelanggan',$id)
                    ->update(['deleted_at' => Carbon::now()]);

        return redirect('/admin/pelanggan')->with('success','Berhasil Menghapus Data');
    }

    public function edit($id){
        $pelanggan =  DB::table('pelanggans')
                        ->where('kode_pelanggan',$id)
                        ->first();


        return view('admin/subscriber.form',[
            'pelanggan' => $pelanggan,
        ]);
    }

    public function update(Request $request,$id){
        $validate = $request->validate([
            'noTelpPelanggan' => 'numeric',
            'namaPelanggan' => 'required'
        ]);

        $updateData = DB::table('pelanggans')
                            ->where('kode_pelanggan',$id)
                            ->update([
                                'name' => $request->namaPelanggan,
                                'email' => $request->emailPelanggan,
                                'no_telp_pelanggan' => $request->noTelpPelanggan,
                                'alamat_pelanggan' => $request->alamatPelanggan,
                                'keterangan_pelanggan' => $request->keteranganPelanggan,
                                'updated_at' => Carbon::now()
                            ]);

        if($updateData){
            return redirect('admin/pelanggan')->with('success','Data Berhasil Diperbaharui');
        }else{
            return redirect('admin/pelanggan/edit/'.$id)->with('error','Data Gagal Diperbaharui');
        }
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

            $reSelect = DB::table('pelanggans')
                        ->select('email')
                        ->where('kode_pelanggan',$request->idSubscribe[$y])
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

        return redirect('admin/pelanggan')->with('success','Berhasil Kirim Email');
    }

}
