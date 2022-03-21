<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //fertilizer , pesticides , seeds
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('category_id')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->integer('quantity');
            $table->bigInteger('price');
            $table->string('image');
            $table->text('suitable_crops')->nullable();
            $table->text('recommended_crops')->nullable();
            $table->text('composition')->nullable();
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
        Schema::dropIfExists('products');
    }
}
