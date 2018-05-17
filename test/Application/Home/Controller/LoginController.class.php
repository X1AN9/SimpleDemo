<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){
    	// 实例化User对象
        $adm = M("admin");
    	if($_POST){
    		//得到表单里面的数据
    		$adm_name = $_POST["adm_name"];
    		$adm_pwd = md5($_POST["adm_pwd"]);
    		$sql["username"] = $adm_name;
    		$sql["userpwd"] = $adm_pwd;
    		
    		//根据数据库的数据查询
    		$result = $adm->where($sql)->find();
    		//判断用户登录是否成功
    		if($result){
    			echo "1";
    		}else{
    			echo "0";
            }
    	}else{
    		$this->display();//显示模板
    	}
    }
}