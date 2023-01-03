<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('bar_code', 50)->nullable();
            $table->string('product_name', 100)->nullable();
            $table->string('description', 100)->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('presentation_id');
            $table->unsignedBigInteger('brand_id');
            $table->integer('unit_per_presentation')->nullable();
            $table->tinyInteger('iva')->nullable();
            $table->tinyInteger('cesc')->nullable();
            $table->tinyInteger('service')->nullable();

            $table->tinyInteger('serie')->nullable();
            $table->tinyInteger('exempt')->nullable();
            $table->string('product_model', 45)->nullable();

            $table->foreign('brand_id')->references('id')->on('brand');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('presentation_id')->references('id')->on('presentation');
            $table->foreign('supplier_id')->references('id')->on('supplier');

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
        Schema::dropIfExists('product');
    }
}
