<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    // Table name (optional, Laravel auto-detects)
    protected $table = 'sliders';

    // Fillable fields
    protected $fillable = [
        'sr_no',
        'image',
    ];

    // Casts (optional but good practice)
    protected $casts = [
        'sr_no' => 'integer',
    ];

    // Accessor for full image URL
    public function getImageUrlAttribute()
    {
        return asset($this->image);
    }
}