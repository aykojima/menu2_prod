<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLDisplayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_display', function (Blueprint $table) {
           $table->increments('l_disp_id');
           $table->char('disp_section', 5);
           $table->char('disp_title', 5);
           $table->char('disp_subtitle', 5);
           $table->char('disp_combo_title', 5);
           $table->char('disp_combo_desc', 5);
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
        Schema::dropIfExists('l_display');
    }
}
