<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_uploads', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->double('amount')->nullable();
            $table->text('address')->nullable();  
            $table->string('status')->nullable();
            $table->string('transaction_id')->nullable();     
            $table->string('currency')->nullable(); 
            $table->string('reason')->nullable(); 

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
        Schema::dropIfExists('money_uploads');
    }
}
