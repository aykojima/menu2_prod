<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\wine as wine;
use App\Models\bottle as bottle;
use Illuminate\Support\Facades\DB;

class wine_controller extends Controller
{
    public function show() 
    { 
        $types = array("Pinot Gris", "Txakoli", "Albarino", "Sauvignon Blanc",
                        "Carricante", "Chardonnay", "Chenin Blanc", "Viognier", 
                        "Riesling", "Gruner Veltliner",
                        "Pinot Noir", "Tempranillo", "Cab Franc", "Cabernet Sauvignon", "Malbec", "Zinfandel");

        function write_query($types){
            foreach($types as $key=>$type){
                if($key == 0){
                    $query = "CASE WHEN type LIKE '%" . $type . "%' THEN 1 ";
                }else{
                    $order_number = $key + 1;
                    $query .= "WHEN type LIKE '%" . $type ."%' THEN " . $order_number . " ";
                }
            }
            $order_number = $order_number + 1;
            return $query .= "ELSE " . $order_number . " END ASC";
        }

        $query = write_query($types);
        $titles = [3, 4]; //titles for wine
        $categories = category::whereBetween('title_id', [3, 4])->select('category_id')->get();
        $category_array = [];


        foreach($categories as $category){
            // $products = [];
            $products = product::leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->where('products.category_id', $category->category_id)
                ->leftJoin('page_titles', 'page_titles.title_id', '=', 'categories.title_id')
                ->leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
                ->leftJoin('bottles','wines.wine_id', '=', 'bottles.wine_id')
                ->orderByRaw($query)
                ->orderByRaw('CHAR_LENGTH(price)')
                ->orderBy('price')
                ->get();
        
            array_push($category_array, $products);
        }//end of foreach

        return view('drink_menu/wine', compact('category_array', 'titles'));

    
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
        $new_product['name'] = $input['name'];
        $new_product['price'] = $input['price']; 
        $new_product['production_area'] = ucfirst($input['production_area']);
        $new_product['description'] = lcfirst($input['description']);
        $new_product['description2'] = lcfirst($input['description2']);
        $new_product['category_id'] = $input['category_id'];
        //$data = $this->validate_form($input);

        $product = product::create($new_product);

        $new_wine['type'] = ucfirst($input['type']);
        $new_wine['year'] = $input['year'];

        $new_wine['product_id'] = $product->product_id;
        
        $wine = wine::create($new_wine);

        if($input['size_checkbox'] == "Size is not 750ml"
            && $input['size'] != null)
        {
            $new_bottle['size'] = $input['size'];
            $new_bottle['second_price'] = $input['second_price'];
            $new_bottle['wine_id'] = $wine->wine_id;

            $bottle = bottle::create($new_bottle);
        }

        $new_item = $new_product['name'] . " was successfully created!";
        return redirect('wine')->with('status', $new_item );
    }//end of if !empty($input['name'])
    
        $new_item = $input['category_name'] . " was successfully edited!"; 
        return redirect('wine')->with('status', $new_item );
    }

    public function show_edit_form(Request $request)
    {
        if($request->ajax()){
            $product = product::findOrFail($request->product_id);
            if($product->wine)
            {
                $wine = $product->wine;
                
                if($product->wine->bottle)
                {
                    $bottle = $product->wine->bottle;
                    return Response(compact('product', 'wine', 'bottle'));
                }

                return Response(compact('product', 'wine'));
            
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
                $edit_product['name'] = $input['name'];
                $edit_product['price'] = $input['price']; 
                $edit_product['production_area'] = $input['production_area'];
                $edit_product['description'] = $input['description'];
                $edit_product['description2'] = $input['description2'];
                
                $product->update($edit_product);

                $edit_wine['type'] = $input['type'];
                $edit_wine['year'] = $input['year'];

                if($product->wine){
                    $wine = wine::findOrFail ( $product->wine->wine_id );
                    $wine->update($edit_wine);

                }else
                {
                    $edit_wine['product_id'] = $product->product_id;
                    $wine = wine::create($edit_wine);
                }

                if($input['size_checkbox'] == "Size is not 750ml"
                    && $input['size'] != null){
                    $edit_bottle['size'] = $input['size'];
                    $edit_bottle['second_price'] = $input['second_price'];
                    
                    if($wine->bottle){
                        $bottle = bottle::findOrFail ( $wine->bottle->bottle_id );
                        $bottle->update($edit_bottle);
                    }else
                    {
                        $edit_bottle['wine_id'] = $wine->wine_id;
                        bottle::create($edit_bottle);
                    }    
                }else if(
                    ($wine->bottle && $input['size_checkbox'] == "750ml" && $wine->bottle)
                    || ($wine->bottle && $input['size_checkbox'] == "Size is not 750ml"
                    && $input['size'] == null)){
                        $bottle = bottle::findOrFail ( $wine->bottle->bottle_id );
                        $bottle->delete();
                }
                
                $edited_item = $input['name'] . " was successfully edited!";
                return redirect('wine')->with('status', $edited_item );
            break;
            case 'Delete':
                $product->delete();
                $edited_item = $input['name'] . " was deleted!";
                return redirect('wine')->with('status', $edited_item );
            break;
        
        }
    }

    // public function print()
    // {
    //     $wine_glasses = product::orderBy('price')->get();
    //     $categories = category::all();

    //     return view('drink_menu/print_review', compact('wine_glasses', 'categories'));
    // }

}
