<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micros', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('microcategory_name');
            $table->string('subcategory_id');
            $table->string('microcategory_picture')->nullable(); 
            $table->string('uploaded_date')->nullable(); 

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
        Schema::dropIfExists('micros');
    }
}
