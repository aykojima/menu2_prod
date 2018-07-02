<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = ['name', 'price', 'production_area', 'description', 'category_id'];
    
    public function sake()
    {
        return $this->hasOne(sake::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
}
