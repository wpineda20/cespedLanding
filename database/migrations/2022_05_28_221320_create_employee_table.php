<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id');
            $table->string('names', 45)->nullable();
            $table->string('last_names', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('direction', 100)->nullable();
            $table->string('dui', 45)->nullable();
            $table->string('nit', 45)->nullable();
            $table->string('civil_status', 45)->nullable();
            $table->string('gender', 45)->nullable();
            $table->unsignedBigInteger('subsidiary_id');
            $table->unsignedBigInteger('municipalities_id');
            $table->float('commission')->nullable();

            $table->unsignedBigInteger('labor_departments_id');

            $table->foreign('labor_departments_id')->references('id')->on('labor_departments');
            $table->foreign('municipalities_id')->references('id')->on('municipalities');
            $table->foreign('position_id')->references('id')->on('position');
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
        Schema::dropIfExists('employee');
    }
}
