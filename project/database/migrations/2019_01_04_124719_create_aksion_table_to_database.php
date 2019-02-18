<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAksionTableToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipi');
            $table->decimal('rabati',3,2);
            $table->string('qmimorja');
            $table->integer('productID')->nullable();
            $table->foreign('productID')->references('ID')->on('tblartikujt');
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
        Schema::dropIfExists('aksion');
    }
}
