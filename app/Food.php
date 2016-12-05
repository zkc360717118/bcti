<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $timestamps = false;
    protected  $primaryKey= 'resid';
    protected $guarded = ['resid'];
    protected $table = 'food';

}
