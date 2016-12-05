<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table="company";
    protected  $primaryKey= 'cid';
    protected $guarded = ['resid'];
    public $timestamps=false;

    public function contact(){
        return $this->hasMany(India::class,'cid');
    }
}
