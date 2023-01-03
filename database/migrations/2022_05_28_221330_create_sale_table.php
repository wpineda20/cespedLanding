<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('tipo_comprobante', 45)->nullable();
            $table->string('numero_comprobante', 45)->nullable();
            $table->dateTime('fecha_venta')->nullable();
            $table->double('iva')->nullable();
            $table->double('total')->nullable();
            $table->unsignedBigInteger('subsidiary_id');
            $table->tinyInteger('estado')->nullable();
            $table->integer('dias_credito')->nullable();
            $table->tinyInteger('pagado')->nullable();
            $table->double('retencion')->nullable();
            $table->unsignedBigInteger('price_quotation_id')->nullable();
            $table->unsignedBigInteger('type_id');

            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('employee_id')->references('id')->on('employee');
            $table->foreign('price_quotation_id')->references('id')->on('price_quotation');
            $table->foreign('subsidiary_id')->references('id')->on('subsidiary');
            $table->foreign('type_id')->references('id')->on('type');

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
        Schema::dropIfExists('sale');
    }
}
