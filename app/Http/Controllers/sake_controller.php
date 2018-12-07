<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\sake as sake;
use App\Models\wine as wine;
use App\Models\bottle as bottle;
use Illuminate\Support\Facades\DB;

class sake_controller extends Controller
{
    public function show() 
    { 
        $sake_glasses = product::orderBy('price')->where('category_id', '<', '15')->get();
        $categories = category::all()->where('category_id', '<', '15');
        $seasonal_sakes = category::where('category_id', '=', '38')->get();
        // dd($seasonal_sakes);
        $flights = product::where('category_id', '=', '38')->get();

        return view('drink_menu/sake', compact('sake_glasses', 'categories', 'seasonal_sakes', 'flights'));
    }

    public function add_new(Request $request) 
    { 
        $input = $request->all();
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

    public function print()
    {
        $categories = category::all();
        //$categories = category::whereBetween('category_id', [28, 32])->get();



        $shochu_types = array("Mugi", "Kome", "Imo", "Ume");

        $whisky_types = array("Suntory", "Hibiki", "Yamazaki", "Hakushu", "Nikka", "Mars", "Akashi", "Ichiro", "Ohishi", "Fukano");


        $white_types = array("Pinot Gris", "Txakoli", "Albarino", "Sauvignon Blanc",
                        "Carricante", "Chardonnay", "Chenin Blanc", "Viognier", 
                        "Riesling", "Gruner Veltliner");

        $red_types = array("Pinot Noir", "Tempranillo", "Cab Franc", 
                        "Cabernet Sauvignon", "Malbec", "Zinfandel");

        function write_query($types, $column){
            foreach($types as $key=>$type){
                if($key == 0){
                    $query = "CASE WHEN $column LIKE '%" . $type . "%' THEN 1 ";
                }else{
                    $order_number = $key + 1;
                    $query .= "WHEN $column LIKE '%" . $type ."%' THEN " . $order_number . " ";
                }
            }
            $order_number = $order_number + 1;
            return $query .= "ELSE " . $order_number . " END ASC";
        }

        $query_shochu = write_query($shochu_types, 'name');

        // dd($query_shochu);
        $query_whisky = write_query($whisky_types, 'name');
        $query_white = write_query($white_types, 'type');
        $query_red = write_query($red_types, 'type');

        $shochus = product::where('category_id', 25)
            ->orderByRaw($query_shochu)
            ->orderBy('price')
            ->get();

        $spirits = product::whereBetween('category_id', [28, 32])->orderBy('price')->get();

        $sake_glasses = product::whereBetween('category_id', [1, 6])->orderBy('price')->get();

        $flights = product::where('category_id', '=', '38')->get();

        $sake_bottle2s = product::whereBetween('category_id', [9, 14])->orderBy('price')->get();

        $sake_bottles = product::whereBetween('category_id', [7, 8])->orderBy('price')->get();

        $whiskies = product::where('category_id', 26)
            ->orderByRaw($query_whisky)
            ->orderBy('price')
            ->get();

        $wine_glasses = product::whereBetween('category_id', [15, 20])
            ->orderBy('price')
            ->get();
        
        $sparklings = product::leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
            ->where('category_id', 21)
            ->orderBy('price')
            ->get();

        $whites = product::leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
            ->where('category_id', 22)
            ->orderByRaw($query_white)
            ->orderBy('price')
            ->get();
        
        $rose_and_reds = product::leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
        ->whereBetween('category_id', [23, 24])
        ->orderByRaw($query_red)
        ->orderBy('price')
        ->get();

        return view('drink_menu/print_review', compact('categories', 'shochus', 'spirits', 'sake_glasses', 'flights',
            'rose_and_reds', 'sake_bottle2s', 'sake_bottles', 'whiskies', 'wine_glasses', 'sparklings', 'whites'));
    }
}

