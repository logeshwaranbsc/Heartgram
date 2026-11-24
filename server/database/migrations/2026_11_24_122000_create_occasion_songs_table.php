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
        Schema::create('occasion_songs', function (Blueprint $table) {
            $table->id();
            $table->string('occasion_id', 100)->unique();
            $table->string('title');
            $table->string('uppercase')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('category', 100)->nullable();
            $table->string('language', 100)->nullable();
            $table->text('image')->nullable();
            $table->text('audio')->nullable(); // Cloudinary audio URL
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occasion_songs');
    }
};
