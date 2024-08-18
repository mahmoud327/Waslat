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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('account_type')->default(0);
            $table->tinyInteger('is_active')->default(0);
            $table->string('phone_code')->nullable();
            $table->string('pin_code')->nullable();
            $table->tinyInteger('is_verify')->default(0);
            $table->string('phone')->nullable();
            $table->string('trade_name')->nullable();
            $table->text('val_license')->nullable();
            $table->text('Commercial_registration_number')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
