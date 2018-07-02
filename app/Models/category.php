<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = ['category', 'description'];

    public function products()
    {
        return $this->hasMany(product::class, 'category_id');
    }
    
}
