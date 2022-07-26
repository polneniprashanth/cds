<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->unique();
            $table->string('course_name')->unique();
            $table->string('Instructor_name');
            $table->integer('stud_enrolled');
            $table->float('course_rating',2,1);
            $table->string('course_details');
            $table->string('Course_Tag1')->nullable();
            $table->string('Course_Tag2')->nullable();
            $table->string('Course_Tag3')->nullable();
            $table->string('Course_Tag4')->nullable();
            $table->string('template');
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
        Schema::dropIfExists('courses');
    }
};
