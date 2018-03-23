<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class c_omakase extends Model
{
    protected $primaryKey = 'c_omakase_id';
    
    protected $fillable = [ 'name', 'price', 'description', 'desc_price', 'course_id'];
}
