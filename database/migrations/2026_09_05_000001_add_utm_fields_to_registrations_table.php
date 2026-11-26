<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            if (! Schema::hasColumn('registrations', 'utm_source')) {
                $table->string('utm_source')->nullable()->after('place');
            }
            if (! Schema::hasColumn('registrations', 'utm_medium')) {
                $table->string('utm_medium')->nullable()->after('utm_source');
            }
            if (! Schema::hasColumn('registrations', 'utm_campaign')) {
                $table->string('utm_campaign')->nullable()->after('utm_medium');
            }
            if (! Schema::hasColumn('registrations', 'utm_content')) {
                $table->string('utm_content')->nullable()->after('utm_campaign');
            }
            if (! Schema::hasColumn('registrations', 'utm_term')) {
                $table->string('utm_term')->nullable()->after('utm_content');
            }
            if (! Schema::hasColumn('registrations', 'campaign_id')) {
                $table->string('campaign_id')->nullable()->after('utm_term');
            }
            if (! Schema::hasColumn('registrations', 'adset_id')) {
                $table->string('adset_id')->nullable()->after('campaign_id');
            }
            if (! Schema::hasColumn('registrations', 'ad_id')) {
                $table->string('ad_id')->nullable()->after('adset_id');
            }
            if (! Schema::hasColumn('registrations', 'placement')) {
                $table->string('placement')->nullable()->after('ad_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $columns = [
                'utm_source',
                'utm_medium',
                'utm_campaign',
                'utm_content',
                'utm_term',
                'campaign_id',
                'adset_id',
                'ad_id',
                'placement',
            ];

            $drop = array_values(array_filter($columns, fn ($column) => Schema::hasColumn('registrations', $column)));

            if ($drop) {
                $table->dropColumn($drop);
            }
        });
    }
};
