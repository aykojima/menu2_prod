<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\sake as sake;
use App\Models\wine as wine;
use App\Models\bottle as bottle;
use App\Models\page_title as page_title;
use Illuminate\Support\Facades\DB;

class sake_controller extends Controller
{
    public function show() 
    { 
        $titles = [1, 2]; //titles for sake
        $categories = category::whereBetween('title_id', [1, 2])->select('category_id')->get();
        $category_array = [];
        
        foreach($categories as $category){
            // $products = [];
            $products = product::leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->where('products.category_id', $category->category_id)
                ->leftJoin('page_titles', 'page_titles.title_id', '=', 'categories.title_id')
                ->leftJoin('sakes', 'products.product_id', '=', 'sakes.product_id')
                ->leftJoin('bottles','sakes.sake_id', '=', 'bottles.sake_id')
                ->orderByRaw('CHAR_LENGTH(price)')
                ->orderBy('price')
                ->get();
        
            array_push($category_array, $products);
        }//end of foreach

        return view('drink_menu/sake', compact('category_array', 'titles'));
    }

    public function add_new(Request $request) 
    { 
        $input = $request->all();
        
        $category = category::findOrFail ( $request->category_id );
        
        if($category->category != strtoupper($input['category_name']))
        {
            $category->category = strtoupper($input['category_name']);
            $category->save();
        }

        if($category->category_description != $input['category_desc'])
        {
            $category->category_description = $input['category_desc'];
            $category->save();
        }
        
        if(!empty($input['name'])){
            $new_product['name'] = ucfirst($input['name']);
            $new_product['price'] = $input['price']; 
            $new_product['production_area'] = ucfirst($input['production_area']);
            $new_product['description'] = lcfirst($input['description']);
            $new_product['description2'] = lcfirst($input['description2']);
            $new_product['category_id'] = $input['category_id'];
            //$data = $this->validate_form($input);
            
            
            $product = product::create($new_product);

            if($new_product['category_id'] != 38)
            {
                $new_sake['rice'] = ucfirst($input['rice']);
                $new_sake['grade'] = ucfirst($input['grade']);

                if($input['sweetness'] == 'other')
                { $new_sake['sweetness'] = $input['sweetness_other']; }
                else { $new_sake['sweetness'] = $input['sweetness']; }

                $new_sake['product_id'] = $product->product_id;
                
                $sake = sake::create($new_sake);

                if($input['size_checkbox'] == "Size is not 720ml"
                    && $input['size'] != null)
                {
                    $new_bottle['size'] = $input['size'];
                    $new_bottle['second_price'] = $input['second_price'];
                    $new_bottle['sake_id'] = $sake->sake_id;

                    $bottle = bottle::create($new_bottle);
                }
            }
            
            $new_item = $new_product['name'] . " was successfully created!";
            return redirect('sake')->with('status', $new_item );
        }//end of if !empty($input['name'])

        $new_item = $input['category_name'] . " was successfully edited!"; 
        return redirect('sake')->with('status', $new_item );
    }

    public function show_edit_form(Request $request)
    {
        if($request->ajax()){
            $product = product::findOrFail($request->product_id);
            if($product->sake)
            {
                $sake = $product->sake;      
                if($product->sake->bottle)
                {
                    $bottle = $product->sake->bottle;
                    return Response(compact('product', 'sake', 'bottle'));
                }          
                return Response(compact('product', 'sake'));
            }
            return Response(compact('product'));
        }
        
    }

    public function edit_menu(Request $request)
    {        

        $product = product::findOrFail ( $request->product_id );
        $input = $request->all();
        switch($request->submit) {
            case 'Update': 
                $input = $request->all();
                // var_dump($input);
                $edit_product['name'] = $input['name'];
                $edit_product['price'] = $input['price']; 
                $edit_product['production_area'] = $input['production_area'];
                $edit_product['description'] = $input['description'];
                $edit_product['description2'] = $input['description2'];
                //$edit_product['category_id'] = $input['category_id'];
                //$data = $this->validate_form($input);

                $product->update($edit_product);
                if($request->product_id != 38)
                {
                    $edit_sake['rice'] = $input['rice'];
                    $edit_sake['grade'] = $input['grade'];

                    if($input['sweetness'] == 'other')
                    { $edit_sake['sweetness'] = $input['sweetness_other']; }
                    else { $edit_sake['sweetness'] = $input['sweetness']; }

                    if($product->sake){
                        $sake = sake::findOrFail ( $product->sake->sake_id );
                        $sake->update($edit_sake);

                    }else
                    {
                        $edit_sake['product_id'] = $product->product_id;
                        $sake = sake::create($edit_sake);
                    }

                    if($input['size_checkbox'] == "Size is not 720ml"
                        && $input['size'] != null){
                        $edit_bottle['size'] = $input['size'];
                        $edit_bottle['second_price'] = $input['second_price'];
                        if($sake->bottle){
                            $bottle = bottle::findOrFail ( $sake->bottle->bottle_id );
                            $bottle->update($edit_bottle);
                        }else
                        {
                            $edit_bottle['sake_id'] = $sake->sake_id;
                            bottle::create($edit_bottle);
                        }
                    }else if(
                        ($sake->bottle && $input['size_checkbox'] == "720ml" && $sake->bottle)
                            || ($sake->bottle && $input['size_checkbox'] == "Size is not 720ml"
                            && $input['size'] == null)){
                        $bottle = bottle::findOrFail ( $sake->bottle->bottle_id );
                        $bottle->delete();
                    }
                }//end of if(category_id !=38)
                $edited_item = $input['name'] . " was successfully edited!";
                return redirect('sake')->with('status', $edited_item );
            break;
            case 'Delete':
                $product->delete();
                $edited_item = $input['name'] . " was deleted!";
                return redirect('sake')->with('status', $edited_item );
            break;
            
        }
    }

    public function delete(Request $request)
    {
        $input = $request->all();
        dd($input['product_id']);
    }

}

