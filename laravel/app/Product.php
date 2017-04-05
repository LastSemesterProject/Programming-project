<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['seller_id','title','description','category', 'material','colour',
    'suitability','condition','price'];

    public $timestamps = false;
}
