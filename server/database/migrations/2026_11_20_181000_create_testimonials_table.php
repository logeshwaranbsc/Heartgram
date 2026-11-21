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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50)->default('video'); // video, text, image
            $table->string('name');
            $table->string('occasion')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->text('video_url')->nullable(); // Cloudinary video URL
            $table->text('media')->nullable(); // Thumbnail / cover image (Cloudinary or local path)
            $table->text('audio')->nullable(); // Optional audio sample
            $table->string('duration', 50)->nullable(); // e.g. 0:48 min
            $table->string('tag', 100)->nullable(); // e.g. Happy Tears 😭
            $table->unsignedTinyInteger('rating')->default(5);
            $table->string('location', 100)->nullable(); // e.g. Mumbai
            $table->string('channel', 100)->nullable(); // e.g. WhatsApp Message
            $table->string('time', 100)->nullable(); // e.g. Yesterday at 11:42 PM
            $table->string('keepsake', 255)->nullable(); // e.g. Framed Acrylic Plaque
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
