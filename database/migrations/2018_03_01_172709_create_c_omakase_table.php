<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCOmakaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_omakase', function (Blueprint $table) {
           $table->increments('c_omakase_id');
           $table->string('name')->nullable();
           $table->integer('om_price')->nullable();
           $table->string('description')->nullable();
           $table->integer('desc_price')->nullable();
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
        Schema::dropIfExists('c_omakase');
    }
}
