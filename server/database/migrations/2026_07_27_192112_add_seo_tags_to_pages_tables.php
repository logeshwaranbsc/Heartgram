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
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->longText('seo_tags')->nullable();
        });

        Schema::table('seo_pages', function (Blueprint $table) {
            $table->longText('seo_tags')->nullable();
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->longText('seo_tags')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn('seo_tags');
        });

        Schema::table('seo_pages', function (Blueprint $table) {
            $table->dropColumn('seo_tags');
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn('seo_tags');
        });
    }
};
