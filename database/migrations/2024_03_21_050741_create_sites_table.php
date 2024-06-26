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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();

            $table->string('site_name', 100);
            $table->string('company_name', 100)->nullable();
            $table->string('site_slogan', 255)->nullable();
            $table->string('logo_white')->nullable();
            $table->string('logo_black')->nullable();
            $table->string('favicon')->nullable();
            $table->string('phone_one');
            $table->string('phone_two')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('address')->nullable();
            $table->string('default_currency', 10)->nullable();
            $table->double('currency_conversion_rate')->nullable();
            $table->string('default_language', 100)->nullable();
            $table->string('contact_email', 200);
            $table->string('support_email', 200)->nullable();
            $table->string('info_email', 200)->nullable();
            $table->string('sales_email', 200)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->string('skype_url', 255)->nullable();
            $table->string('twitter_url', 255)->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->string('youtube_url', 255)->nullable();
            $table->string('github_url', 255)->nullable();
            $table->string('portfolio_url', 255)->nullable();
            $table->string('fiver_url', 255)->nullable();
            $table->string('upwork_url', 255)->nullable();
            $table->string('service_days', 100)->nullable();
            $table->string('service_time', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
