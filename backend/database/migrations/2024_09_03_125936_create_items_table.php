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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('type', length: 30);
            $table->string('name', length: 25)->nullable();
            $table->text('description')->nullable();
            $table->json('price');
            $table->json('properties')->nullable();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone',15);
            $table->json('address');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->dateTime('order_date');
            $table->decimal('price',10,2);

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id');
            $table->int('quantity');
            $table->decimal('price',10,2);

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //drop foreign keys
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['item_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        //drop your balls-- i mean tables
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('order');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('items');
    }
};
