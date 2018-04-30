<?php

namespace App\blogModel;

use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    public $timestamps = false;
    protected $table='userInfo';
    protected $fillable=['userId','sex','fav','login_at','email','hit','blogCount'];
}
