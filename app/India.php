<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class India extends Model
{
    protected $table = "india";
    public $timestamps = false;
    protected  $primaryKey = 'id';
    protected  $guarded = ['id'];

    public function company(){
        return $this->belongsTo('App/Company');
    }
}
