<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_customer', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_register')->nullable();
            $table->unsignedBigInteger('state_ticket_id');
            $table->unsignedBigInteger('customer_id');
            $table->text('description')->nullable();
            $table->dateTime('resolution_date')->nullable();
            $table->unsignedBigInteger('employee_id_resolution_case');

            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('employee_id_resolution_case')->references('id')->on('employee');
            $table->foreign('state_ticket_id')->references('id')->on('state_ticket');

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
        Schema::dropIfExists('ticket_customer');
    }
}
