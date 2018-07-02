<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category as category;
use App\Models\product as product;
use App\Models\sake as sake;

class sake_controller extends Controller
{
    public function show() 
    { 
        $sake_glasses = product::all();
        //dd($sake_glasses);

        return view('drink_menu/sake', compact('sake_glasses'));
    }
}
