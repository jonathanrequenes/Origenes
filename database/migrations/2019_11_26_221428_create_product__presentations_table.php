<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product__presentations', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('product_id')->unsigned();
          $table->unsignedBigInteger('presentation_id')->unsigned();
          $table->timestamps();

          $table->foreign('product_id')->references('id')->on('products');
          $table->foreign('presentation_id')->references('id')->on('presentations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product__presentations');
    }
}
