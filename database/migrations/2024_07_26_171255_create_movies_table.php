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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->longText('short_desc');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('genre');
            $table->string('image');
            $table->string('banner');
            $table->integer('language');
            $table->string('director')->nullable();
            $table->string('casts')->nullable();
            $table->json('download_links')->nullable();
            $table->string('trailer')->nullable();
            $table->string('release_date')->nullable();
            $table->string('rating');
            $table->integer('visitor')->default(0);
            $table->boolean('version');
            $table->boolean('feature');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
