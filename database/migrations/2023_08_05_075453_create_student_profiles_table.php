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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('mother_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('cast')->nullable();
            $table->string('category')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('parent_mobile')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('local_parent_name')->nullable();
            $table->string('local_parent_mobile')->nullable();
            $table->string('local_parent_address')->nullable();
            $table->tinyInteger('address_type')->nullable()->default(0)->comment('0-Rural ,1-Urbon');
            $table->string('blood_group')->nullable();
            $table->string('is_allergy')->nullable()->default(1);
            $table->tinyInteger('is_ragging')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
