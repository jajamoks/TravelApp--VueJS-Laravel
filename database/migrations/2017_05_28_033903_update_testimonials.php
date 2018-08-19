<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTestimonials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('escape_type_id');
        });
        Schema::create('testimonials_testimoniables', function (Blueprint $table) {
            $table->unsignedInteger('testimonial_id');
            $table->integer('testimonials_id');
            $table->string('testimonials_type');
            $table->string('type')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->unique([
                'testimonial_id',
                'testimonials_id',
                'testimonials_type'
            ], 'unique_testimonials_index');
            $table->index([
                'testimonial_id',
                'testimonials_id',
                'testimonials_type'
            ], 'testimonials_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials_testimoniables');
    }
}
