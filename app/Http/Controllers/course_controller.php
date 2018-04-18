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
            $course->price = $request->course_price;
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

    public function show_edit_form($course_id)
    {
        //if($request->ajax()){
            //$course_id = $request->course_id;
            // return response()->json(['course' => $course]);
            // return response()->json([
            //     'course' => $course, 
            //     'c_add_on_items' => $course->c_add_on_items->all(), 
            //     'c_items' => $course->c_items->all()
            //     ]);
        //}

        $course = course::findOrFail($course_id);
        
        return view('food_menu.form_course_edit2', [
            'course_id' => $course_id,
            'course' => $course, 
            // 'c_add_on_items' => $course->c_add_on_items->all(), 
            // 'c_items' => $course->c_items->all()
            ]);
        
    }

    public function edit_menu(Request $request, $course_id)
    {        
        $course_item = course::findOrFail ( $course_id );
        
        $course_item->title = $request->edit_title;
        $course_item->price = $request->edit_course_price;
        $course_item->save();
        //Check if there are new fields to save.
        //If there are, save
        if($request->addon_description)
        {
            $c_add_on_item = new c_add_on_item;
            foreach($request->addon_description as $data_key=>$data_value)
            {
                $c_add_on_items[] = [
                    'description' => $data_value,
                     'price'  => $request->addon_price[$data_key],
                     'course_id' => $request->course_id
                ];
            }
            c_add_on_item::insert($c_add_on_items);   
        }

        if($request->item_description)
        {
            $choice =$request->choice;
            if(array_key_exists(0, $request->choice) == false)
            {//In case choice array doesn't start with array key = 0
                $new_array = [];
                foreach($choice as $data_value)
                {
                    array_push($new_array, $data_value);
                }
                $choice = $new_array;
            }
            foreach($request->item_name as $data_key=>$data_value)
            {
                $c_items[] = [
                    'name' => $data_value,
                    'price'  => $request->item_price[$data_key],
                    'description'  => $request->item_description[$data_key],
                    'choice'  => $choice[$data_key],
                    'course_id' => $request->course_id
                ];
            }
            c_item::insert($c_items);
        }
        if($request->edit_c_add_on_id)
        {
            foreach($request->edit_c_add_on_id as $data_key=>$data_value)
            {
                DB::table('c_add_on_items')
                ->where('c_add_on_id', $data_value)
                ->update([
                    'description' => $request->edit_addon_description[$data_key],
                        'price'  => $request->edit_addon_price[$data_key],
                        'course_id' => $request->course_id
                ]); 
            }
        }
        if($request->edit_c_item_id)
        {
            foreach($request->edit_c_item_id as $data_key=>$data_value)
            {
                DB::table('c_items')
                ->where('c_item_id', $data_value)
                ->update([
                    'name' => $request->edit_item_name[$data_key],
                    'price'  => $request->edit_item_price[$data_key],
                    'description'  => $request->edit_item_description[$data_key],
                    'choice'  => $request->edit_choice[$data_key],
                    'course_id' => $request->course_id
                ]);
            }
        }    
        // $input = $request->all();
        // $data = $this->validate_form($input);
        // $course_item->update($data);
        return redirect('course');
    }

    public function delete($course_id)
    {
        $course = course::findOrFail ( $course_id );
        $course->delete();

        return redirect('course');

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
