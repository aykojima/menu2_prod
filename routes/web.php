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
    Route::get('/', 'sb_controller@main')->name('main');
    Route::get('/login', 'HomeController@index')->name('login');

    Route::middleware('auth')->group( function(){
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
        Route::post('/ippin/delete', 'ippin_controller@delete')->name('delete_course_item');
        
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
        Route::post('/course/save_order', 'course_controller@save_order')->name('save_order');

        //lunch
        Route::get('/lunch', 'lunch_controller@show')->name('lunch');
        Route::post('/lunch', 'lunch_controller@add_new')->name('lunch_add_new');
        Route::get('/lunch/edit/{lunch_id}', 'lunch_controller@show_edit_form')->name('lunch_edit');
        Route::post('/lunch/edit/{lunch_id}', 'lunch_controller@edit_menu')->name('lunch_edit_submit');
        Route::get('/lunch/delete/{lunch_id}', 'lunch_controller@delete')->name('lunch_delete');
        Route::post('/lunch/save_order', 'lunch_controller@save_order')->name('lunch_save_order');

        //Cocktails and beer
        Route::get('/cocktail', 'cocktail_controller@show')->name('cocktail');
        Route::post('/cocktail', 'cocktail_controller@add_new')->name('cocktail_add_new');
        Route::get('/cocktail/edit', 'cocktail_controller@show_edit_form')->name('cocktail_edit');
        Route::post('/cocktail/edit', 'cocktail_controller@edit_menu')->name('cocktail_edit_submit');

        //Sake
        Route::get('/sake', 'sake_controller@show')->name('sake');
        Route::post('/sake', 'sake_controller@add_new')->name('sake_add_new');
        Route::get('/sake/edit', 'sake_controller@show_edit_form')->name('sake_edit');
        Route::post('/sake/edit', 'sake_controller@edit_menu')->name('sake_edit_submit');
        // Route::post('/sake/delete', 'sake_controller@delete')->name('delete');
        
        //Wine
        Route::get('/wine', 'wine_controller@show')->name('wine');
        Route::post('/wine', 'wine_controller@add_new')->name('wine_add_new');
        Route::get('/wine/edit', 'wine_controller@show_edit_form')->name('wine_edit');
        Route::post('/wine/edit', 'wine_controller@edit_menu')->name('wine_edit_submit');
        
        //Shochu
        Route::get('/shochu', 'shochu_controller@show')->name('shochu');
        Route::post('/shochu', 'shochu_controller@add_new')->name('shochu_add_new');
        //Route::get('/shochu/edit', 'shochu_controller@show_edit_form')->name('shochu_edit');
        Route::post('/shochu/edit', 'shochu_controller@edit_menu')->name('shochu_edit_submit');

        //Happey hour and Current Specials
        Route::get('/special', 'special_controller@show')->name('special');
        Route::post('/special', 'special_controller@add_new')->name('special_add_new');
        Route::get('/special/edit', 'special_controller@show_edit_form')->name('special_edit');
        Route::post('/special/edit', 'special_controller@edit_menu')->name('special_edit_submit');

        //print preview
        Route::get('/drinks/print', 'drink_view_controller@print')->name('print');

    });

 Route::middleware('auth')->group( function(){
    
});

Auth::routes();

Route::get('/generate/password', function(){ return bcrypt('goriki'); });
 

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
