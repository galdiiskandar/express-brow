<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nPelanggan extends Model
{
    protected $table = 'pelanggans';

    //define soft deletes
    use SoftDeletes;

    protected $primaryKey = 'kode_pelanggan';

    public $incrementing = false;

    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'email',
        'no_telp_pelanggan',
        'alamat_pelanggan',
        'keterangan_pelanggan'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];

    public function getDefaultValues()
    {
        return [
            'kode_pelanggan' => '',
            'nama_pelanggan'  => '',
            'email'  => '',
            'no_telp_pelanggan'  => '',
            'alamat_pelanggan'  => '',
            'keterangan_pelanggan'  => ''
        ];
    }
}
