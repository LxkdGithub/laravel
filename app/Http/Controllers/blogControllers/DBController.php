<?php
namespace App\Http\Controllers\blogControllers;
use Carbon\Carbon;
use function cookie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use function print_r;
use function response;
use function session;
use function session_destroy;
use function time;
use Validator;
use App\blogModel\blogUsers;
use App\blogModel\userInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function compact;
use function var_dump;
use function view;
use function with;

class DBController extends Controller
{
       protected $flag=1;
       protected $errors=null;
       protected $str="";
        public function create(Request $request)
        {
            $this->checkInfo($request);
            if ($this->flag == 0) {
                return view('emails.register',['errors'=>$this->errors]);
//                redirect('/')->withInput()->withErrors($this->errors);
            } else {
                $lastUser=blogUsers::orderBy('id','desc')->get()->first();
                $bigId=$lastUser->id;
                echo $bigId;
                $blogUser = Array($bigId+1,$request->userName,$request->pwd,0);
//                $userInfo = Array(null, $request->sex, null, Carbon::now(), $request->email, 0, 0);
//                userId               | sex  | fav  | login_at   | email             | hit | blogCount
                $userInfo = Array('userId'=>$bigId+1, 'sex'=>$request->sex, 'fav'=>null, 'login_at'=>Carbon::now(), 'email'=>$request->email, 'hit'=>0, 'blogCount'=>0);
                $bool = DB::insert('INSERT INTO blogUsers VALUES (?,?,?,?)', $blogUser);//返回1
                if ($bool == 1) {
                    try{
//                      @$bool1 = DB::insert('INSERT I  NTO userInfo VALUES (?,?,?,?,?,?,?)', $userInfo);
                        $bool1=userInfo::create($userInfo);
                        if($bool1 != null){
//                            echo $bool->userName;
                            var_dump($bool);
                            session(['userName'=>$request->userName]);
                            return redirect()->route('index');
                        }else{
                            echo 'eror';
                        }
                    }catch(Exception $e){
                        try{
                            $deleteBool=DB::delete('DELETE FROM blogUsers WHERE userName=?',$request->userName);
                        }catch(Exception $exception){
                            print_r($e);
                            if($deleteBool==1){
                                $this->errors='服务器故障,请重新插入';
                            }else{
                                $this->errors='清换个账号注册';
                            }
                            return redirect()->route('index')->with('errors',[$this->errors]);
                        }
                    }
//                    if($bool1 != null){
//                        echo 'succeed';
//                    }else{
//                        echo 'step2';
//                        $deleteBool=DB::delete('DELETE FROM blogUsers WHERE userName=?',$request->userName);
//                        if($deleteBool==1){
//                            $this->errors='服务器故障,请重新插入';
//                        }else{
//                            $this->errors='清换个账号注册';
//                        }
//                        echo $this->errors;
//                        redirect()->route('MyRegister',['errors'=>$this->errors]);
//                        /Redirect('/doRegister')->withInput()->withErrors($this->errors);

                }else{
                    echo 'step 1 lose';
//                    return $this->errors;
                }
            }
        }
        public function checkInfo(Request $request){
//            $this->validate($request, ['userName' => 'required|min:3', 'pwd' => 'required', 'email' => 'required', 'sex' => 'required']);
            $input = $request->all();

            $rule = [
                'userName' => 'required|unique:blogUsers',
                'pwd'=>'required|between:1,20|confirmed',
                'pwd_confirmation'=>'required',
                'email'=>'required|email|between:10,20',
                'sex'=>'required'
            ];

            $message = [
                'userName.required' => 'name not allow null',
                'userName.unique'=>'name not allow conflict',
                'pwd.required'=>'please input the password',
                'pwd.confirmed'=>'please check the password',
                'eamil.required'=>'please input the email',
                'email.email'=>'please input the email in invalied format',
                'sex.required'=>'please input the sex',
            ];


            $validate = Validator::make($input, $rule, $message);
            if ($validate->passes()) {
                echo 'succeed!!!!!!';
            }else{
                $this->flag=0;
                $this->errors=$validate->errors();
//                  return redirect()->action('blogControllers\DBController@create',['errors'=>$validate->errors()]);
//                   return Redirect::back()->withInput()->withErrors($validate->messages());
//                return back()->withErrors($validate);
            }
        }

        /*
         * 处理登录数据---------------------------------------------------------------------
         *
         */
    /**
     * @param Request $request
     */
    public  function doLogin(Request $request)
    {
        $this->errors = null;
        $this->checkLogin($request);
        if ($this->errors != null) {
            $errors = (Array)($this->errors);
//            var_dump($errors);
//            return  redirect()->route('MyLogin')->with('errors',$errors);
            return view('emails.login')->with('errors',$this->errors);
        }else{
            $user = blogUsers::where('userName', $request->userName)->where('pwd', $request->pwd)->first();
//            $user=DB::select('SELECT * FROM blogUsers WHERE userName=? AND pwd=?',[$request->userName,$request->pwd]);
            if ($user != null) {
                if($request->input('autoLogin','off')==1){
                    session(['userName'=>$request->userName]);
//                    Cookie::
                    return response()->view('emails.index')->withCookie(cookie('userName',$request->userName,time()+3600));
                }
                echo 'as';
                session(['userName'=>$request->userName]);
                return redirect()->route('index');
            }else{
                $this->errors='not have this user';
                return view('emails.login')->with('errors',$this->errors);
            }
        }
    }
//
        public function wrap($arr){
            if(is_array($arr)){
                foreach ($arr as $ar){
                    if(is_array($ar)){
                        wrap($ar);
                    }else{
                        $str+=$ar;
                    }
                }
            }

        }


        public function checkLogin(Request $request){
            $input=$request->all();
            $rule = [
                'userName' => 'required',
                'pwd'=>'required',
            ];

            $message = [
                'userName.required' => 'name not allow null',
                'pwd.required'=>'please input the password',
            ];

            $validate=Validator::make($input,$rule,$message);
//            $this->validate($request, $rules);
            if(!$validate->passes()) {
                $this->errors = $validate->errors();
            }
        }

        //***********************************退出
    public function logout(){
        session()->forget('userName');
        Cookie::queue(Cookie::forget('userName'));
        return \redirect()->route('index');
//        return response()->view('emails.index')->withCookie(cookie('userName','',-1));
    }
}
