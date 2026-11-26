<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {
              $table->string('preetpal_name')->nullable();

            $table->string('preetpal_title')->nullable();

            $table->string('preetpal_image')->nullable();

            $table->longText('preetpal_description_1')->nullable();

            $table->longText('preetpal_description_2')->nullable();

            $table->longText('preetpal_description_3')->nullable();

            $table->longText('preetpal_description_4')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {

            $table->dropColumn([
                'preetpal_name',
                'preetpal_title',
                'preetpal_image',
                'preetpal_description_1',
                'preetpal_description_2',
                'preetpal_description_3',
                'preetpal_description_4'
            ]);

        });
    }
};
