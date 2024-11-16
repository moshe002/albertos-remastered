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
            $table->string('item_name', length: 50);
            $table->enum('item_type', ['Ice Cream', 'Pizza', 'Breakfast Meals', 'Shakes', 'Drinks']);
            $table->text('item_ingredients')->nullable();
            $table->enum('size', ['9"', '11"'])->nullable();
            $table->enum('cheese_type', ['Mozarella', 'Quickmelt'])->nullable();
            $table->integer('quantity')->nullable();
            $table->double('price');
            $table->string('image_path', length: 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
