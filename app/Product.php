<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'productid';
    // public function product()
    // {
    //     return $this->belongsTo('category', 'categoryid', 'categoryid');
    // }
}
