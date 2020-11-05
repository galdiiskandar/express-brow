<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{

    //define soft deletes
    use SoftDeletes;

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'harga',
        'satuan',
        'gambar_produk',
        'keterangan'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function getDefaultValues()
    {
        return [
            'kode_produk' => '',
            'nama_produk' => '',
            'harga' => '',
            'satuan' => '',
            'gambar_produk' => '',
            'keterangan' => '',
        ];
    }

    public function detail_transaksi(){
    	return $this->hasMany('App\DetailTransaksi');
    }
}
