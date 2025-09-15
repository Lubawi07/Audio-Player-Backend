<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover_image');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('artist_id')->constrained('artist');
            $table->foreignId('album_id')->constrained('albums');
            $table->longText('lyrics');
            $table->string('file_music');
            $table->integer('duration');
            $table->integer('play_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
