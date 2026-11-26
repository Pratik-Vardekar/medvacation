<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->string('age');
            $table->string('locality');
            $table->string('business_name');
            $table->string('business_age');
            $table->string('website')->nullable();
            $table->unsignedTinyInteger('rating');
            $table->string('payment_status')->default('pending');
            $table->string('lead_type')->default('warm');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
