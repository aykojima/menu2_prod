<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lunch as lunch;
use App\Models\l_item as l_item;

class lunch_controller extends Controller
{
    public function show() 
    { 
        // $lunches = lunch::orderBy("list_order")->get();
        $lunches = lunch::all();
        //dd($lunches);
        return view('food_menu/lunch', compact('lunches'));
    }

    public function add_new(Request $request)
    {
        $lunch = new lunch;
        $l_item = new l_item;
        
        if( $request->isMethod('post'))
        {
            $lunch->title = $request->title;
            $lunch->subtitle = $request->subtitle;
            $lunch->combo_title = $request->combo_title;
            $lunch->combo_desc = $request->combo_desc;
            $lunch->save();
            
            foreach($request->item_name as $data_key=>$data_value)
            {
                $l_items[] = [
                    'name' => $data_value,
                     'price'  => $request->item_price[$data_key],
                     'description'  => $request->item_description[$data_key],
                     'is_raw' => $request->is_raw[$data_key],
                     'lunch_id' => $lunch->lunch_id
                ];
            }
            // foreach($request->item_name as $data_key=>$data_value)
            // {
            //     $c_items[] = [
            //         'name' => $data_value,
            //         'price'  => $request->item_price[$data_key],
            //         'description'  => $request->item_description[$data_key],
            //         'choice'  => $request->choice[$data_key],
            //         'lunch_id' => $lunch->lunch_id
            //     ];
            // }
            l_item::insert($l_items);
            //c_add_on_item::insert($c_add_on_items);   
        }
        
        return redirect()->back();
    }

    public function show_edit_form($lunch_id)
    {
        $lunch = lunch::findOrFail($lunch_id);
        
        return view('layouts.forms.form_lunch', [
            'lunch_id' => $lunch_id,
            'lunch' => $lunch
            ]);
        
    }

    public function edit_menu(Request $request, $lunch_id)
    {        
        $lunch_item = lunch::findOrFail ( $lunch_id );
        $lunch_item->title = ucfirst($request->edit_title);
        $lunch_item->subtitle = ucfirst($request->edit_subtitle);
        $lunch_item->combo_title = ucfirst($request->edit_combo_title);
        $lunch_item->combo_desc = trim(ucfirst($request->edit_combo_desc));

        $lunch_item->save();

        //Check if there are new fields to save.
        //If there are, save
        if($request->item_name)
        {
            $is_raw =$request->is_raw;
            if(array_key_exists(0, $request->is_raw) == false)
            {//In case choice array doesn't start with array key = 0
                $new_array = [];
                foreach($is_raw as $data_value)
                {
                    array_push($new_array, $data_value);
                }
                $is_raw = $new_array;
            }
            foreach($request->item_name as $data_key=>$data_value)
            {
                $l_items[] = [
                    'name' => $data_value,
                    'price'  => $this->validate_price($request->item_price[$data_key]),
                    'description'  => trim($request->item_description[$data_key]),
                    'is_raw'  => $is_raw[$data_key],
                    'lunch_id' => $request->lunch_id
                ];
            }
            l_item::insert($l_items);
        }
        if($request->edit_l_item_id)
        {
            foreach($request->edit_l_item_id as $data_key=>$data_value)
            {
                if($request->edit_item_name[$data_key] == null &
                   $request->edit_item_price[$data_key] == null)
                {
                    DB::table('l_items')
                    ->where('l_item_id', $data_value)
                    ->delete();
                }
                else{
                    DB::table('l_items')
                    ->where('l_item_id', $data_value)
                    ->update([
                        'name' => $request->edit_item_name[$data_key],
                        'price'  => $this->validate_price($request->edit_item_price[$data_key]),
                        'description' => trim($request->edit_item_description[$data_key]),
                        'is_raw'  => $request->edit_is_raw[$data_key],    
                        'lunch_id' => $request->lunch_id
                    ]); 
                }
            }
        } 
        $message = $lunch_item->title . ' was edited successfully!';
        return redirect('lunch')->with('status', $message);
    }

    public function delete($lunch_id)
    {
        $lunch = lunch::findOrFail ( $lunch_id );
        $lunch->delete();

        return redirect('lunch');

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

    public function validate_price($input)
    {
        if(is_numeric($input) == false)
        {
            return null;
        }else{
            return $input;
        }
    }

    public function save_order(Request $request)
    {
        dd($request->new_order);
    }

}