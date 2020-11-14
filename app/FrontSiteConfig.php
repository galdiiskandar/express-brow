<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontSiteConfig extends Model
{
    protected $fillable = [
        'bannerHome1',
        'bannerHome2',
        'bannerHome3',
        'bannerPromo1',
        'bannerPromo2',
        'bannerPromo3',
        'contact'
    ];

    public function getDefaultValues()
    {
        return [
            'bannerHome1'   => '',
            'bannerHome2'   => '',
            'bannerHome3'   => '',
            'bannerPromo1'  => '',
            'bannerPromo2'  => '',
            'bannerPromo3'  => '',
            'contact'       => ''
        ];
    }
}
