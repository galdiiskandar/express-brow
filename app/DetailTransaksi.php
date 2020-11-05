<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksis';

    protected $fillable = [
        'kode_transaksi',
        'kode_produk',
        'qty',
        'harga'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function getDefaultValues()
    {
        return [
            'kode_transaksi' => '',
            'kode_produk' => '',
            'qty' => '',
            'harga' => '',
            'tanggal' => ''
        ];
    }

    public function transaksis(){
        return $this->belongsTo('App\Transaksi');
    }
    public function barangs(){
        return $this->belongsTo('App\Barang');
    }
}
