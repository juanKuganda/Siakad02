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
        Schema::create('students', function (Blueprint $table) {
            $table->id("id_student");
            $table->string('name');
            $table->string('student_id_number');
            $table->string('email');
            $table->string('phone_number');
            $table->date('birth_date');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('status', ['Active', 'Inactive', 'Graduated' , 'Dropped Out']);
            $table->foreignId('majors_id')->constrained(
                'majors',
                'id_major',
                'majors_student_id'
                )->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
