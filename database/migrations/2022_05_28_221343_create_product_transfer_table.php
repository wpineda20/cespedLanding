<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_transfer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subsidiary_id_origen');
            $table->unsignedBigInteger('subsidiary_id_destino');
            $table->dateTime('date_shipping')->nullable();
            $table->dateTime('date_reception')->nullable();
            $table->unsignedBigInteger('employee_id_shipping');
            $table->unsignedBigInteger('employee_id_reception');
            $table->string('orden_number', 10)->nullable();
            $table->unsignedBigInteger('state_transfer_id');

            $table->foreign('employee_id_shipping')->references('id')->on('employee');
            $table->foreign('employee_id_reception')->references('id')->on('employee');
            $table->foreign('state_transfer_id')->references('id')->on('state_transfer');
            $table->foreign('subsidiary_id_origen')->references('id')->on('subsidiary');
            $table->foreign('subsidiary_id_destino')->references('id')->on('subsidiary');

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
        Schema::dropIfExists('product_transfer');
    }
}
