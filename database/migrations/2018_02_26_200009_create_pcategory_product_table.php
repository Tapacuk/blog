<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcategory_product', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('pcategory_id')->unsigned()->index();
            $table->timestamps();
            
            $table->foreign('pcategory_id')
            ->references('id')->on('pcategories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcategory_product');
    }
}
