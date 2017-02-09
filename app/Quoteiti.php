<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quoteiti extends Model
{
    public $timestamps=false;
    protected  $table = "quoteiti";
    protected $primaryKey="qiid";

    /*
    每个行程属于一个总报价表quote 的一条信息
    */
    public function quote(){
        return $this->belongsTo(Quote::class);
    }
}
