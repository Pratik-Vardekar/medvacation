<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_enquiries', function (Blueprint $table) {

            $table->string('property_id')->nullable()->after('form_type');

        });
    }

    public function down(): void
    {
        Schema::table('contact_enquiries', function (Blueprint $table) {

            $table->dropColumn('property_id');

        });
    }
};