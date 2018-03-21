<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\roll as roll;

class roll_controller extends Controller
{
    public function show()
    { 
        $SP_Rs = $this->generate_menu('SP_R');
        $Rs = $this->generate_menu('R');
        $VG_Rs = $this->generate_menu('VG_R');

        $num_items = roll::where('is_on_menu','=','Y')->count();
        
        return view('food_menu/rolls', compact('SP_Rs', 'Rs', 'VG_Rs', 'num_items'));
    }

    public function search(Request $request)
    {  
        if($request->ajax())
        { 
            $output="";    
            $roll_items = DB::table('rolls')->where('name','LIKE','%'.$request->search."%")->get();
         
            if($roll_items)
            {   
                $output.=
                    "<p id='new_item'>&#43; add</p>";
                foreach ($roll_items as $key => $roll_item) {    
                    $output.= "<p class='is_on_menu";
                    if($roll_item->is_on_menu == 'N')
                    {
                        $output .= "_not";
                    }
                    $output .= "' id='$roll_item->roll_id-searchkey' data-id='$roll_item->roll_id'>$roll_item->name</p>";
                    $output .= "<button id='$roll_item->roll_id-editkey' class='edit' data-id='$roll_item->roll_id'> edit</button>";
                }
            }
            
            return Response($output);
        }
    }

    public function update(Request $request)
    { 
        $roll_id = $request->item_id;
        $is_on_menu = DB::table('rolls')->where('roll_id', $roll_id)->value('is_on_menu');

        if($is_on_menu == 'Y')
        {

            DB::table('rolls')->where('roll_id', $roll_id)->update(['is_on_menu' => 'N']);

        }else
        {

            DB::table('rolls')->where('roll_id', $roll_id)->update(['is_on_menu' => 'Y']);

        }
        $SP_Rs = $this->generate_menu('SP_R');
        $Rs = $this->generate_menu('R');
        $VG_Rs = $this->generate_menu('VG_R');

        return Response([$SP_Rs, $Rs, $VG_Rs]);
        
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

    public function add_new(Request $request)
    { 
        $data = [];
        //if(Request::ajax())
        if( $request->isMethod('post'))
        {
            $input = $request->all();
            $data = $this->validate_form($input);
               
        }
        roll::create($data);
        return $this->show();
        
    }

    public function show_edit_form(Request $request)
    {
        if($request->ajax()){
            $roll_id = $request->roll_id;
            $roll = roll::findOrFail($roll_id);
            return Response($roll);
        }
        
    }

    public function edit_menu(Request $request)
    {        
        $roll_item = roll::findOrFail ( $request->roll_id );
        $input = $request->all();
        $data = $this->validate_form($input);
        $roll_item->update($data);
        return redirect('roll');
    }

    public function style_name($input)
    {
        $output = ucwords($input);
        $characters_to_lowercase = array('Belly', 'Grilled', 'Of');
        foreach($characters_to_lowercase as $character_to_lowercase)
        {
            if(strpos($output, $character_to_lowercase) == true)
            {
                $pos = strpos($output, $character_to_lowercase);
                $output = substr($output, 0, $pos-1) . strtolower(substr($output, $pos-1, 2))
                . substr($output, $pos+1);
            }
        }
        return $output;
    }

    public function validate_form($input)
    {
        $data = [];
        $data['name'] =  $input['name'];
        $data['description'] = $input['description'];
        $data['price'] = $input['price'];
        $data['is_sustainable'] = $input['is_sustainable'];
        $data['is_raw'] = $input['is_raw'];
        $data['is_gf'] = $input['is_gf'];
        $data['category'] = $input['category'];
        $data['is_special'] = $input['is_special'];
        $data['is_on_menu'] = $input['is_on_menu']; 
        
        return $data;
    }

}
