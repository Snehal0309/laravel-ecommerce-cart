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
           Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['active','converted'])->default('active'); // converted -> turned into order
            $table->decimal('subtotal',10,2)->default(0);
            $table->decimal('tax',10,2)->default(0);
            $table->decimal('shipping',10,2)->default(0);
            $table->decimal('total',10,2)->default(0);
            $table->timestamps();
            $table->unique(['user_id','status']); // one active cart per user
        });

           Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('number')->unique();
            $table->enum('status', ['pending','paid','failed'])->default('pending');
            $table->decimal('subtotal',10,2);
            $table->decimal('tax',10,2)->default(0);
            $table->decimal('shipping',10,2)->default(0);
            $table->decimal('total',10,2);
            $table->timestamps();
        });
         Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price',10,2);
            $table->decimal('line_total',10,2);
            $table->timestamps();
        });

        
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('provider');               // 'stripe'
            $table->string('provider_payment_id');    // PaymentIntent id
            $table->enum('status', ['requires_action','succeeded','failed'])->default('requires_action');
            $table->decimal('amount',10,2);
            $table->json('payload')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
   Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('carts');    }
};
