<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->dateTime('date')->nullable();
            $table->float('total')->nullable();
            $table->float('iva')->nullable();
            $table->string('transaction_number', 45)->nullable();
            $table->integer('credit_days')->nullable();
            $table->tinyInteger('paid_out')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('subsidiary_id');
            $table->unsignedBigInteger('type_id');

            $table->foreign('employee_id')->references('id')->on('employee');
            $table->foreign('subsidiary_id')->references('id')->on('subsidiary');
            $table->foreign('supplier_id')->references('id')->on('supplier');
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
        Schema::dropIfExists('purchase');
    }
}
