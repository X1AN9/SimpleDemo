<?php
namespace Home\Controller;
use Think\Controller;
class CheckController extends Controller {
    public function _initialize(){
         $url = "http://".$_SERVER['HTTP_HOST']."/query/index.php/Home/Login/index.html";
        if(!$_SESSION['user_id']){
            $avr = '<script>';
            $avr .= 'alert("你还未登录,请先登录!");';
           	$avr .= 'location.href="' . $url . '"';
            $avr .='</script>';
            echo ($avr);
        }
    }
}


