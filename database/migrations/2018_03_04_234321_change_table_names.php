<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('sb', 'sbs');
        Schema::rename('ippin', 'ippins');
        Schema::rename('roll', 'rolls');
        Schema::rename('course', 'courses');
        Schema::rename('c_item', 'c_items');
        Schema::rename('c_add_on_item', 'c_add_on_items');
        Schema::rename('c_omakase', 'c_omakases');
        Schema::rename('lunch', 'lunchs');
        Schema::rename('l_item', 'l_items');
        Schema::rename('l_display', 'l_displays');
        Schema::rename('l_item_display', 'l_item_displays');
        Schema::rename('update', 'updates');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('sbs', 'sb');
        Schema::rename('ippins', 'ippin');
        Schema::rename('rolls', 'roll');
        Schema::rename('courses', 'course');
        Schema::rename('c_items', 'c_item');
        Schema::rename('c_add_on_items', 'c_add_on_item');
        Schema::rename('c_omakases', 'c_omakase');
        Schema::rename('lunchs', 'lunch');
        Schema::rename('l_items', 'l_item');
        Schema::rename('l_displays', 'l_display');
        Schema::rename('l_item_displays', 'l_item_display');
        Schema::rename('updates', 'update');
    }
}
