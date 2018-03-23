<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class c_add_on_item extends Model
{
    protected $primaryKey = 'c_add_on_id';
    
    protected $fillable = [ 'description', 'price', 'course_id'];

    public function course()
    {
        // return $this->belongsTo('App\Models\course', 'c_add_on_id', 'course_id');
    }
    
}
