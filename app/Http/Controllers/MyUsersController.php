<?php
namespace App\Http\Controllers\blogController;
use App\Myusers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests\MyUsersRequest;
use function print_r;
use function redirect;

class MyUsersController  extends Controller
{
    public function create(Request $request){
        $this->validate($request, ['userName' => 'required|min:3', 'pwd' =>'required']);
        $input=$request->all();
        unset($input['_token']);
        unset($input['submit']);
        Myusers::create($input);
        $userName=$input['userName'];
        return view('doLogin',compact('userName'));
    }


    public function showMyUsers($userName){
        echo 'succeed';
        if(isset($userName)) {
            $currentUser = Myusers::where('userName', $userName)->get();
            return view('showUsers',compact('currentUser'));
        }
    }

    public function showDirect($userName,$pwd){
        $currentUser=Myusers::where('userName',$userName)-where('pwd',$pwd)->get();
        if($currentUser!=null){
            echo '您的信息是'.$currentUser;
        }
    }
}
