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
        Schema::create('booking_real_estates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('real_estate_id')->default(0);
            $table->bigInteger('user_id')->default(0);
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_real_estates');
    }
};
