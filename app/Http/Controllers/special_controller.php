<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\bottle as bottle;
use Illuminate\Support\Facades\DB;

class special_controller extends Controller
{
    public function show() 
    { 
        $drinks = product::orderBy('price')->whereBetween('category_id', [39, 44])->get();
        $categories = category::whereBetween('category_id', [39, 44])->get();

        return view('drink_menu/specials', compact('drinks', 'categories'));
    }

    public function add_new(Request $request) 
    {   
        $input = $request->all();
        $new_product['name'] = ucfirst($input['name']);
        $new_product['price'] = $input['price']; 
        $new_product['description'] = $input['description'];
        $new_product['production_area'] = $input['production_area'];
        $new_product['category_id'] = $input['category_id'];
        //$data = $this->validate_form($input);

        $product = product::create($new_product);

        $new_item = $new_product['name'] . " was successfully created!";
        return redirect('special')->with('status', $new_item );
    }

    public function show_edit_form(Request $request)
    {
        if($request->ajax()){
            $product = product::findOrFail($request->product_id);
            return Response($product);
        }
        
    }

    public function edit_menu(Request $request)
    {        

        $product = product::findOrFail ( $request->product_id );
        $input = $request->all();
        switch($request->submit) {
            case 'Update': 
                $input = $request->all();
                $edit_product['name'] = $input['name'];
                $edit_product['price'] = $input['price']; 
                $edit_product['production_area'] = $input['production_area'];
                $edit_product['description'] = $input['description'];
                //$data = $this->validate_form($input);

                $product->update($edit_product);
                
                $edited_item = $input['name'] . " was successfully edited!";
                return redirect('special')->with('status', $edited_item );
            break;
            case 'Delete':
                $product->delete();
                $edited_item = $input['name'] . " was deleted!";
                return redirect('special')->with('status', $edited_item );
            break;
        }
    }
}
