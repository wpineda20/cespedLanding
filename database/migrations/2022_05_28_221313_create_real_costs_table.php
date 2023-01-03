<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_costs', function (Blueprint $table) {
            $table->id();
            $table->string('cost_name', 45)->nullable();

            $table->unsignedBigInteger('estimate_id');
            $table->unsignedBigInteger('category_costs_id');

            $table->foreign('category_costs_id')->references('id')->on('category_costs');
            $table->foreign('estimate_id')->references('id')->on('estimate');

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
        Schema::dropIfExists('real_costs');
    }
}
