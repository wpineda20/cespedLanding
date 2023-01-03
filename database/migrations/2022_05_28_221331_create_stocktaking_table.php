<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocktakingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocktaking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('details_purchase_id');
            $table->double('costo_compra')->nullable();
            $table->integer('stock_minimo')->nullable();
            $table->double('precio_publico')->nullable();
            $table->double('precio_mayoreo')->nullable();
            $table->double('precio_costo')->nullable();
            $table->double('fecha_registro')->nullable();
            $table->double('precio_ultimo')->nullable();

            $table->foreign('details_purchase_id')->references('id')->on('details_purchase');

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
        Schema::dropIfExists('stocktaking');
    }
}
