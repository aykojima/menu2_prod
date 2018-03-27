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

    public function save_content(Request $request)
    {    
        if($request->ajax()){
    
            $model_name = '\\App\\Models\\'.$request->model;
            $model = new $model_name;
            //$model_name = $model->find($request->id)->update(array($request->column => $request->contents));
            // $model->delete();
            // sactivity('delete')->performedOn($model_name)->log('');
            // return "success";
            
            //dd($request->column);
            //$course_item = $request->model_name::findOrFail ( $request->course_id );
            // $model_name = $request->model;
            $course_item = $model::findOrFail ( $request->id );
            $new_contents = $request->contents;
            $course_item->{$request->column} = $new_contents;
            $course_item->save();
            // $input = $request->all();
            // $id = $request->model;
            // $data = $this->validate_form($input);
            // $ippin_item->update($data);
        return ($new_contents);
        
        }
    }
}
