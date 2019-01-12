<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\bottle as bottle;
use Illuminate\Support\Facades\DB;

class cocktail_controller extends Controller
{
    public function show() 
    { 

        $titles = [8, 9, 10]; //titles for wine
        $categories = category::whereBetween('title_id', [8, 10])->select('category_id')->get();
        $category_array = [];


        foreach($categories as $category){
            // $products = [];
            $products = product::leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->where('products.category_id', $category->category_id)
                ->leftJoin('page_titles', 'page_titles.title_id', '=', 'categories.title_id')
                ->orderByRaw('CHAR_LENGTH(price)')
                ->orderBy('price')
                ->get();
        
            array_push($category_array, $products);
        }//end of foreach

        return view('drink_menu/cocktails', compact('category_array', 'titles'));

    }

    public function add_new(Request $request) 
    {   
        $input = $request->all();
        $new_product['name'] = ucfirst($input['name']);
        $new_product['price'] = $input['price']; 
        $new_product['description'] = $input['description'];
        $new_product['category_id'] = $input['category_id'];
        //$data = $this->validate_form($input);

        $product = product::create($new_product);

        $new_item = $new_product['name'] . " was successfully created!";
        return redirect('cocktail')->with('status', $new_item );
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
            case 'Save': 
                $input = $request->all();
                $edit_product['name'] = $input['name'];
                $edit_product['price'] = $input['price']; 
                $edit_product['description'] = $input['description'];
                //$data = $this->validate_form($input);

                $product->update($edit_product);
                
                $edited_item = $input['name'] . " was successfully edited!";
                return redirect('cocktail')->with('status', $edited_item );
            break;
            case 'Delete':
                $product->delete();
                $edited_item = $input['name'] . " was deleted!";
                return redirect('cocktail')->with('status', $edited_item );
            break;
        }
    }
}
