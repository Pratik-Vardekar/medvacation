<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFounder extends Model
{
    protected $fillable = [
        'about_page_id',
        'name',
        'designation',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function aboutPage()
    {
        return $this->belongsTo(AboutPage::class, 'about_page_id');
    }
}
