<?php

namespace App\blogModel;

use Illuminate\Database\Eloquent\Model;

class association extends Model
{
    public $timestamps = false;
    protected $table='association';
    protected $fillable=['userId','blogId','hit','created_at'];
}
