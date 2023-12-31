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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            //$table->foreignId('product_id')->constrained();
             //$table->integer('product_id');
            // $table->string('product_name');
            $table->string('status')->default('pending');
            $table->double('total_price')->default(0.0);
            $table->string('payment_method')->default('cod');
            $table->string('address');
            $table->integer('receiver_mobile');
            $table->string('receiver_name');
            $table->string('receiver_email')->nullable();
            $table->text('order_note')->nullable();
            $table->string('transaction_id')->unique();
            $table->string('payment_status')->nullable();
            $table->string('delivery_men_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
