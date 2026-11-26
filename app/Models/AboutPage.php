<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [

        // SEO Settings
        'meta_title',
        'meta_description',

        // Section 1: About MedVacation
        'about_subtitle',
        'main_title',
        'about_image',
        'about_description_1',
        'about_description_2',
        'about_description_3',

        // Section 2: Vision & Mission
        'purpose_subtitle',
        'purpose_title',
        'vision',
        'mission',

        // Section 3: Meet Our Founders
        'founders_subtitle',
        'founders_title',
        'founders_description',
    ];

    public function founders()
    {
        return $this->hasMany(AboutFounder::class, 'about_page_id')
            ->orderBy('sort_order', 'asc');
    }
}
