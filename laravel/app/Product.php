<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['seller_id','title','description','category', 'material','colour',
    'suitability','conditionn','price','pic'];

    public $timestamps = false;
}
