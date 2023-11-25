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
        Schema::create('hostels', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('college_id');
            $table->string('name');
            $table->tinyInteger('gender')->default('0')->comment('0-Boys ,1-Girls');
            $table->tinyInteger('status')->default('0')->comment('0-active ,1-inactive');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('college_id')->references('id')->on('colleges')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostels');
    }
};
