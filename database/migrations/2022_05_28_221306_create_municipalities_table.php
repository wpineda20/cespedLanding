<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('municipality_name');
            $table->string('mun_min');
            $table->string('mun_may');
            $table->string('dm_cod');
            $table->string('cod_mun');
            $table->unsignedBigInteger('department_id');

            $table->foreign('department_id', 'municipalities_department_id_foreign')->references('id')->on('department');

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
        Schema::dropIfExists('municipalities');
    }
}
