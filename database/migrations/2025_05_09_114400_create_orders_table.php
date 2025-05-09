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
        $table->string('email');
        $table->string('phone');
        $table->string('fullname');
        $table->string('address1');
        $table->string('address2')->nullable();
        $table->string('city');
        $table->string('state');
        $table->string('country');
        $table->enum('payment_method', ['credit-card','apple-pay-wish','omt','cod']);
        $table->string('cc_name')->nullable();
        $table->string('cc_number')->nullable();
        $table->string('cc_expiration')->nullable();
        $table->string('cc_cvc')->nullable();
        $table->boolean('terms');
        $table->decimal('total', 10, 2)->default(0);
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
