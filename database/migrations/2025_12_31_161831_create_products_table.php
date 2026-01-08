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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->string('thumbnail');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('specifications');
            $table->text('key_features');
            $table->string('rental_type');
            $table->string('available_for');
            $table->string('rental_duration');
            $table->string('conditions');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
