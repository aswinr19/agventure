<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('card_number');
            $table->string('payment_method');
            $table->bigInteger('amount');
            $table->bigInteger('upi_id');
            $table->integer('cvv');
            $table->date('valid_through');
            $table->integer('delivery_charge');
            $table->foreignId('user_id');
            $table->foreignId('address_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
