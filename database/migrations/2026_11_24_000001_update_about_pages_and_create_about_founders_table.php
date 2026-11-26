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
            if (!Schema::hasColumn('about_pages', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('id');
            }
            if (!Schema::hasColumn('about_pages', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('about_pages', 'about_subtitle')) {
                $table->string('about_subtitle')->nullable()->after('meta_description');
            }
            if (!Schema::hasColumn('about_pages', 'purpose_subtitle')) {
                $table->string('purpose_subtitle')->nullable();
            }
            if (!Schema::hasColumn('about_pages', 'purpose_title')) {
                $table->string('purpose_title')->nullable();
            }
            if (!Schema::hasColumn('about_pages', 'founders_subtitle')) {
                $table->string('founders_subtitle')->nullable();
            }
            if (!Schema::hasColumn('about_pages', 'founders_title')) {
                $table->string('founders_title')->nullable();
            }
            if (!Schema::hasColumn('about_pages', 'founders_description')) {
                $table->text('founders_description')->nullable();
            }
        });

        if (!Schema::hasTable('about_founders')) {
            Schema::create('about_founders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('about_page_id')->nullable()->index();
                $table->string('name');
                $table->string('designation')->nullable();
                $table->string('image')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();

                $table->foreign('about_page_id')
                    ->references('id')
                    ->on('about_pages')
                    ->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_founders');

        Schema::table('about_pages', function (Blueprint $table) {
            $columnsToDrop = array_filter([
                'meta_title',
                'meta_description',
                'about_subtitle',
                'purpose_subtitle',
                'purpose_title',
                'founders_subtitle',
                'founders_title',
                'founders_description',
            ], function ($column) {
                return Schema::hasColumn('about_pages', $column);
            });

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
