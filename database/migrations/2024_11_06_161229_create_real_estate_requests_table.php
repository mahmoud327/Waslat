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
        Schema::create('real_estate_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(0);
            $table->text('type')->nullable();
            $table->foreignId('city_id')->default(0);
            $table->foreignId('state_id')->default(0);
            $table->foreignId('category_id')->default(0);
            $table->string('number_of_rooms')->nullable();
            $table->string('land_area')->nullable();
            $table->double('price_from')->nullable();
            $table->double('price_to')->nullable();
            $table->text('code')->nullable();
            $table->text('note')->nullable();
            $table->string('bathrooms_of_rooms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_requests');
    }
};
