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
        Schema::create('quotas', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('class_id');
            $table->integer('max_capacity');
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-Active ,1-In Active');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotas');
    }
};
