<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $admin = new User();

        $selectAdmin = User::all();

        return view('admin/admin.index',[
            'admins' => $selectAdmin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = new User();

        $admin =  (object) $admins->getDefaultValues();

        return view('admin/admin.form',[
            'admin' => $admin
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
        $admin = new User();

        // dd($request->all());

        $validate = $request->validate([
            'kodeAdmin' => 'required',
            'usernameAdmin' => 'required',
            'passwordAdmin' => 'required',
            'namauserAdmin' => 'required',
            'alamatAdmin' => 'required',
            'notelpuserAdmin' => 'required',
            'emailuserAdmin' => 'required',
            'statusAdmin' => 'required',
        ]);


        $foto = $request->file('fotoAdmin');

        $fotoName = time().'_'.$request->namauserAdmin.'_'.'.'.$request->fotoAdmin->extension();

        $data = [
            'kode_user' => $request->kodeAdmin,
            'username' => $request->usernameAdmin,
            'password' => Hash::make($request->passwordAdmin),
            'nama_user' => $request->namauserAdmin,
            'alamat' => $request->alamatAdmin,
            'no_telp_user' => $request->notelpuserAdmin,
            'email_user' => $request->emailuserAdmin,
            'foto_user' => $fotoName,
            'status' => $request->statusAdmin
        ];

        $insertData = $admin::create($data);

        if($insertData){
            $foto->move('images',$fotoName);

            return redirect('admin/admin')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/admin/create')->with('error','Data Gagal Disimpan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = new User();

        $dataAdmin = $admin::where('kode_user',$id)->get();

        return view('admin/admin.show',['dataAdmin'=>$dataAdmin])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = new User();

        $findAdmin = $admin::where('kode_user',$id)->first();

        return view('admin/admin.form',[
            'admin' => $findAdmin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = new User();

        $data = [
            'status' => $request->statusAdmin
        ];

        $updateAdmin = $admin::where('kode_user', $request->kodeAdmin)
                                ->update($data);

        if($updateAdmin){
            return redirect('admin/admin')->with('success','Data Berhasil Diperbaharui');
        }else{
            return redirect('admin/admin/'.$request->kodeAdmin.'/edit')->with('error','Data Gagal Diperbaharui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
