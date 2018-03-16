<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ippins', function($table) {
            $table->timestamps();
        });
        Schema::table('rolls', function($table) {
            $table->timestamps();
        });
        Schema::table('courses', function($table) {
            $table->timestamps();
        });
        Schema::table('c_items', function($table) {
            $table->timestamps();
        });
        Schema::table('c_add_on_items', function($table) {
            $table->timestamps();
        });
        Schema::table('c_omakases', function($table) {
            $table->timestamps();
        });
        Schema::table('lunchs', function($table) {
            $table->timestamps();
        });
        Schema::table('l_items', function($table) {
            $table->timestamps();
        });
        Schema::table('l_displays', function($table) {
            $table->timestamps();
        });
        Schema::table('updates', function($table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ippins', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('rolls', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('courses', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('c_items', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('c_add_on_items', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('c_omakases', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('lunchs', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('l_items', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('l_displays', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('updates', function($table) {
            $table->dropTimestamps();
        });
    }
}
