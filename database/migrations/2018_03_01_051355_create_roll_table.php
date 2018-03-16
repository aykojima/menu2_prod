<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roll', function (Blueprint $table) {
           $table->increments('roll_id');
           $table->char('name', 128)->nullable();
           $table->string('description')->nullable();
           $table->integer('price')->nullable();
           $table->char('is_sustainable', 5);
           $table->char('is_raw', 5);
           $table->char('is_gf', 5);
           $table->char('category', 128);
           $table->char('is_special', 5);
           $table->char('is_on_menu', 5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roll');
    }
}
