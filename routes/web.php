<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\lixukeController;
use App\Http\Controllers\MyUsersController;
use App\Http\Controllers\blogControllers;
use function foo\func;


//Route::get('/', 'blogControllers\DataController@index')->name('index');
//Route::get('/',function(){
//    return view('book.Template');
//});
//Route::get('/login','InitialController@toLogin');
//Route::any('/testCode','Service\ValidateController@getCode');


//Route::get('/test','lixukeController@all');
//
//Route::get('/form','lixukeController@create');
//
//Route::post('/test','lixukeController@doPost');//通过post提交到/test页面时,转到控制器
//
//Route::get('/test/{i}','lixukeController@singleShow');
//
//Route::get('/showUser/{userName}','MyUsersController@showMyUsers');
//Route::get('/showUsers/{userName}{pwd}','MyUsersController@showDirect');
//Route::post('/doLogin','MyUsersController@create');
//Route::get('/showUser/{userName}/edit','MyUsersController@eidt');
//Route::resource('showUser','MyusersController');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//邮件emails
//Route::get('/Myregister',function(){
//    return view('emails.register');
//})->name('MyRegister');
//Route::post('doRegister','blogControllers\DBController@create');
//Route::get('/MyLogin',function(){
//    return view('emails.login');
//})->name('MyLogin');
//Route::post('doLogin','blogControllers\DBController@doLogin');
//Route::post('ajaxCheck','blogControllers\ajaxCheckController@check');
//Route::get('/MyLogout','blogControllers\DBController@logout');
//Route::get('testMail',function(){
//    return view('emails.test');
//});
//Route::get('/doConfirm/{userInfo}','blogControllers\MailController@check');
//Route::get('test',function(){
//    return view('emails.blogPublish');
//});


use App\Entity\Member;
//use Symfony\Component\Routing\Annotation\Route;

Route::get('/', function () {
    return view('Mylogin');
});

Route::get('/login', 'View\MemberController@toLogin');

Route::get('/register', 'View\MemberController@toRegister');

Route::any('service/validate_code/create', 'Service\ValidateController@create');
Route::any('service/validate_phone/send', 'Service\ValidateController@sendSMS');
Route::any('service/validate_email', 'Service\ValidateController@validateEmail');
Route::post('service/register', 'Service\MemberController@register');
