<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 45)->nullable();
            $table->string('direction', 100)->nullable();
            $table->string('telephone', 45)->nullable();
            $table->string('cellphone', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('dui', 45)->nullable();
            $table->string('nit', 45)->nullable();
            $table->string('nrc', 45)->nullable();
            $table->tinyInteger('exempt')->nullable(); //exento, que significa?
            $table->dateTime('last_buy')->nullable();
            $table->decimal('credit_limit', 11, 4)->nullable();
            $table->unsignedBigInteger('subsidiary_id');

            $table->foreign('subsidiary_id')->references('id')->on('subsidiary');
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
        Schema::dropIfExists('customer');
    }
}
