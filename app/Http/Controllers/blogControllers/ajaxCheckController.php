<?php

namespace App\Http\Controllers\blogControllers;

use function compact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\blogModel\blogUsers;
use function preg_match;
use Illuminate\Support\Facades\Session;
use function session;
class ajaxCheckController extends Controller
{
    static public function check(Request $request){
        $cType=$request->cType;
        $cValue=$request->cValue;
        if($request->has('another')){
            $another=$request->another;
        }
        if($request->has('backPlace')){
            $backPlace=$request->backPlace;
        }
        $msg='not allow null';
        if($cValue==""){
            return response()->json([
                'msg'=>$msg,
            ]);
        }
        if($cType=='userName'){
            $user=blogUsers::where($cType,$cValue)->get()->first();
            if($user==null){
                $msg="Ok";
            }else{
                $msg=" already exists";
            }
        }else if($cType=='pwd') {
            $length = strlen($cValue);
            $pattern = '#{[a-zA-Z+][\d+]]|[[\d+][a-zA-Z]}#';
            if($length==0){
                $msg='not allow null';
            }else {
                if(isset($another)) {
                    $msg=($cValue==$another?"Ok":'not comparible');
                    if($msg=='not comparible'){
                        return response()->json([
                            'msg'=>$msg,
                        ]);
                    }
                }
                if($length<10){
                    $msg='length too short';
                }else if($length>20){
                    $msg='length too long';
                }else if(!preg_match($pattern, $cValue)){
                    $msg='too simple';
                }else{
                    $msg='Ok';
                }
            }
        }else if($cType=='pwd_confirmation'){
            if(isset($another)){
                $msg=$cValue==$another?'Ok':' not compirable';
            }else{
                    $msg="";
            }

        }

        return response()->json([
            'msg'=>$msg,
        ]);
    }
}
