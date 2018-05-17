<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller {
	public function index(){
		$shop_id = $_GET['id'];
        $num = $_GET['num'];


        // print_r($shop_id);
        // print_r($num);
        // print_r($_POST['number']);

        //截取数组拼接商品id
        $array = explode(",",$shop_id);
        // print_r($array);

        //截取数组拼接商品数量
        $array1 = explode(",",$num);
        // print_r($array1);

        //获取到商品的id
        $arr = array_slice($array, 0,count($array)-1);
        // print_r($arr);

        //获取到选中的商品数量
        $n = array_slice($array1, 0, count($array1)-1);
        // print_r($n);
        //实例化表
        $shop = M('shop');
        $ghsid = M('gonghuoshang');
        $jilv = M('jilv');
        $del = M('car');

        //获取当前时间
        $startime=date("Y-m-d H:i");
        $danhao=date("YmdHi");

        //数量数组 $n; id数组 $arr;
        
        
        for ($i=0; $i < count($arr); $i++) {
            $res[] = $shop->where('shop_id='.$arr[$i])->find();
            $res[$i]['shop_num'] = $n[$i];
            $res[$i]['allprice'] = $n[$i] * $res[$i]['shop_price'];
            $res[$i]['shop_xiangshu'] = ceil($n[$i]['shop_num']/$res[$i]['shop_baozhuanglv']);
            //删除购物车内的下单的数据
            $del->where('shop_id='.$arr[$i])->delete();
            $lastprice += $res[$i]['allprice'];
            //得到供货商的id
            $gonghuoshang = $res[$i]['shop_gonghuoshang'];
            // print_r($gonghuoshang);

            //添加记录
            $data=$jilv->create();
            $data['shopid'] = $res[$i]['shop_id'];
            $data['gonghuoshang'] = $gonghuoshang;
            $data['star_time']=$startime;
            $data['danhao']=$danhao;
            $data['number']=$n[$i];
            $data['money']=$res[$i]['shop_price']*$n[$i];
            if($_SESSION['user_id']){
            	$jilv->add($data);
            }
            

        }
        //得到循环出的商品总价之和
        // print_r($lastprice);

        $ghs = $ghsid->where('id='.$gonghuoshang)->select();
        $ghs[0]['danhao']=$danhao;
        $ghs[0]['lastprice']=$lastprice;
        // print_r($res);
        // print_r($ghs);
        $this->assign("jl",$jl);
        $this->assign("ghs",$ghs);
        $this->assign("shop",$res);
        $this->display();

	}

	public function query(){
		$this->display();
	}



    public function querySid(){
        $sid = $_POST['sid'];
        $shop = M('shop');
        $ghsid = M('gonghuoshang');
        $del = M('car');
        $jl = M('jilv');

        $arr = $jl->where('danhao = %s',$sid)->select();
        
        // print_r($arr);
        for($i=0;$i<count($arr);$i++){
            $res[] = $shop->where('shop_id='.$arr[$i]['shopid'])->find();
            $res[$i]['shop_num'] = $arr[$i]['number'];
            $res[$i]['allprice'] = $arr[$i]['number'] * $res[$i]['shop_price'];
            $res[$i]['shop_xiangshu'] = ceil($arr[$i]['number']/$res[$i]['shop_baozhuanglv']);



        	$gonghuoshang = $arr[$i]['gonghuoshang'];
        	$lastprice+=$arr[$i]['money'];

        }

        $ghs = $ghsid->where('id='.$gonghuoshang)->select();
        $ghs[0]['lastprice']=$lastprice;
        $ghs[0]['danhao']=$sid;
        // print_r($res);
        // print_r($ghs);
        $this->assign("jl",$jl);
        $this->assign("ghs",$ghs);
        $this->assign("shop",$res);
        $this->display();

    }

}