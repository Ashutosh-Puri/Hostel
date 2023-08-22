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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('seated_id');
            $table->string('label');
            $table->integer('capacity');
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-available ,1-unavailable');
            $table->timestamps();
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('cascade');
            $table->foreign('seated_id')->references('id')->on('seateds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
