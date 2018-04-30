<?php

namespace App\Http\Controllers\Service1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tool\ValidateCode;

class ValidateController1 extends Controller
{
    public function getCode(){
        $validate=new ValidateCode();
        $code=$validate->getCode();
        return $code;
    }
}
