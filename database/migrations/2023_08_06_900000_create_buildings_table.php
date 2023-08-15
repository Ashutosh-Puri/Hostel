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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('hostel_id');
            $table->string('name')->unique()->index();
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-active ,1-inactive');
            $table->timestamps();
            $table->foreign('hostel_id')->references('id')->on('hostels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};