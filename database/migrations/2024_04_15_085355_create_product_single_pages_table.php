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
        Schema::create('product_single_pages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('status', ['active', 'inactive'])->default('inactive');

            $table->text('row_two_image_one')->comment('Dimensions: 1200 x 700 pixels')->nullable();
            $table->text('row_two_image_two')->comment('Dimensions: 1200 x 700 pixels')->nullable();
            $table->text('row_two_image_three')->comment('Dimensions: 1200 x 700 pixels')->nullable();
            $table->text('row_two_image_four')->comment('Dimensions: 1200 x 700 pixels')->nullable();

            $table->string('row_three_title')->nullable();
            $table->mediumText('row_three_description')->nullable();

            $table->text('row_five_image')->comment('Dimensions: 870 x 1200 pixels')->nullable();
            $table->string('row_five_title')->nullable();
            $table->mediumText('row_five_description')->nullable();
            
            $table->string('row_six_title')->nullable();
            $table->text('row_six_background_image')->comment('Dimensions: 1920 x 1542 pixels')->nullable();
            $table->string('row_six_sub_title')->nullable();
            $table->mediumText('row_six_short_description')->nullable();
            $table->mediumText('row_six_description')->nullable();

            $table->string('row_seven_title')->nullable();
            $table->text('row_seven_background_image')->comment('Dimensions: 1920 x 820 pixels')->nullable();

            $table->text('row_eight_image')->comment('Dimensions: 978 x 269 pixels')->nullable();

            $table->string('row_nine_title')->nullable();
            $table->string('row_nine_sub_title')->nullable();
            $table->text('row_nine_background_image')->comment('Dimensions: 1920 x 1499 pixels')->nullable();
            $table->text('row_nine_image')->comment('Dimensions: 602 x 575 pixels')->nullable();

            $table->string('row_ten_title')->nullable();
            $table->text('row_ten_image_one')->comment('Dimensions: 592 x 421 pixels')->nullable();
            $table->text('row_ten_image_two')->comment('Dimensions: 531 x 413 pixels')->nullable();
            $table->mediumText('row_ten_description')->nullable();

            $table->string('row_eleven_title')->nullable();
            $table->text('row_eleven_image')->comment('Dimensions: 591 x 370 pixels')->nullable();
            $table->mediumText('row_eleven_description')->nullable();

            $table->longText('row_twelve_description')->nullable()->comment('TextEditor');

            $table->text('row_thirteen_background_image')->comment('Dimensions: 1920 x 1408 pixels')->nullable();
            $table->string('row_thirteen_image_one_title')->nullable();
            $table->text('row_thirteen_image_one')->comment('Dimensions: 989 x 392 pixels')->nullable();
            $table->string('row_thirteen_image_two_title')->nullable();
            $table->text('row_thirteen_image_two')->comment('Dimensions: 818 x 501 pixels')->nullable();

            $table->string('row_fourteen_title')->nullable();
            $table->text('row_fourteen_background_image')->comment('Dimensions: 1920 x 854 pixels')->nullable();

            $table->string('row_fifteen_title')->nullable();
            $table->string('row_fifteen_sub_title')->nullable();
            $table->text('row_fifteen_image')->comment('Dimensions: 1920 x 825 pixels')->nullable();
            $table->mediumText('row_fifteen_description')->nullable();

            $table->string('row_sixteen_title')->nullable();
            $table->string('row_sixteen_sub_title')->nullable();
            $table->text('row_sixteen_background_image')->comment('Dimensions: 1920 x 1299 pixels')->nullable();
            $table->text('row_sixteen_image')->comment('Dimensions: 896 x 497 pixels')->nullable();
            $table->mediumText('row_sixteen_description')->nullable();

            $table->string('row_seventeen_title')->nullable();
            $table->text('row_seventeen_image')->comment('Dimensions: 1920 x 2853 pixels')->nullable();

            $table->string('row_eighteen_title')->nullable();
            $table->string('row_eighteen_sub_title')->nullable();
            $table->mediumText('row_eighteen_description')->nullable();
            $table->text('row_eighteen_background_image')->comment('Dimensions: 1921 x 896 pixels')->nullable();
            $table->text('row_eighteen_image')->comment('Dimensions: 293 x 262 pixels')->nullable();

            $table->string('row_nineteen_title')->nullable();
            $table->mediumText('row_nineteen_description')->nullable();
            $table->text('row_nineteen_image_one')->comment('Dimensions: 220 x 350 pixels')->nullable();
            $table->string('row_nineteen_image_one_title')->nullable();
            $table->text('row_nineteen_image_two')->comment('Dimensions: 220 x 350 pixels')->nullable();
            $table->string('row_nineteen_image_two_title')->nullable();
            $table->text('row_nineteen_image_three')->comment('Dimensions: 220 x 350 pixels')->nullable();
            $table->string('row_nineteen_image_three_title')->nullable();

            $table->text('feature_section_background_image')->comment('Dimensions: 1920 x 1127 pixels')->nullable();

            $table->text('feature_one_image')->comment('Dimensions: 70 x 70 pixels')->nullable();
            $table->string('feature_one_title')->nullable();
            $table->mediumText('feature_one_description')->nullable();

            $table->text('feature_two_image')->comment('Dimensions: 70 x 70 pixels')->nullable();
            $table->string('feature_two_title')->nullable();
            $table->mediumText('feature_two_description')->nullable();

            $table->text('feature_three_image')->comment('Dimensions: 70 x 70 pixels')->nullable();
            $table->string('feature_three_title')->nullable();
            $table->mediumText('feature_three_description')->nullable();

            $table->text('feature_four_image')->comment('Dimensions: 70 x 70 pixels')->nullable();
            $table->string('feature_four_title')->nullable();
            $table->mediumText('feature_four_description')->nullable();

            $table->text('feature_five_image')->comment('Dimensions: 70 x 70 pixels')->nullable();
            $table->string('feature_five_title')->nullable();
            $table->mediumText('feature_five_description')->nullable();
            
            $table->text('feature_six_image')->comment('Dimensions: 70 x 70 pixels')->nullable();
            $table->string('feature_six_title')->nullable();
            $table->mediumText('feature_six_description')->nullable();

            $table->string('design_section_title')->nullable();
            $table->mediumText('design_section_description')->nullable();

            $table->text('design_section_image_one')->comment('Dimensions: 1920 x 600 pixels')->nullable();
            $table->text('design_section_image_two')->comment('Dimensions: 1920 x 600 pixels')->nullable();
            $table->text('design_section_image_three')->comment('Dimensions: 1920 x 600 pixels')->nullable();
            $table->text('design_section_image_four')->comment('Dimensions: 1920 x 600 pixels')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_single_pages');
    }
};
