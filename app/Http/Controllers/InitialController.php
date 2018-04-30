<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitialController extends Controller
{
      public function toLogin(){
            return view('book.login');
      }
}
