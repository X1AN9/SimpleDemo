<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index(){
        session_unset("user_id");
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
    		if(count($result)>0){
				echo 1;
                $_SESSION['user_id'] = $result["id"];
    		}else{
                echo 0;
            }
    	}else{
    		$this->display();//显示模板
    	}
    }

    public function queryuser($username){

        $admin = M('admin');

        if($admin->where("username = '%s' " , $username)->find()){
            echo 1;//该账号存在
        }else{
            echo 0;//该账号不存在
        }
    }

    public function querypwd($userpwdold){
        $admin = M('admin');
        $pwd = md5($userpwdold);

        if($admin->where("userpwd = '%s' " , $pwd)->find()){
            echo 1;//该密码正确
        }else{
            echo 0;//该密码错误
        }
    }

    public function updpwd(){
        $admin = M('admin');
        if($_POST){
            $userpwdnew2 = $_POST['userpwdnew2'];
            $data = $admin->create();
            $data['userpwd'] = md5($userpwdnew2);

            // print_r($_SESSION['user_id']);
            $result=$admin->where('id='.$_SESSION['user_id'])->save($data);
            if($result){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            $this->display();
        }
    }
}