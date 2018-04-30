<?php

namespace App\blogModel;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    public $timestamps = false;
    protected $table='blogs';
    protected $fillable=['blogId','blogTitle','blogContent','published_time'];
}
