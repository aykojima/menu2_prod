<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wine extends Model
{
    protected $primaryKey = 'wine_id';

    protected $fillable = ['type', 'year', 'product_id'];

    public function bottle()
    {
        return $this->hasOne(bottle::class, 'wine_id');
    }
}
