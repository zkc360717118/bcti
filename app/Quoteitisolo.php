<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quoteitisolo extends Model
{
    public $timestamps=false;
    protected $table="quoteitisolo";
    protected $primaryKey = 'id';

	/*
   每个行程属于一个总报价表quote 的一条信息
   */
	public function quote(){
		return $this->belongsTo(Quote::class);
	}
}
