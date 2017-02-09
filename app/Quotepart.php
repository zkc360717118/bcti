<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotepart extends Model
{
    public $timestamps=false;
    protected $table="quotepart";
    protected $guarded=['qpid'];
    protected $primaryKey='qpid';

    /*
     * 每一个分报价属于quote总表
     */
    public function father(){
        return $this->belongsTo('App\Quote');
    }

}
