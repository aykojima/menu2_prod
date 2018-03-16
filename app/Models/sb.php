<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sb extends Model
{
    protected $primaryKey = 'sb_id';
    public $timestamps = false;
    protected $fillable = 
    [ 'eng_name', 'jpn_name', 'origin', 'nigiri_price', 'sashimi_price', 
    'is_sustainable', 'is_raw', 'is_special', 'is_on_menu'];
}
