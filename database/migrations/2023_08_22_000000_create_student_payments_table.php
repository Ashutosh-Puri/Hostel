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
            $table->decimal('amount', 10, 2)->nullable()->default('0');
            $table->decimal('deposite', 10, 2)->nullable()->default('0');
            $table->decimal('total_amount', 10, 2);
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-Not Paid,1-Paid,2-Cancel');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('admission_id')->references('id')->on('admissions')->onUpdate('cascade')->onDelete('cascade');
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
