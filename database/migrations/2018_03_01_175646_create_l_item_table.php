<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_item', function (Blueprint $table) {
           $table->increments('l_item_id');
           $table->string('name')->nullable();
           $table->integer('price')->nullable();
           $table->string('description')->nullable();
           $table->char('is_raw', 5);
           $table->integer('lunch_id')->unsigned();
           $table->foreign('lunch_id')->references('lunch_id')->on('lunch')
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
        Schema::dropIfExists('l_item');
    }
}
