<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class c_item extends Model
{
    protected $primaryKey = 'c_item_id';
    
    protected $fillable = [ 'name', 'description', 'price', 'choice', 'course_id'];
}
