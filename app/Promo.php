<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $primaryKey = 'kode_promo';

    public $incrementing = false;

    protected $fillable = [
        'kode_promo',
        'nama',
        'deskripsi',
        'foto_promo'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function getDefaultValues()
    {
        return [
            'kode_promo' => '',
            'nama' => '',
            'deskripsi' => '',
            'foto_promo' => ''
        ];
    }
}
