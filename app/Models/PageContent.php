<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
     protected $fillable = [

        'page_id',
        'section',
        'title',
        'description',
        'image',

    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
