<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();    
            $table->string('phone')->unique();      
            $table->string('gender')->nullable();                 
            $table->string('birthday')->nullable();               
            $table->string('nid')->nullable();                
            $table->string('user_balance')->nullable();   
            $table->string('user_expence')->nullable();          

            $table->string('address')->nullable();
            $table->string('village')->nullable();
            $table->string('postcode')->nullable(); 
            $table->string('ps')->nullable();
            $table->string('district')->nullable();

            $table->string('avatar')->nullable();

            $table->integer('verify')->nullable();
            $table->integer('status')->nullable();
            $table->integer('block')->nullable();

            $table->string('vendor_id')->nullable(); 
            $table->string('shop_id')->nullable();
            $table->string('shop_name')->nullable();   
            $table->string('shop_logo')->nullable(); 
            $table->string('shop_rating')->nullable();   
            $table->string('shop_address')->nullable(); 

            $table->string('shop_balance')->nullable(); 
            $table->string('shop_profit')->nullable();
            $table->string('shop_total_expense')->nullable();
            $table->string('shop_total_earning')->nullable();
            $table->string('shop_total_profit')->nullable();

  
            $table->string('shop_verify')->nullable();    
            $table->string('shop_block')->nullable();      
            $table->string('shop_status')->nullable();   
                                                                                         
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
