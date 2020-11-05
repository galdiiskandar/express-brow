<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
<<<<<<< Updated upstream
    //
=======
    protected $table = 'transaksis';

    protected $primaryKey = 'kode_transaksi';

    public $incrementing = false;

    protected $fillable = [
        'kode_transaksi',
        'kode_proyek',
        'kode_pelanggan',
        'kode_user',
        'tanggal',
        'total',
        'keterangan_transaksi'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function getDefaultValues()
    {
        return [
            'kode_transaksi' => '',
            'kode_proyek' => '',
            'kode_pelanggan' => '',
            'kode_user' => '',
            'tanggal' => '',
            'total' => '',
            'keterangan_transaksi' => ''
        ];
    }

    public function detail_transaksis(){
    	return $this->hasMany('App\DetailTransaksi');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
    public function proyeks(){
        return $this->belongsTo('App\Proyek');
    }
    public function pelanggans(){
        return $this->belongsTo('App\Pelanggan');
    }
>>>>>>> Stashed changes
}
