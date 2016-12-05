<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $timestamps = false;
    protected  $primaryKey = 'hid';
    protected  $guarded = ['hid'];


}
