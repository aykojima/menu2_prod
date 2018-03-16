<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sb', function (Blueprint $table) {
           $table->increments('sb_id');
           $table->char('eng_name', 128)->nullable();
           $table->char('jpn_name', 128)->nullable();
           $table->char('origin', 128)->nullable();
           $table->decimal('nigiri_price', 4, 1)->nullable();
           $table->decimal('sashimi_price', 4, 1)->nullable();
           $table->char('is_sustainable', 5);
           $table->char('is_raw', 5);
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
        Schema::dropIfExists('sb');
    }
}
