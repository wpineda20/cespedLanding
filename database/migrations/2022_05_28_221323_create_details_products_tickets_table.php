<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsProductsTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_products_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_customer_id');
            $table->unsignedBigInteger('product_id');
            $table->text('description')->nullable();

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('ticket_customer_id')->references('id')->on('ticket_customer');

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
        Schema::dropIfExists('details_products_tickets');
    }
}
