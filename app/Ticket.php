<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table='ticket';
    public $timestamps= false;
    protected $primaryKey='tiid';
    protected $guarded=['tiid'];
}
