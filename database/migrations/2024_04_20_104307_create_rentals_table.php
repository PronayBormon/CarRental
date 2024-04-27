<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('carid');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('pickup_location');
            $table->string('drop_location');
            $table->date('return_date');
            $table->time('drop_time');
            $table->integer('rent_type');
            $table->string('customer_name');
            $table->string('contact_number');
            $table->integer('approval_status')->default(0); // Add approval_status column with default value
            $table->timestamps();

            // Define foreign key constraint if needed
            // $table->foreign('carid')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
