<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    protected $fillable=['goodsid','name','price'];


}
