<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
     protected $fillable = [

        'title',
        'slug',
        'description',
        'image',
        'project_url',
        'status',
        'sort_order',

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {

            $portfolio->slug = Str::slug($portfolio->title);

        });

        static::updating(function ($portfolio) {

            $portfolio->slug = Str::slug($portfolio->title);

        });
    }
}
