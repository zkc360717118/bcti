<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public $timestamps= false;
    protected $table="quote";
    protected $primaryKey="pid";
    protected $guarded=['pid'];

    /*
     * 一个总报价包含的行程信息
     */
    public function iti(){
        return $this->hasMany('App\Quoteiti','pid','pid');
    }

    /*
    一个总报价包含的酒店信息
    */
    public function hotel(){
        return $this->hasMany('App\Quotehotel','qid');
    }

    /*
     * 一个总报价
     */
    public function quotepart(){
        return $this->hasMany('App\Quotepart','pid');
    }
}
