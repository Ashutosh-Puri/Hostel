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
        Schema::create('allocations', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('admission_id');
            $table->unsignedBigInteger('fee_id')->nullable();
            $table->foreign('admission_id')->references('id')->on('admissions')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allocations');
    }
};
