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
            $table->id()->index();
            $table->string('username');
            $table->string('name')->nullable()->index();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('photo')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('dob')->nullable();
            $table->unsignedBigInteger('cast_id')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('parent_mobile')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('local_parent_name')->nullable();
            $table->string('local_parent_mobile')->nullable();
            $table->string('local_parent_address')->nullable();
            $table->string('blood_group')->nullable();
            $table->tinyInteger('gender')->nullable()->comment('0-Male ,1-Female');
            $table->string('is_allergy')->nullable();
            $table->tinyInteger('is_ragging')->nullable()->default(0);
            $table->unsignedBigInteger('member_id')->nullable()->unique();
            $table->unsignedBigInteger('prn')->nullable()->unique();
            $table->unsignedBigInteger('abc_id')->nullable()->unique();
            $table->unsignedBigInteger('eligibility_no')->nullable()->unique();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->tinyInteger('address_type')->nullable()->default(0)->comment('0-Rural ,1-Urbon');
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-Active ,1-In-Active');
            $table->string('rfid')->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('cast_id')->references('id')->on('casts')->onUpdate('cascade')->onDelete('cascade');
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
