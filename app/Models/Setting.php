<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'logo',
        'favicon',
        'phone_1_country_code_id',
        'phone_1',
        'phone_2',
        'phone_2_country_code_id',
        'email',
        'address',
        'street',
        'state',
        'country',
        'pin_code',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'linkedin',
    ];
     public function countryCode1()
    {
        return $this->belongsTo(CountryCode::class, 'phone_1_country_code_id');
    }

    public function countryCode2()
    {
        return $this->belongsTo(CountryCode::class, 'phone_2_country_code_id');
    }
}