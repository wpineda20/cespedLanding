<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidiary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('municipalities_id');
            $table->string('subsidiary_name', 50)->nullable();
            $table->string('nrc', 45)->nullable();
            $table->string('nit', 45)->nullable();
            $table->string('direction', 100)->nullable();
            $table->string('giro', 45)->nullable();
            $table->string('number_phone', 45)->nullable();

            $table->foreign('municipalities_id', 'fk_subsidiary_municipalities1')->references('id')->on('municipalities')->onDelprimary()->autoIncrement();
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
        Schema::dropIfExists('subsidiary');
    }
}
