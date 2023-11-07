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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('student_payment_id')->nullable();
            $table->unsignedBigInteger('student_fine_id')->nullable();
            $table->string('order_id');
            $table->string('razorpay_payment_id')->nullable();
            $table->string('razorpay_refund_id')->nullable();
            $table->string('razorpay_signature')->nullable();
            $table->decimal('amount', 10, 2)->nullable()->default('0');
            $table->tinyInteger('status')->nullable()->comment('-1-order created,0-Authorized ,2-Captured ,3-Refundeed ,4-Failed');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_payment_id')->references('id')->on('student_payments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_fine_id')->references('id')->on('student_fines')->onUpdate('cascade')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
