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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('carname');
            $table->string('cartransmission');
            $table->integer('carseat');
            $table->string('carinterior');
            $table->string('carcategory');
            $table->string('cartype');
            $table->string('carmake');
            $table->decimal('perhour', 8, 2); // Assuming perhour is a decimal value
            $table->decimal('perday', 8, 2); // Assuming perday is a decimal value
            $table->text('short_desc');
            $table->text('desc');
            $table->text('image')->nullable(); // Assuming 'image' is a string field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
