<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('category_id');
            $table->string('subcategory_id');
            $table->string('product_owner_id')->nullable();
            $table->string('is_admin_upload_product')->nullable();

            $table->string('buying_price');
            $table->string('shop_buying_price')->nullable();
            $table->string('selling_price');

            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_description')->nullable(); 

            $table->string('product_quantity')->nullable();
            $table->string('isAvailable')->nullable();  
            
            $table->string('status')->nullable();
            $table->string('block')->nullable(); 

            $table->string('upload_date')->nullable();

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
