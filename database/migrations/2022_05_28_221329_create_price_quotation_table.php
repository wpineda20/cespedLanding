<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_quotation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->dateTime('fecha')->nullable();
            $table->text('saludo_inicial')->nullable();
            $table->text('validez')->nullable();
            $table->text('credito')->nullable();
            $table->text('saludo_final')->nullable();
            $table->text('observaciones')->nullable();

            $table->foreign('customer_id')->references('id')->on('customer');

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
        Schema::dropIfExists('price_quotation');
    }
}
