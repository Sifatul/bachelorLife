<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fixedExpenses extends Model
{
    protected $fillable = ['user_id','amount','cat_id'];
}
