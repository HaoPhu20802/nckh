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
        Schema::create('tbl_students', function (Blueprint $table) {
            $table->string('student_id', 17)->primary();
            $table->integer('nganh_id');
            $table->string('student_name', 50);
            $table->string('student_email', 100);
            $table->string('student_password', 20);
            $table->date('student_ngaysinh');
            $table->string('student_sdt', 11);
            $table->string('student_nienkhoa', 10);
            $table->unsignedInteger('student_role')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_students');
    }
};
