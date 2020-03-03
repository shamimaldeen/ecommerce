<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->string('model');
            $table->double('price', 10, 2);
            $table->double('sale_price', 10, 2);
            $table->string('fea_image1')->nullable();
            $table->string('fea_image2')->nullable();
            $table->string('fea_image3')->nullable();
            $table->string('fea_image4')->nullable();
            $table->string('fea_image5')->nullable();
            $table->longText('description');
            $table->string('featured')->nullable();
            $table->string('new_arrival')->nullable();
            $table->string('hot_deals')->nullable();
            $table->string('offer')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
