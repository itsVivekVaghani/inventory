<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'transactionincomes';
    protected $primaryKey = 'incomeid';
}
