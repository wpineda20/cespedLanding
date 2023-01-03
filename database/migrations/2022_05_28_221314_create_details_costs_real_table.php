<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsCostsRealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_costs_real', function (Blueprint $table) {
            $table->id();
            $table->string('description', 45)->nullable();
            $table->dateTime('month')->nullable();
            $table->double('value')->nullable();

            $table->unsignedBigInteger('real_costs_id');

            $table->foreign('real_costs_id', 'fk_details_costs_real_real_costs1')->references('id')->on('real_costs');

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
        Schema::dropIfExists('details_costs_real');
    }
}
