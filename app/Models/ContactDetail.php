<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'secondary_email',
        'address',
        'facebook',
        'instagram',
        'youtube',
        'linkedin',
        'map_url',
    ];
}