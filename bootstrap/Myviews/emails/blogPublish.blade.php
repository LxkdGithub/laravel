<?php
/**
 * Created by PhpStorm.
 * User: sunxuhong
 * Date: 2018/4/29
 * Time: 19:58
 */
use Illuminate\Support\Carbon;
use App\blogModel\blogs;
$blogs=blogs::where('published_time','<=',Carbon::now()->timestamp+8*3600)->update(['status'=>1]);
echo '<script>alert("test");</script>';
echo Carbon::now()->timestamp;
$fp = fopen("/Users/sunxuhong/Desktop/test/test.txt","a+");
fwrite($fp, date('Y-m-d H:i:s')."****"."\r\n");
fclose($fp);
//if($blogs!=null){
//    foreach ($blogs as $blog) {
//          blogs::update(['status'=>1]);
//    }
//}