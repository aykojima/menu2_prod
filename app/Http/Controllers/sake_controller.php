<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\sake as sake;
use Illuminate\Support\Facades\DB;

class sake_controller extends Controller
{
    public function show() 
    { 
        $sake_glasses = product::orderBy('price')->get();
        $categories = category::all();

        return view('drink_menu/sake', compact('sake_glasses', 'categories'));
    }

    public function add_new(Request $request) 
    { 
        // if( $request->isMethod('post'))
        // {
        $input = $request->all();
        $new_product['name'] = $input['name'];
        $new_product['price'] = $input['price']; 
        $new_product['production_area'] = $input['production_area'];
        $new_product['description'] = $input['description'];
        $new_product['category_id'] = $input['category_id'];
        //$data = $this->validate_form($input);

        $product = product::create($new_product);

        $new_sake['rice'] = $input['rice'];
        $new_sake['sweetness'] = $input['sweetness'];
        $new_sake['product_id'] = $product->product_id;
        
        sake::create($new_sake);
        // }
        $new_item = $input['name'] . " was successfully created!";
        return redirect('sake')->with('status', $new_item );
    }

    public function show_edit_form(Request $request)
    {
        if($request->ajax()){
            $product = product::findOrFail($request->product_id);
            if($product->sake)
            {
                $product["rice"] = $product->sake->rice;
                $product["sweetness"] = $product->sake->sweetness;
            }
                // }else
            // {
            //     $product["rice"] = null;
            //     $product["sweetness"] = null;
            // }
            return Response($product);
        }
        
    }

    public function edit_menu(Request $request)
    {        
        $product = product::findOrFail ( $request->product_id );
        
        $input = $request->all();
        $edit_product['name'] = $input['name'];
        $edit_product['price'] = $input['price']; 
        $edit_product['production_area'] = $input['production_area'];
        $edit_product['description'] = $input['description'];
        //$edit_product['category_id'] = $input['category_id'];
        //$data = $this->validate_form($input);

        $product->update($edit_product);

        $edit_sake['rice'] = $input['rice'];
        $edit_sake['sweetness'] = $input['sweetness'];
        //$edit_sake['product_id'] = $product->product_id;
        //$data = $this->validate_form($input);
        if($product->sake){
            $sake = sake::findOrFail ( $product->sake->sake_id );
            $sake->update($edit_sake);
        }else
        {
            $edit_sake['product_id'] = $product->product_id;
            sake::create($edit_sake);
        }
        $edited_item = $input['name'] . " was successfully edited!";
        return redirect('sake')->with('status', $edited_item );
    }

    public function delete(Request $request)
    {

    }
}
