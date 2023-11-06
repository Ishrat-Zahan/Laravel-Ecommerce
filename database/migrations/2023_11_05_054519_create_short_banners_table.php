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
        Schema::create('short_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image', 250);
            $table->string('banner_type', 255);
            $table->string('banner_title', 255);
            $table->string('bg_color', 255);
            $table->decimal('discount', 5, 2);
            $table->string('url', 255)->nullable();
            $table->string('btn_text', 255);
            $table->string('status', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_banners');
    }
};
