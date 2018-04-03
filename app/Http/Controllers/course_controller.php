<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Collection;
use App\Models\course as course;
// use App\Models\c_add_on_item as c_add_on_item;

class course_controller extends Controller
{
    public function show()
    { 
        $courses = course::all();
        return view('food_menu/courses', compact('courses'));
    }

    public function add_new(Request $request)
    {
        dd($request->all());
    }

    public function save_content(Request $request)
    {    
        if($request->ajax()){
    
            $model_name = '\\App\\Models\\'.$request->model;
            $model = new $model_name;
            $course_item = $model::findOrFail ( $request->id );
            $new_contents = $request->contents;
            $course_item->{$request->column} = $new_contents;
            $course_item->save();
        
            return ($new_contents);
        
        }
    }
}
