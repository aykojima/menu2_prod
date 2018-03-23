<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $primaryKey = 'course_id';
    
    protected $fillable = [ 'title', 'price'];

    public function c_add_on_items()
    {
        // return $this->hasMany('App\Models\c_add_on_item', 'course_id', 'c_add_on_id');
        return $this->hasMany(c_add_on_item::class, 'course_id');
    }

    public function c_items()
    {
        return $this->hasMany('App\Models\c_item', 'course_id');
    }

    public function c_omakases()
    {
        return $this->hasMany('App\Models\c_omakase', 'course_id');
    }

}
