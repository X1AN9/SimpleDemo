<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends CheckController {
    public function index(){
    	echo '该文件位于 " '  . __FILE__ . ' " <br/>';
    	echo '该文件位于 " '  . __DIR__ . ' " <br/>';
    	$this->display();
    }
}