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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('about_heading');
            $table->text('about_desc');
            $table->string('about_img')->nullable();
            $table->string('mission_heading');
            $table->text('mission_desc');
            $table->string('mission_img')->nullable();
            $table->string('vision_heading');
            $table->text('vision_desc');
            $table->string('vision_img')->nullable();
            $table->string('video_url')->nullable();
            $table->string('founder_heading');
            $table->text('founder_desc');
            $table->string('founder_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
