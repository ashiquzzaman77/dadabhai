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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');

            $table->unsignedBigInteger('childcategory_id');
            $table->foreign('childcategory_id')->references('id')->on('child_categories')->onDelete('cascade');

            $table->string('product_name');
            $table->string('product_slug');

            $table->string('sku_code')->nullable();
            $table->string('mf_code')->nullable();
            $table->string('product_code')->nullable();
            $table->string('tags')->nullable();
            
            $table->string('color_id')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('child_id')->nullable();
            $table->longText('short_desc')->nullable();
            $table->longText('overview')->nullable();

            $table->string('specification')->nullable();
            $table->longText('accessories')->nullable();
            $table->longText('warranty')->nullable();
            $table->string('product_image')->nullable();
            $table->integer('qty')->default(1);
            $table->string('stock')->nullable();

            $table->string('selling_price')->nullable();
            $table->string('sas_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('deal')->nullable();

            $table->json('industry')->nullable();
            $table->json('solution')->nullable();
            $table->string('refurbished')->default('1');
            $table->string('feature');

            $table->string('price_status')->nullable();
            
            $table->string('product_type');
            $table->enum('product_status', ['sourcing', 'product'])->default('sourcing');

            $table->double('source_one_price')->nullable();
            $table->double('source_two_price')->nullable();
            $table->string('source_one_name')->nullable();
            $table->string('source_two_name')->nullable();
            $table->text('source_one_link')->nullable();
            $table->text('source_two_link')->nullable();

            $table->double('competitor_one_price')->nullable();
            $table->double('competitor_two_price')->nullable();
            $table->string('competitor_one_name', 255)->nullable();
            $table->string('competitor_two_name', 255)->nullable();
            $table->text('competitor_one_link')->nullable();
            $table->text('competitor_two_link')->nullable();

            $table->enum('source_one_approval', ['0', '1'])->default('0');
            $table->enum('source_two_approval', ['0', '1'])->default('0');
            $table->string('notification_days', 50)->nullable();
            $table->date('create_date')->nullable();
            $table->enum('solid_source', ['yes', 'no'])->default('no');
            $table->enum('direct_principal', ['yes', 'no'])->default('no');
            $table->enum('agreement', ['yes', 'no'])->default('no');

            $table->string('source_type', 50)->nullable();
            $table->string('price')->nullable();
            $table->text('source_contact')->nullable();
            $table->string('action_status', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->string('source_one_estimate_time',100)->nullable();

            $table->string('source_one_principal_time',100)->nullable();
            $table->string('source_one_shipping_time',100)->nullable();
            $table->string('source_one_location', 255)->nullable();
            $table->string('source_one_country', 100)->nullable();
            $table->string('source_two_estimate_time',100)->nullable();
            
            $table->string('source_two_principal_time',100)->nullable();
            $table->string('source_two_shipping_time',100)->nullable();
            $table->string('source_two_location', 255)->nullable();
            $table->string('source_two_country', 100)->nullable();
            $table->text('rejection_note')->nullable();

            $table->string('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
