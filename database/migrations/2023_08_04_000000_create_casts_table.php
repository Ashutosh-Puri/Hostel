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
        Schema::create('casts', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->tinyInteger('status')->nullable()->default('0')->comment('0-Active ,1-In Active');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casts');
    }
};
