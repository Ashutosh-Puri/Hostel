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
        Schema::create('night_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('allocation_id');
            $table->text('reason');
            $table->timestamp('going_date')->nullable();
            $table->timestamp('comming_date')->nullable();
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
        Schema::dropIfExists('night_outs');
    }
};
