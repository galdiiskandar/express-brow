<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyek extends Model
{
    protected $primaryKey = 'kode_proyek';

    public $incrementing = false;

  //define soft deletes
    use SoftDeletes;

    protected $primaryKey = 'kode_proyek';

    public $incrementing = false;

    protected $fillable = [
        'kode_proyek',
        'nama_proyek',
        'deskripsi_proyek',
        'status_proyek',
        'gambar_proyek'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function getDefaultValues()
    {
        return [
            'kode_proyek' => '',
            'nama_proyek' => '',
            'deskripsi_proyek' => '',
            'status_proyek' => '',
            'gambar_proyek' => ''
        ];
    }

    public function transaksis(){
    	return $this->hasMany('App\Transaksi');
    }
}
