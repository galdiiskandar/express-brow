<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontSiteConfig extends Model
{
    protected $fillable = [
        'bannerHome',
        'bannerPromo1',
        'bannerPromo2',
        'bannerPromo3',
        'contact'
    ];

    public function getDefaultValues()
    {
        return [
            'bannerHome'   => '',
            'bannerPromo1'  => '',
            'bannerPromo2'  => '',
            'bannerPromo3'  => '',
            'contact'       => ''
        ];
    }
}
