<?php namespace App\Http\Controllers;

use App\goods;
use App\Myusers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function view;

class lixukeController
{
    protected $redirectTo = '/';
    public function all(){
      $all=goods::all();
      return view('goods',compact('all'));
    }

    public function singleShow($i){
       $single=goods::find($i);
       return view('goods',compact('single'));
       // return $i;
    }

    public function create(){
       return view('form');
    }

    public function doPost(Request $request){
       // dd($request->all());
       //得到传过来的值
       //插入数据库
       //重定向页面
       $input=$request->all();
       unset($input['_token']);
       Myusers::create($input);
       $select=Myusers::where('userName',$input['userName'])->get();
       echo $select;
       return view('doLogin');

    }
    protected function redirectTo()
    {
      return view('/test');
    }

}
