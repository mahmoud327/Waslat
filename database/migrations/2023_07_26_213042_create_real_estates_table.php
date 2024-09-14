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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->double('price')->default(0);
            $table->string('phone')->nullable();
            $table->string('number_of_rooms')->nullable();
            $table->string('bathrooms_of_rooms')->nullable();
            $table->string('hall_number')->nullable();
            $table->string('number_of_council_rooms')->nullable();
            $table->string('land_area')->nullable();
            $table->string('street')->nullable();
            $table->string('number_of_streets')->nullable();
            $table->string('street_area')->nullable();
            $table->string('street_facing')->nullable();
            $table->tinyInteger('electricity')->default(0);
            $table->tinyInteger('water')->default(0);
            $table->string('Depth')->nullable();
            $table->string('features_facilities')->nullable();
            $table->string('Real_estate_characteristics')->nullable();
            $table->string('whatsup')->nullable();
            $table->string('email')->nullable();
            $table->string('marketer_name')->nullable();
            $table->string('license_number')->nullable();
            $table->json('description')->nullable();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
