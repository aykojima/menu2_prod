<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIppinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ippin', function (Blueprint $table) {
           $table->increments('ippin_id');
           $table->string('name')->nullable();
           $table->integer('price')->nullable();
           $table->char('is_sustainable', 5);
           $table->char('is_raw', 5);
           $table->char('is_gf', 5);
           $table->char('category', 128);
           $table->char('is_special', 5);
           $table->char('is_on_menu', 5);
           
           //$table->foreign(‘client_id’)->unsigned();
           //$table->foreign(room_id)->references(‘id’)->on(‘rooms’);
           //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ippin');
    }
}
