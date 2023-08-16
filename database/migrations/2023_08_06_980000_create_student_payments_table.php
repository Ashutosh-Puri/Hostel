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
        Schema::create('student_payments', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('admission_id');
            $table->decimal('total_amount', 10, 2);
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-Not Paid,1-Paid,2-Cancel');
            $table->timestamps();
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('admission_id')->references('id')->on('admissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_payments');
    }
};
