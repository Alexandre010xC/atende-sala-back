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
        Schema::create('students_classrooms', function (Blueprint $table) {
            $table->id();
            $table->integer('classroom_id');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->integer('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->string('position_seat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_classrooms');
    }
};
