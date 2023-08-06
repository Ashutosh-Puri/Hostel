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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('member_id')->nullable()->unique();
            $table->unsignedBigInteger('prn')->nullable()->unique();
            $table->unsignedBigInteger('abc_id')->nullable()->unique();
            $table->unsignedBigInteger('eligibility_no')->nullable()->unique();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-Active ,1-In-Active');
            $table->rememberToken();
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
