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
        Schema::create('auctions', function (Blueprint $table) {

            $table->id();
            $table->json('name');
            $table->json('description');
            $table->date('start_date');
            $table->text('phone')->nullable();
            $table->text('image')->nullable();
            $table->double('start_price')->default(0);
            $table->enum('seller_type',['seller','zaman']);
            $table->double('before_price')->default(0);
            $table->string('area')->nullable(0);
            $table->double('after_price')->default(0);
            $table->double('commission');
            $table->double('value_added_tax');
            $table->foreignId('from_user_id')->nullable();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
