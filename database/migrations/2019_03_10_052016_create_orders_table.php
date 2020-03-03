<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('total_quantity');
            $table->double('total_price', 10, 2);
            $table->double('shipping_cost', 10, 2);
            $table->double('total_amount', 10, 2);
            $table->string('payment_method');
            $table->string('transaction_no')->nullable();
            $table->string('order_billingaddress')->nullable();
            $table->string('order_status');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');;
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
        Schema::dropIfExists('orders');
    }
}
