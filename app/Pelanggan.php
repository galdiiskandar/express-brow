<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    //define soft deletes
    use SoftDeletes;

    protected $primaryKey = 'kode_pelanggan';

    public $incrementing = false;

    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'alamat_email',
        'no_telp_pelanggan',
        'alamat_pelanggan',
        'keterangan_pelanggan',
        'status'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function getDefaultValues()
    {
        return [
            'kode_pelanggan' => '',
            'nama_pelanggan'  => '',
            'alamat_email'  => '',
            'no_telp_pelanggan'  => '',
            'alamat_pelanggan'  => '',
            'keterangan_pelanggan'  => '',
            'status' => ''
        ];
    }

    public function transaksis(){
    	return $this->hasMany('App\Transaksi');
    }
}
