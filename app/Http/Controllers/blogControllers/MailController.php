<?php

namespace App\Http\Controllers\blogControllers;

use Carbon\Carbon;
use function date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\blogModel\blogUsers;
use App\blogModel\userInfo;
use function implode;
use function preg_match;
use function preg_match_all;
use function preg_split;
use function redirect;
use function serialize;
use function session;
use function var_dump;

class MailController extends Controller{
    public $to;//全局对象
    public function send()
    {
        if(session()->has('userName')){
            $name=session()->get('userName');
        }
        // Mail::send()的返回值为空，所以可以其他方法进行判断
        $flag=Mail::send('emails.test',['name'=>$name],function($message){
              $message ->to($this->to)->subject('邮件测试');
        });
        // 返回的一个错误数组，利用此可以判断是否发送成功
          if(Mail::failures()==null){
              echo "<script>alert('发送成功!');</script>";
          }
          return redirect('emails.index');
    }
    public function doReg(Request $request){
        $
        $email=$request->input('email');
        $this->to=$email;
        $this->send();
    }

    //---------------------------------------------------------------验证
    public function check($userInfo){
         $userInfo=base64_decode($userInfo);
         $userName=preg_split("#(?<=userName)[=]#",$userInfo);
         $user=$userName[1];
         $current_user=blogUsers::where('userName',$user)->get()->first();
         if($current_user==NULL){
             return '<a href="/MyRegister">没有该用户,请创建</a>';
         }else{
             $Info=userInfo::where('userId',$current_user->id)->get()->first();
             $reg_time=$Info->login_at;
             return (Carbon::now()-$reg_time)/3600;
//             if(($current_user->status)==0){
//
//                 $update_result=blogUsers::where('userName',$user)->update(['status'=>1]);
//                 if($update_result!=NULL){
//                     return 'succeed!';
//                 }else{
//                     return '激活失败';
//                 }
//             }else{
//                 return '您已激活,<a href="/MyLogin">点击登录</a>';
//             }
         }
    }
}

