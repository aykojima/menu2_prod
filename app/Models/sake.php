<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sake extends Model
{
    protected $primaryKey = 'sake_id';

    protected $fillable = ['grade', 'rice', 'sweetness', 'product_id'];

    public function bottle()
    {
        return $this->hasOne(bottle::class, 'sake_id');
    }
}
