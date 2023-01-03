<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsCostsEstimatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_costs_estimated', function (Blueprint $table) {
            $table->id();
            $table->string('description', 45)->nullable();
            $table->dateTime('month')->nullable(); //month, datetime?
            $table->double('detail_cost_value')->nullable();

            $table->unsignedBigInteger('estimated_costs_id');

            $table->foreign('estimated_costs_id')->references('id')->on('estimated_costs');

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
        Schema::dropIfExists('details_costs_estimated');
    }
}
