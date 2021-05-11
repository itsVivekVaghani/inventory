<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
    protected $table = 'category';
    protected $primaryKey = 'categoryid';
    // public function product()
    // {
    //     return $this->hasOne('product', 'categoryid', 'categoryid');
    // }
}
