<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    //
    protected $table = 'itinerarys';
    protected $primaryKey = "itid";
    public $timestamps = false;
    protected $fillable = ['contents','code','uid','city'];


}
