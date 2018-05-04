<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', 'sb_controller@main')->name('home');
    //sushi bar pages
    Route::get('/sb', 'sb_controller@show')->name('sb');
    Route::post('/sb', 'sb_controller@add_new')->name('add_new');
    Route::get('/sb/search', 'sb_controller@search')->name('search');
    Route::get('/sb/update', 'sb_controller@update')->name('update');
    Route::get('/sb/edit', 'sb_controller@show_edit_form')->name('edit');
    Route::post('/sb/edit', 'sb_controller@edit_menu')->name('edit_submit');
    

    //ippin
    Route::get('/ippin', 'ippin_controller@show')->name('ippin');
    Route::post('/ippin', 'ippin_controller@add_new')->name('ippin_add_new');
    Route::get('/ippin/search', 'ippin_controller@search')->name('ippin_search');
    Route::get('/ippin/update', 'ippin_controller@update')->name('ippin_update');
    Route::get('/ippin/edit', 'ippin_controller@show_edit_form')->name('ippin_edit');
    Route::post('/ippin/edit', 'ippin_controller@edit_menu')->name('ippin_edit_submit');
    
    //roll
    Route::get('/roll', 'roll_controller@show')->name('roll');
    Route::post('/roll', 'roll_controller@add_new')->name('roll_add_new');
    Route::get('/roll/search', 'roll_controller@search')->name('roll_search');
    Route::get('/roll/update', 'roll_controller@update')->name('roll_update');
    Route::get('/roll/edit', 'roll_controller@show_edit_form')->name('roll_edit');
    Route::post('/roll/edit', 'roll_controller@edit_menu')->name('roll_edit_submit');

    //course
    Route::get('/course', 'course_controller@show')->name('course');
    //Route::post('/course/edit', 'course_controller@save_content')->name('save_content');
    Route::post('/course', 'course_controller@add_new')->name('course_add_new');
    Route::get('/course/edit/{course_id}', 'course_controller@show_edit_form')->name('course_edit');
    Route::post('/course/edit/{course_id}', 'course_controller@edit_menu')->name('course_edit_submit');
    Route::get('/course/delete/{course_id}', 'course_controller@delete')->name('delete');

    //test
    Route::get('/test', 'course_controller@show')->name('test');
    Route::post('/create', 'sb_controller@store')->name('store');
    Route::get('/test_show', 'sb_controller@test_show')->name('test_show');
    

 Route::middleware('auth')->group( function(){
    
});

Auth::routes();

Route::get('/generate/password', function(){ return bcrypt('goriki'); });
 
