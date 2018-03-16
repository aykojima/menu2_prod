<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLItemDisplayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_item_display', function (Blueprint $table) {
           $table->increments('l_item_disp_id'); 
           $table->char('disp_name', 5);
           $table->char('disp_desc', 5);
           $table->integer('l_item_id')->unsigned();
           $table->foreign('l_item_id')->references('l_item_id')->on('l_item')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_item_display');
    }
}
