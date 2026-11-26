<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
protected $fillable = [
    'form_type',
    'property_id',
    'property_title',
    'property_image',
    'name',
    'email',
    'phone',
    'country',
    'service',
    'subject',
    'message',
];
}