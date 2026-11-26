<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {

            $table->id();

            $table->string('banner_image')->nullable();

            $table->string('main_title')->nullable();
            $table->string('experience_title')->nullable();

            $table->longText('about_description_1')->nullable();
            $table->longText('about_description_2')->nullable();
            $table->longText('about_description_3')->nullable();

            $table->string('about_image')->nullable();

            $table->string('partner_title')->nullable();
            $table->longText('partner_description')->nullable();

            $table->string('director_name')->nullable();
            $table->string('director_designation')->nullable();
            $table->string('director_phone')->nullable();
            $table->string('director_email')->nullable();
            $table->string('director_image')->nullable();

            $table->string('experience_years')->nullable();
            $table->string('happy_buyers')->nullable();
            $table->string('happy_sellers')->nullable();
            $table->string('market_presence')->nullable();

            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();

            $table->longText('strength_1')->nullable();
            $table->longText('strength_2')->nullable();
            $table->longText('strength_3')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};