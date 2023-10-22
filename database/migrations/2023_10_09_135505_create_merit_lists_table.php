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
        Schema::create('merit_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('class');
            $table->string('mobile');
            $table->string('gender');
            $table->decimal('sgpa', 4, 2)->nullable()->default(0.00);
            $table->decimal('percentage',5,2);
            $table->tinyInteger('status')->nullable()->default(0)->comment('0-not selected, 1-selected');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merit_lists');
    }
};
