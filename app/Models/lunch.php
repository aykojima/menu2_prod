<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lunch extends Model
{
    protected $primaryKey = 'lunch_id';
    
    protected $fillable = [ 'title', 'subtitle', 'combo_title', 'combo_desc'];

    public function l_items()
    {
        // return $this->hasMany('App\Models\c_add_on_item', 'course_id', 'c_add_on_id');
        return $this->hasMany(l_item::class, 'lunch_id');
    }

    // public function c_items()
    // {
    //     return $this->hasMany('App\Models\c_item', 'course_id');
    // }
}
