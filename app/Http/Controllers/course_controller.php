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
        // $post = App\Post::find(1);
        //$SP_Rs = $this->generate_menu('SP_R');
        //$courses = DB::table('courses')->get();
        //$courses = $course->get();
        //$c_add_on_items = $course::find(1)->c_add_on_items();
        $courses = course::all();
        //$courses = course::find(1);
        //dd($courses);
        //$c_add_on_items = course::with('c_add_on_item')->get();
        //$comments = App\Post::find(1)->comments;
        //$num_items = roll::where('is_on_menu','=','Y')->count();
        
        return view('food_menu/courses', compact('courses'));
    }

    public function generate_menu($category='SP_R')
    { 
        ${$category . 's'} = DB::table('rolls')->where('category', $category)->where('is_on_menu', 'Y')->get();

        $output = [];
        foreach (${$category . 's'} as $category) {
            $item = '';
            $item .="<li id='$category->roll_id' class='sortable'><div class='gf'";
            if($category->is_sustainable == 'Y')
            {
                $item .="data-sust='sustainable'";
            }
            $item .=">";
            // if($category->is_gf == 'Y')
            // {
            //     $item .= "GF";
            // }

            $item .="</div>";

            $item .="<div class='roll_menu'>$category->name / $category->price</div>";
            $item .="<div class='roll_description'>$category->description</div></li>";

            array_push($output, $item);
        }
        
        return $output;
    }
}
