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

    /**
     * Accessor for full image URL that handles both standard paths
     * and legacy paths with 'public/' prefix gracefully.
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset('frontend/images/banner.jpg');
        }

        $raw = ltrim($this->image, '/');
        $clean = preg_replace('#^public/#', '', $raw);

        // 1. Direct match in public/ (e.g. public/uploads/sliders/...)
        if (file_exists(public_path($clean))) {
            return asset($clean);
        }

        // 2. Double public folder (e.g. public/public/uploads/sliders/...)
        if (file_exists(public_path($raw))) {
            return asset($raw);
        }

        // 3. Root directory match
        if (file_exists(base_path($clean))) {
            return asset($clean);
        }

        return asset($clean);
    }
}
