<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table = "transactions";
    public $incrementing = false;
    
}
