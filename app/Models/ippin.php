<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class ippin extends Model
{
    protected $primaryKey = 'ippin_id';
    //public $timestamps = false;
    protected $fillable = 
    [ 'name', 'price', 'is_sustainable', 'is_raw', 'is_gf', 
    'category', 'is_special', 'is_on_menu'];
}
