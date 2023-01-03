<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details_transfer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_transfer_id');
            $table->unsignedBigInteger('stocktaking_id');
            $table->integer('quantity')->nullable();
            $table->double('cost')->nullable();
            $table->double('detail_subtotal')->nullable();

            $table->foreign('product_transfer_id')->references('id')->on('product_transfer');
            $table->foreign('stocktaking_id')->references('id')->on('stocktaking');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details_transfer');
    }
}
