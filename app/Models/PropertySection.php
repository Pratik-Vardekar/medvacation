<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySection extends Model
{
    use HasFactory;

    protected $fillable = [

        // Sell Section
        'sell_title',
        'sell_sub_title',
        'sell_description',
        'sell_image',
        'sell_button_text',

        // Buy Section
        'buy_title',
        'buy_sub_title',
        'buy_description',
        'buy_image',
        'buy_button_text',
    ];
}