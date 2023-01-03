<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nit', 45)->nullable();
            $table->string('nrc', 45)->nullable();
            $table->string('supplier_name', 100)->nullable();
            $table->string('supplier_phone', 45)->nullable();
            $table->string('direction')->nullable();
            $table->string('salesman_name', 45)->nullable();
            $table->string('salesman_phone_number', 45)->nullable();
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
        Schema::dropIfExists('supplier');
    }
}
