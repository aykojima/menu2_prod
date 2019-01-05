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

class drink_view_controller extends Controller
{
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
        $query_whisky = write_query($whisky_types, 'name');
        $query_white = write_query($white_types, 'type');
        $query_red = write_query($red_types, 'type');


//page 1 == 2 (Sake by the glass)
//page 2 == 3 (Sake bottles#1)
//page 3 == 8 (Sake bottles#2)
//page 4 == 5 (Wine by the glass && Wine bottles)
//page 5 == 6 (Wine bottles)
//page 6 == 7 (Japanse Whiskey)
//page 7 == 4 (Shochu and other spirits)
//page 8 == 1 (Blank)


        function get_products(){
            $page_array = [];
            //Get row count of category table
            $page_length = category::max('page_number');
            $title_length = page_title::all()->count();
            $category_length = category::all()->count();

            for($page_number = 1; $page_number <= $page_length; $page_number++){
                $category_array = [];
                $categories = category::where('page_number', $page_number)->get();
                foreach( $categories as $category ){
                    $product_array = [];
                    for($title_id = 1; $title_id <= $title_length; $title_id++){
                        if($category->title_id == $title_id){
                            $products = product::leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
                                ->where('products.category_id', $category->category_id)
                                // ->leftJoin('page_titles', 'page_titles.title_id', '=', 'categories.title_id')
                                ->leftJoin('sakes', 'products.product_id', '=', 'sakes.product_id')
                                ->leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
                                ->leftJoin('bottles', function ($join) {
                                    $join->on('wines.wine_id', '=', 'bottles.wine_id')
                                            ->orOn('sakes.sake_id', '=', 'bottles.sake_id');
                                })
                                // ->where('products.product_id', $id)
                                // if($category_id == 25)//shochu
                                // ->orderByRaw(write_query($shochu_types, 'name'))
                                ->orderByRaw('CHAR_LENGTH(price)')
                                ->orderBy('price')
                                ->get();

                                array_push($product_array, $products);
                            
                            }//end of if    
                         }//end of third for loop
                    array_push($category_array, $product_array);
                    
                }//end of foreach
                array_push($page_array, $category_array);
            }//end of first for loop
            return $page_array;
        }

        $page_array = get_products();
        $page_titles = page_title::all();
        // echo'<pre>';
        // dd($page_array);
        // echo'</pre>';
        return view('drink_menu/test_preview', compact('page_array', 'page_titles'));

        $sake_glasses = product::whereBetween('category_id', [1, 6])
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();
            
        $sake_bottles = product::whereBetween('category_id', [7, 8])
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();

        $sake_bottle2s = product::whereBetween('category_id', [9, 14])
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();

        $wine_glasses = product::whereBetween('category_id', [15, 20])
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();
        
        $sparklings = product::leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
            ->where('category_id', 21)
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();

        $whites = product::leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
            ->where('category_id', 22)
            ->orderByRaw($query_white)
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();
        
        $rose_and_reds = product::leftJoin('wines', 'products.product_id', '=', 'wines.product_id')
            ->whereBetween('category_id', [23, 24])
            ->orderByRaw($query_red)
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();

        $shochus = product::where('category_id', 25)
            ->orderByRaw($query_shochu)
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();

        $whiskies = product::where('category_id', 26)
            ->orderByRaw($query_whisky)
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();

        $spirits = product::whereBetween('category_id', [28, 32])
            ->orderByRaw('CHAR_LENGTH(price)')
            ->orderBy('price')
            ->get();

        $flights = product::where('category_id', '=', '38')->get();

        

        return view('drink_menu/print_review', compact('categories', 'shochus', 'spirits', 'sake_glasses', 'flights',
            'rose_and_reds', 'sake_bottle2s', 'sake_bottles', 'whiskies', 'wine_glasses', 'sparklings', 'whites'));
    }
}

