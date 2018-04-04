<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Collection;
use App\Models\course as course;
use App\Models\c_add_on_item as c_add_on_item;
use App\Models\c_item as c_item;
use App\Models\c_omakase as c_omakase;

class course_controller extends Controller
{
    public function show()
    { 
        $courses = course::all();
        return view('food_menu/courses', compact('courses'));
    }

    public function add_new(Request $request)
    {
        $course = new course;
        $c_add_on_item = new c_add_on_item;
        $c_item = new c_item;
        
        if( $request->isMethod('post'))
        {
            $course->title = $request->title;
            $course->save();
            
            foreach($request->addon_description as $data_key=>$data_value)
            {
                $c_add_on_items[] = [
                    'description' => $data_value,
                     'price'  => $request->addon_price[$data_key],
                     'course_id' => $course->course_id
                ];
            }
            foreach($request->item_name as $data_key=>$data_value)
            {
                $c_items[] = [
                    'name' => $data_value,
                    'price'  => $request->item_price[$data_key],
                    'description'  => $request->item_description[$data_key],
                    'choice'  => $request->choice[$data_key],
                    'course_id' => $course->course_id
                ];
            }
            c_item::insert($c_items);
            c_add_on_item::insert($c_add_on_items);   
        }
        
        return redirect()->back();
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

    public function validate_form($input)
    {
        $courses = new course;
        $dataSet = [];
        foreach ($input as $each_data) {
            $dataSet[] = [
                $courses->title => $each_data->title,
                $courses->c_add_on_items->description => $each_data->addon_description,
                $courses->c_add_on_items->price => $each_data->addon_price,
                $courses->c_items->choice => $each_data->choice,
                $courses->c_items->name => $each_data->item_name,
                $courses->c_items->price => $each_data->item_price,
                $courses->c_items->description => $each_data->item_description
            ];
        }

        DB::table('extra')->insert($dataSet);        
        return $dataSet;
    }

}
