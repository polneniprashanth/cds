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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            
            $table->string('cert_id')->nullable();
            $table->float('score',4,2);
            $table->date('enrolled');
            $table->date('completed');
            $table->string('project_name');
            $table->string('course_instructor1');
            $table->string('course_instructor2');
            $table->string('certificate')->nullable();
            $table->string('mail')->nullable();
            $table->timestamps();

            $table->string('course_name');
            $table->string('stud_name');
            $table->string('stud_id');
            $table->foreign('stud_id')->references('stud_id')->on('students')->onDelete('cascade');;
            $table->foreign('course_name')->references('course_name')->on('courses')->onDelete('cascade');;
            $table->unique(['course_name', 'stud_id']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
};
