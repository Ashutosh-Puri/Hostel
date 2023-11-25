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
        Schema::create('floors', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('building_id');
            $table->integer('floor')->index();
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-active ,1-inactive');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('building_id')->references('id')->on('buildings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floors');
    }
};
