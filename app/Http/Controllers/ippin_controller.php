<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ippin as ippin;

class ippin_controller extends Controller
{

    public function show()
    { 
        $APs = $this->generate_menu('AP');
        $TMs = $this->generate_menu('TM');
        $FSs = $this->generate_menu('FS');
        $MTs = $this->generate_menu('MT');

        $num_items = ippin::where('is_on_menu','=','Y')->count();
        
        //return view('food_menu/ippins', ['APs' => $APs], ['TMs' => $TMs], ['FSs' => $FSs],['MTs' => $MTs],['num_items' => $num_items]);
        return view('food_menu/ippins', compact('APs', 'TMs', 'FSs', 'MTs', 'num_items'));
    }

    public function search(Request $request)
    {  
        if($request->ajax())
        { 
            $output="";    
            $ippin_items = DB::table('ippins')->where('name','LIKE','%'.$request->search."%")->get();
         
            if($ippin_items)
            {   
                $output.=
                    "<p id='new_item'>&#43; add</p>";
                foreach ($ippin_items as $key => $ippin_item) {    
                    $output.= "<p class='is_on_menu";
                    if($ippin_item->is_on_menu == 'N')
                    {
                        $output .= "_not";
                    }
                    $output .= "' id='$ippin_item->ippin_id-searchkey' data-id='$ippin_item->ippin_id'>$ippin_item->name</p>";
                    $output .= "<button id='$ippin_item->ippin_id-editkey' class='edit' data-id='$ippin_item->ippin_id'> edit</button>";
                }
            }
            
            return Response($output);
        }
    }

    public function update(Request $request)
    { 
        $ippin_id = $request->item_id;
        $is_on_menu = DB::table('ippins')->where('ippin_id', $ippin_id)->value('is_on_menu');

        if($is_on_menu == 'Y')
        {

            DB::table('ippins')->where('ippin_id', $ippin_id)->update(['is_on_menu' => 'N']);

        }else
        {

            DB::table('ippins')->where('ippin_id', $ippin_id)->update(['is_on_menu' => 'Y']);

        }
        $APs = $this->generate_menu('AP');
        $TMs = $this->generate_menu('TM');
        $FSs = $this->generate_menu('FS');
        $MTs = $this->generate_menu('MT');

        return Response([$APs, $TMs, $FSs, $MTs]);
        
    }

    public function generate_menu($category='AP')
    { 
        ${$category . 's'} = DB::table('ippins')->where('category', $category)->where('is_on_menu', 'Y')->get();

        $output = [];
        foreach (${$category . 's'} as $category) {
            $item = '';
            $item .="<li id='$category->ippin_id' class='sortable'><div class='gf'";
            if($category->is_sustainable == 'Y')
            {
                $item .="data-sust='sustainable'";
            }
            $item .=">";
            if($category->is_gf == 'Y')
            {
                $item .= "GF";
            }

            $item .="</div>";

            $item .="<div class='ippin_menu'>$category->name / $category->price</div></li>";

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
        ippin::create($data);
        return $this->show();
        
    }

    public function show_edit_form(Request $request)
    {
        if($request->ajax()){
            $ippin_id = $request->ippin_id;
            $ippin = ippin::findOrFail($ippin_id);
            return Response($ippin);
        }
        
    }

    public function edit_menu(Request $request)
    {        
        $ippin_item = ippin::findOrFail ( $request->ippin_id );
        $input = $request->all();
        $data = $this->validate_form($input);
        $ippin_item->update($data);
        return redirect('ippin');
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
        $data['price'] = $input['price'];
        $data['is_sustainable'] = $input['is_sustainable'];
        $data['is_raw'] = $input['is_raw'];
        $data['is_gf'] = $input['is_gf'];
        $data['category'] = $input['category'];
        $data['is_special'] = $input['is_special'];
        $data['is_on_menu'] = $input['is_on_menu']; 
        
        return $data;
    }




    // Test pages
    public function create()
    {   
        return view('food_menu/create');
    }

    public function store(Request $request)
    {
        $data = [];
        //if(Request::ajax())
        if( $request->isMethod('post'))
        {
            $input = $request->all();
            $data = $this->validate_form($input);
               
        }

        //dd($request->all());
        $input = $request->all();
        $data = $this->validate_form($input);    
    
        ippin::create($data);
    
        // Session::flash('flash_message', 'New item successfully added!');
    
        return redirect()->back();
    }


    public function test_show()
    {
        $ippins = ippin::all();
        return view('food_menu.index', ['ippins' => $ippins]);
    }

    // public function edit(Request $request)
    // {
    //     if($request->ajax()){
    //         $sb_id = $request->sb_id;
    //         $sbs = sb::findOrFail($sb_id);
    //         //return Response($sbs);
    //         return view('food_menu.edit', ['sbs' => $sbs]);
    //     }
    // }

}
