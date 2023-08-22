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
        Schema::create('seateds', function (Blueprint $table) {
            $table->id()->index();
            $table->integer('seated')->index();
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-active ,1-inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seateds');
    }
};
