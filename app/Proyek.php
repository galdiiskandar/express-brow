<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyek extends Model
{
<<<<<<< Updated upstream

    protected $primaryKey = 'kode_proyek';

    public $incrementing = false;
=======
    protected $table = 'proyeks';
>>>>>>> Stashed changes

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
}
