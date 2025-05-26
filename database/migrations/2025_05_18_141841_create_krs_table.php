<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id("id_krs");
            $table->foreignId('student_id')->references('id_student')->on('students')->onDelete('cascade');
            $table->foreignId('subject_id')->references('id_subject')->on('subjects')->onDelete('cascade'); // Fixed this line
            $table->string('semester');
            $table->string('academic_year');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
