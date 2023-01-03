<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('stocktaking_id');
            $table->integer('cantidad')->nullable();
            $table->double('precio_venta')->nullable();
            $table->double('iva')->nullable();
            $table->double('cesc')->nullable();
            $table->double('exento')->nullable();
            $table->double('total_detalle')->nullable();
            $table->double('costo_compra')->nullable();

            $table->foreign('sale_id')->references('id')->on('sale');
            $table->foreign('stocktaking_id')->references('id')->on('stocktaking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_details');
    }
}
