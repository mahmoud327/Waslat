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
            $table->enum('purpose',['buying','Hire'])->nullable();
            $table->enum('how_purchase',['cash','finance'])->nullable();
            $table->double('min_price')->default(0);
            $table->string('phone')->nullable();
            $table->string('whatsup')->nullable();
            $table->json('description')->nullable();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type_clinet',['searching_real_estate','investor','broker'])->nullable();


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
