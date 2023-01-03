<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_quotation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price_quotation_id');
            $table->integer('cantidad')->nullable();
            $table->double('precio')->nullable();
            $table->double('total')->nullable();
            $table->tinyInteger('estado')->nullable();
            $table->unsignedBigInteger('product_id');

            $table->foreign('price_quotation_id')->references('id')->on('price_quotation');
            $table->foreign('product_id')->references('id')->on('product');

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
        Schema::dropIfExists('price_quotation_details');
    }
}
