<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\bottle as bottle;
use Illuminate\Support\Facades\DB;

class shochu_controller extends Controller
{
    public function show() 
    { 
        $types = array("Mugi", "Kome", "Imo", "Ume",
                        "Suntory", "Yamazaki", "Hakushu", "Nikka", "Mars", "Akashi", "Ichiro", "Ohishi", "Fukano");
        
        function write_query($types){
            foreach($types as $key=>$type){
                if($key == 0){
                    $query = "CASE WHEN name LIKE '%" . $type . "%' THEN 1 ";
                }else{
                    $order_number = $key + 1;
                    $query .= "WHEN name LIKE '%" . $type ."%' THEN " . $order_number . " ";
                }
            }
            return $query .= "ELSE 0 END ASC";
        }

        $query = write_query($types);

        $titles = [5, 6, 7]; //titles for shochu, Japanese Whisky and Spirits
        $categories = category::whereBetween('title_id', [5, 7])->select('category_id')->get();
        $category_array = [];
        
        foreach($categories as $category){
            // $products = [];
            $products = product::leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->where('products.category_id', $category->category_id)
                ->leftJoin('page_titles', 'page_titles.title_id', '=', 'categories.title_id')
                ->orderByRaw($query)
                ->orderByRaw('CHAR_LENGTH(price)')
                ->orderBy('price')
                ->get();
        
            array_push($category_array, $products);
        }//end of foreach

        return view('drink_menu/shochu', compact('category_array', 'titles'));
    }

    public function add_new(Request $request) 
    {   
        $input = $request->all();
        var_dump($input);
        $new_product['name'] = ucfirst($input['name']);
        $new_product['price'] = $input['price']; 
        $new_product['production_area'] = $input['production_area'];
        $new_product['description'] = $input['description'];
        $new_product['category_id'] = $input['category_id'];
        $new_product['description2'] = $input['description2'];
        //$data = $this->validate_form($input);

        $product = product::create($new_product);

        $new_item = $new_product['name'] . " was successfully created!";
        return redirect('shochu')->with('status', $new_item );
    }

    // public function show_edit_form(Request $request)
    // {
    //     if($request->ajax()){
    //         $product = product::findOrFail($request->product_id);
    //         return Response($product);
    //     }
        
    // }

    public function edit_menu(Request $request)
    {        
        // var_dump($request->all());
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
                //$data = $this->validate_form($input);
                // var_dump($edit_product);
                $product->update($edit_product);
                
                $edited_item = $input['name'] . " was successfully edited!";
                return redirect('shochu')->with('status', $edited_item );
            break;
            case 'Delete':
                $product->delete();
                $edited_item = $input['name'] . " was deleted!";
                return redirect('shochu')->with('status', $edited_item );
            break;
        }
    }
}

