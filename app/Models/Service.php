<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'price',
        'icon',
        'image',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
        'canonical_url',
        'og_title',
        'og_description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (!$service->slug) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}
