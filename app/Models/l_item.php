<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class l_item extends Model
{
    protected $primaryKey = 'l_item_id';
    
    protected $fillable = [ 'name', 'price', 'description', 'is_raw', 'lunch_id'];
}
