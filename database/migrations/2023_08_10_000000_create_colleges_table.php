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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id()->index();
            $table->string('heading_1');
            $table->string('heading_1_mr');
            $table->string('name')->unique()->index();
            $table->string('name_mr')->unique();
            $table->string('email');
            $table->string('mobile');
            $table->text('address');
            $table->tinyInteger('status')->default('0')->comment('0-active ,1-inactive');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
