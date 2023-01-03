<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_purchase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->double('amount')->nullable();
            $table->double('purchase_price')->nullable();
            $table->double('iva')->nullable();

            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('purchase_id')->references('id')->on('purchase');

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
        Schema::dropIfExists('details_purchase');
    }
}
