<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableCartStorageToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_storage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UserID')->unsigned();
            $table->foreign('UserID')->references('id')->on('users');
            $table->integer('ProductID')->nullable();
            $table->foreign('ProductID')->references('ID')->on('tblartikujt');
            $table->decimal('Qmimi',18,2);
            $table->string('Emri');
            $table->integer('Sasia');
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
        Schema::dropIfExists('cart_storage');
    }
}
