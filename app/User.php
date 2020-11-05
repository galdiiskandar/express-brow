<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'kode_user';

    public $incrementing = false;

    protected $fillable = [
        'kode_user',
        'username',
        'password',
        'nama_user',
        'alamat',
        'no_telp_user',
        'email_user',
        'foto_user',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDefaultValues()
    {
        return [
            'kode_user'  => '',
            'username'  => '',
            'password'  => '',
            'nama_user'  => '',
            'alamat'  => '',
            'no_telp_user'  => '',
            'email_user'  => '',
            'foto_user'  => '',
            'status'  => ''
        ];
    }

    public function transaksis(){
    	return $this->hasMany('App\Transaksi');
    }
}
