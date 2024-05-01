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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);
            $table->string('email', 150);
            $table->string('phone', 20)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('subject', 255)->nullable();
            $table->string('message', 255);
            $table->string('code', 255)->nullable();
            $table->string('ip_address', 100)->nullable();
            $table->enum('status',['pending','replied','cancelled'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
