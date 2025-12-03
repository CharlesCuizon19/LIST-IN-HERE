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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->longText('overview');
            $table->decimal('price', 15, 2)->default(0);
            $table->string('sqm');
            $table->string('location');
            $table->string('thumbnail');
            $table->enum('status', ['for_sale', 'for_rent'])->default('for_sale');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
