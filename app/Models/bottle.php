<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bottle extends Model
{
    protected $primaryKey = 'bottle_id';

    protected $fillable = ['size', 'second_price', 'sake_id', 'wine_id'];

    public function sake()
    {
        return $this->belongsTo(sake::class, 'sake_id');
    }

    public function wine()
    {
        return $this->belongsTo(wine::class, 'wine_id');
    }
}
