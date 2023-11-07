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
        Schema::create('come_from_homes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('allocation_id');
            $table->timestamp('come_time')->nullable();
            $table->tinyInteger('status')->nullable()->default('0');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('allocation_id')->references('id')->on('allocations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('come_from_homes');
    }
};
