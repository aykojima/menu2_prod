<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCAddOnItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_add_on_item', function (Blueprint $table) {
           $table->increments('c_add_on_id');
           $table->string('description')->nullable();
           $table->integer('price')->nullable();
           $table->integer('course_id')->unsigned();
           $table->foreign('course_id')->references('course_id')->on('course')
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
        Schema::dropIfExists('c_add_on_item');
    }
}
