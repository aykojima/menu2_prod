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

        // $types_ordered = implode(',', $types);

        function write_query($types){
            foreach($types as $key=>$type){
                if($key == 0){
                    $query = "CASE WHEN type LIKE '%" . $type . "%' THEN 1 ";
                }else{
                    $order_number = $key + 1;
                    $query .= "WHEN type LIKE '%" . $type ."%' THEN " . $order_number . " ";
                }
            }
            return $query .= "ELSE 0 END ASC";
        }

        $query = write_query($types);
        //dd($query);
        
        $wine_glasses = product::leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
            ->whereBetween('category_id', [15, 24])
            // ->havingRaw(DB::raw($query))
            // ->orderByRaw(DB::raw("FIELD(type, $types_ordered)"))
            // ->select('*', DB::raw($query))
            // ->orderByRaw(DB::raw($query))
            ->orderByRaw($query)
            ->orderBy('price')
            ->get();

        // $wine_glasses = product::leftJoin('wines', 'wines.product_id', '=', 'products.product_id')
        //     ->whereBetween('category_id', [15, 24])
        //     ->orderBy('price')
        //     ->get();
        
    
        $categories = category::whereBetween('category_id', [15, 24])->get();

        return view('drink_menu/wine', compact('wine_glasses', 'categories'));
    }

    public function add_new(Request $request) 
    { 
        // if( $request->isMethod('post'))
        // {
        
        $input = $request->all();
        $new_product['name'] = $input['name'];
        $new_product['price'] = $input['price']; 
        $new_product['production_area'] = ucfirst($input['production_area']);
        $new_product['description'] = lcfirst($input['description']);
        $new_product['category_id'] = $input['category_id'];
        //$data = $this->validate_form($input);

        $product = product::create($new_product);

        $new_wine['type'] = ucfirst($input['type']);
        $new_wine['year'] = ucfirst($input['year']);
        // if($input['sweetness'] == 'other')
        // { $new_wine['sweetness'] = $input['sweetness_other']; }
        // else { $new_wine['sweetness'] = $input['sweetness']; }

        $new_wine['product_id'] = $product->product_id;
        
        $wine = wine::create($new_wine);

        if($input['size_checkbox'] == "Size is not 750ml")
        {
            $new_bottle['size'] = $input['size'];
            $new_bottle['second_price'] = $input['second_price'];
            $new_bottle['wine_id'] = $wine->wine_id;

            $bottle = bottle::create($new_bottle);
        }

        
        // }
        $new_item = $new_product['name'] . " was successfully created!";
        return redirect('wine')->with('status', $new_item );
    }

    public function show_edit_form(Request $request)
    {
        if($request->ajax()){
            $product = product::findOrFail($request->product_id);
            if($product->wine)
            {
                $product["type"] = $product->wine->type;
                $product["year"] = $product->wine->year;
            }
        
            return Response($product);
        }
        
    }

    public function edit_menu(Request $request)
    {        

        $product = product::findOrFail ( $request->product_id );
        $input = $request->all();
        switch($request->submit) {
            case 'Save': 
                $input = $request->all();
                $edit_product['name'] = $input['name'];
                $edit_product['price'] = $input['price']; 
                $edit_product['production_area'] = $input['production_area'];
                $edit_product['description'] = $input['description'];
                

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

                if($input['size_checkbox'] == "Size is not 750ml")
                {
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

    public function print()
    {
        $wine_glasses = product::orderBy('price')->get();
        $categories = category::all();

        return view('drink_menu/print_review', compact('wine_glasses', 'categories'));
    }

}
