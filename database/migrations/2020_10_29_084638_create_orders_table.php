<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->double('amount')->nullable();
            $table->text('address')->nullable();  
            $table->string('status')->nullable();
            $table->string('transaction_id')->nullable();     
            $table->string('currency')->nullable(); 

            $table->string('billing_address')->nullable(); 
            $table->string('b_name')->nullable();
            $table->string('b_email')->nullable();
            $table->string('b_phone')->nullable();
            $table->string('b_postcode')->nullable();
            $table->string('b_thana')->nullable();
            $table->string('b_area')->nullable();
            $table->string('b_district')->nullable();

            $table->string('shipping_address')->nullable();
            $table->string('s_name')->nullable();
            $table->string('s_email')->nullable();
            $table->string('s_phone')->nullable();
            $table->string('s_postcode')->nullable();
            $table->string('s_thana')->nullable();
            $table->string('s_area')->nullable();
            $table->string('s_district')->nullable();
            
            $table->string('who_orders')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_time')->nullable();

            $table->string('product_ids')->nullable();
            $table->string('qtys')->nullable();
            
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
