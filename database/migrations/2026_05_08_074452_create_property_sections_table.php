<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_sections', function (Blueprint $table) {

            $table->id();

            // Sell Section
            $table->string('sell_title');
            $table->string('sell_sub_title');
            $table->longText('sell_description');
            $table->string('sell_image');
            $table->string('sell_button_text');

            // Buy Section
            $table->string('buy_title');
            $table->string('buy_sub_title');
            $table->longText('buy_description');
            $table->string('buy_image');
            $table->string('buy_button_text');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_sections');
    }
};