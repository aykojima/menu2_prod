<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLunchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lunch', function (Blueprint $table) {
           $table->increments('lunch_id');
           $table->char('title', 128)->nullable();
           $table->string('subtitle')->nullable();
           $table->string('combo_title')->nullable();
           $table->string('combo_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lunch');
    }
}
