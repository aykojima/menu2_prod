<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page_title extends Model
{
    protected $primaryKey = 'title_id';

    protected $fillable = ['title_name', 'title_description', 'title_size'];

    public function categories()
    {
        return $this->hasMany(category::class, 'title_id');
    }
}
