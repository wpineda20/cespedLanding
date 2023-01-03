<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardex', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha')->nullable();
            $table->string('tipo_comprobante', 45)->nullable();
            $table->string('numero_comprobante', 45)->nullable();
            $table->string('operacion', 45)->nullable();
            $table->double('precio')->nullable();
            $table->tinyInteger('entrada')->nullable();
            $table->tinyInteger('salida')->nullable();
            $table->integer('saldo')->nullable();
            $table->tinyInteger('estado')->nullable();
            $table->unsignedBigInteger('details_purchase_id')->nullable();
            $table->unsignedBigInteger('sale_details_id')->nullable();

            $table->foreign('details_purchase_id')->references('id')->on('details_purchase');
            $table->foreign('sale_details_id')->references('id')->on('sale_details');

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
        Schema::dropIfExists('kardex');
    }
}
