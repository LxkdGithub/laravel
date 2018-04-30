<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
         public function show(Request $request){
             $value=$request->session()->get('userName');
         }
}
