<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    protected $table = 'barangs';

    //define soft deletes
    use SoftDeletes;

    protected $primaryKey = 'kode_produk';

    public $incrementing = false;

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

    public function detail_transaksis(){
    	return $this->hasMany('App\DetailTransaksi');
    }
}
