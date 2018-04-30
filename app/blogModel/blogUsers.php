<?php

namespace App\blogModel;

use Illuminate\Database\Eloquent\Model;

class blogUsers extends Model
{
    public $timestamps = false;
    protected $table='blogUsers';
    protected $fillable=['id','userName','pwd','status'];
}
