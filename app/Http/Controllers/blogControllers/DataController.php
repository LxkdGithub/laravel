<?php

namespace App\Http\Controllers\blogControllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\blogModel\blogUsers;
use App\blogModel\userInfo;
use App\blogModel\blogs;
use App\blogModel\association;
use function strtotime;
use function var_dump;

class DataController extends Controller
{
       public function index(){
            $blogs=blogs::where('published_time','<=',Carbon::now()->timestamp+8*3600)->where('status',1)->orderBy('published_time')->limit(10)->get();
           return view('emails.index',['blogs'=>$blogs]);
       }
}
