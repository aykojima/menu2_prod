<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roll extends Model
{
    protected $primaryKey = 'roll_id';
    protected $fillable = 
    [ 'name', 'description', 'price', 'is_sustainable', 
    'is_raw', 'is_gf', 'category', 'is_special', 'is_on_menu'];
}
