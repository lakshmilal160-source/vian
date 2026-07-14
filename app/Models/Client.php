<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [

        'name',
        'website',
        'logo',
        'status',
        'sort_order',

    ];
}
