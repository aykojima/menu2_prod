<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_item', function (Blueprint $table) {
           $table->increments('c_item_id');
           $table->string('name')->nullable();
           $table->integer('price')->nullable();
           $table->string('description')->nullable();
           $table->char('choice', 5);
           $table->integer('course_id')->unsigned();
           $table->foreign('course_id')->references('course_id')->on('course')
                ->onDelete('cascade');
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
        Schema::dropIfExists('c_item');
    }
}
