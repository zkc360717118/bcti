<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotehotel extends Model
{
    public $timestamps=false;
    protected $table="quotehotel";
    protected $primaryKey="qhid";

    /*
     * 每一个酒店报价属于总表的其中一行
     */
    public function quote(){
        return $this->belongsTo(Quote::class);
    }

}
