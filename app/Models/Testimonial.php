<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'location',
        'message',
        'image',
    ];

    /**
     * Accessor for full image URL that handles both standard paths
     * and legacy paths with 'public/' prefix gracefully.
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset('frontend/images/profile/user.jpg');
        }

        $raw = ltrim($this->image, '/');
        $clean = preg_replace('#^public/#', '', $raw);

        if (file_exists(public_path($clean))) {
            return asset($clean);
        }

        if (file_exists(public_path($raw))) {
            return asset($raw);
        }

        if (file_exists(base_path($clean))) {
            return asset($clean);
        }

        return asset($clean);
    }
}
