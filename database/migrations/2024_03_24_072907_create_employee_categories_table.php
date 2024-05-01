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
        Schema::create('employee_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            
            $table->unsignedInteger('evaluation_period');

            $table->unsignedSmallInteger('total_leave')->default(0);

            $table->unsignedSmallInteger('monthly_earned_leave')->default(0);
            $table->unsignedSmallInteger('monthly_earned_leave_availability_duration')->default(0);

            $table->unsignedSmallInteger('monthly_casual_leave')->default(0);
            $table->unsignedSmallInteger('monthly_casual_leave_availability_duration')->default(0);

            $table->unsignedSmallInteger('monthly_medical_leave')->default(0);
            $table->unsignedSmallInteger('monthly_medical_leave_availability_duration')->default(0);

            $table->unsignedSmallInteger('yearly_earned_leave')->default(0);
            $table->unsignedSmallInteger('yearly_casual_leave')->default(0);
            $table->unsignedSmallInteger('yearly_medical_leave')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_categories');
    }
};
