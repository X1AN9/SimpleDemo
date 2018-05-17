<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class MarkController extends CheckController {
	public function index(){
      
        $this->display();
    }


    public function search(){
        if($_POST){

            $shop=M("shop");//实例化表

            $id=$_POST["q"];//获取页面传过来的text值

            $select1 = $_POST["select1"];//获取页面传过来的下拉列表框的value值

            $sql = "SELECT a.shop_id,a.shop_bianhao,a.shop_gonghuoshang,a.shop_kehao,a.shop_name,a.shop_newprice,a.shop_price,a.shop_img,b.`name` FROM bao_shop AS a LEFT JOIN bao_gonghuoshang AS b ON a.shop_gonghuoshang=b.id WHERE shop_bianhao like '%$id%' OR shop_kehao like '%$id%' OR shop_name like '%$id%' OR name like '%$id%'";

            $result = $shop->query($sql);//执行sql语句
            // dump($_POST['q']);
            // die();
            if($result){
                $this->assign("sp",$result);
                $this->display("index");
            }else{
                echo '<script language="javascript">';
                echo 'alert("搜索无结果");';
                echo "location.href='search.html'";
                echo '</script>';
            }
        }else{
            $this->display("index");
        }
    }

    public function add(){
        if($_POST){
        //实例化表
        $shop=M('shop');
        $data=$shop->create();
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath = '.shop_img'; // 设置附件上传目录
            $info = $upload->upload();
            if(!$info){
                 // 上传错误提示错误信息
                // $this->error($upload->getError());
                echo '<script language="javascript">';
                echo 'alert("还未选择上传的图片");';
                echo "location.href='add.html'";
                echo '</script>';
            }else{
                // 保存文件的名称 方便使用时直接调
                $data["shop_img"] = $info["shop_img"]["savepath"] . $info["shop_img"]["savename"];
                $result=$shop->add($data);
                // print_r($result);
                // die();
                if($data){
                    echo '<script language="javascript">';
                    echo 'alert("添加成功");';
                    echo "location.href='index.html'";
                    echo '</script>';
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("添加失败");';
                    echo "location.href='index.html'";
                    echo '</script>';
                }
            }
        }else{
            $type=M('typeshop');
            $gonghuoshang=M('gonghuoshang');
            $qur = $type->select();
            $ghs = $gonghuoshang->select();
            // print_r($ghs);
            // print_r($qur);
            $this->assign("qr",$qur);
            $this->assign("gs",$ghs);
            $this->display();
        }
    }

    public function querygonghuoshang($name){

        $ghs = M('gonghuoshang');

        if($ghs->where("name = '%s' " , $name)->getField('name')){
            echo 1;
        }else{
            echo 0;
        }

    }
// $name,$person,$phone,$zjphone,$address,$card,$cardname,$cardkaihuhang
    public function addgonghuoshang(){
        if($_POST){
            $gonghuoshang=M('gonghuoshang');
            $data=$gonghuoshang->create();
            $res = $gonghuoshang->add($data);
            if($res){
                echo "<script> history.go(-2); </script>";
            }else{
                echo 0;
            }
        }else{
            $this->display();
        }
    }

    public function addtype($typename){
        // 实例化typeshop对象
        $ts = M("typeshop");
        //创建data数组存储type_name值
        $data['type_name'] = $typename;
        //将data数组中存储的typename值添加到数据库
        $res=$ts->add($data);

        // print_r($res);
        // die();

        // //查询分类表中的typename
        // $qur = $ts->select();
        // $this->assign("qr",$qur);

        header('location: '.$_SERVER['HTTP_REFERER']);
    }

    public function searchById($shop_id){
        $result = M("shop")->where("shop_id=".$shop_id)->select();
        // print_r( $result);
        // die();
        $this->assign("sp",$result);
        $this->display("searchById");
    }

    public function update($id){
        $type=M("shop");
        if($_POST){//修改
            $id = $_GET['id'];

            //判断pic文件框是否已经选择文件
            if(!empty($_FILES['shop_img']['tmp_name'])){
                /*
                    修改图片
                */
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728 ;// 设置附件上传大小
                $upload->exts =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = '.shop_img'; // 设置附件上传目录
                $info = $upload->upload();
                if(!$info){
                     // 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{

                    //根据id查询出图片名称
                    $query = $type->where("shop_id=".$id)->select();
                    // dump($query[0]['shop_id']);
                    // die();
                    $data = $type->create();
                    $data['shop_id'] = $query[0]['shop_id'];
                    // 保存文件的名称 方便使用时直接调
                    $data["shop_img"] = $info["shop_img"]["savepath"] . $info["shop_img"]["savename"];
                    $result=$type->where('shop_id='.$id)->save($data);
                    if($result){
                        echo '<script language="javascript">';
                        echo 'alert("您修改成功");';
                        echo "location.href='search.html?shop_id=".$id."'";
                        echo '</script>';
                    }else{
                        echo '<script language="javascript">';
                        echo 'alert("您未做出任何修改");';
                        echo "location.href='search.html?shop_id=".$id."'";
                        echo '</script>';
                    }
                }
            }else{
                /*
                    不修改图片
                */
                //根据id查询出图片名称
                $query = $type->where("shop_id=".$id)->select();
                // dump($query[0]['shop_id']);
                // die();
                $data = $type->create();
                $data['shop_id'] = $query[0]['shop_id'];
                $data['shop_img'] = $query[0]['shop_img'];
                // dump($data);
                // die();
                $result=$type->where('shop_id='.$id)->save($data);
                if($result){
                    echo '<script language="javascript">';
                    echo 'alert("修改成功");';
                    echo "location.href='searchById.html?shop_id=".$id."'";
                    echo '</script>';
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("修改失败");';
                    echo "location.href='searchById.html?shop_id=".$id."'";
                    echo '</script>';
                }
            }
        }else{//查询
            $result = M("shop")->where("shop_id=".$id)->select();
            // print_r( $result);
            $qur = M('typeshop')->select();
            $ghs = M('gonghuoshang')->select();
            // print_r($ghs);
            $this->assign("qr",$qur);
            $this->assign("gs",$ghs);
            $this->assign("sp",$result);
            $this->display("update");
        }
    }

    public function del($shop_id){
        $id =$_GET['shop_id'];
        $r = M('shop')->where('shop_id='.$shop_id)->delete();
        $this->display('index');
    }

    public function car(){
        //实例化表
        $shop = M('car');
        $shops = M('shop');

        //循环输出订单里的数据
        $sql = "select * FROM bao_car a LEFT JOIN bao_shop b ON a.shop_id=b.shop_id";
        $query = $shops->query($sql);
        // print_r($query);
        // die();

        foreach ($query as $key => $value) {
            //$arr['sp'] = M('car')->where("shop_gonghuoshang='".$value['shop_gonghuoshang']."'")->find();
            $ar[$value['shop_gonghuoshang']] = $s = M('car')->where("shop_gonghuoshang='".$value['shop_gonghuoshang']."'")->select();
            // $ar[$value['shop_gonghuoshang']][$key]['p'] = '555';
            for ($i=0; $i < count($s); $i++) {
                $ar[$value['shop_gonghuoshang']][$i]['cp'] = $shops->where("shop_id='".$s[$i]['shop_id']."'")->select();
            }
        }
        // $arrs = array_keys($ar);
        // print_r($arrs);
        // print_r($ar);
        $ghs = M('gonghuoshang')->select();
        $this->assign("gs",$ghs);
        // $this->assign("sps",$arrs);
        $this->assign("sp",$ar);
        $this->display("car");
    }

    public function addcar($id,$gonghuoshang){
        //实例化表
        $shop = M('car');
        $shops = M('shop');

        //查询car表中数据
        $result = $shop->where("shop_id=".$id)->find();
        // dump($result);
        // die();
        //判断result是否查询到数据
        if($result){
            //查到了说明订单列表中有该数据,就不再添加入订单列表
            //$this->display('car');
        }else if($result==""){
            //没有查到说明订单列表中没有数据,则添加数据如订单列表
            //添加数据到car表
            $data['shop_id'] = $id;
            $data['shop_gonghuoshang'] = $gonghuoshang;
            $shop->add($data);
        }

        // //循环输出订单里的数据
        // $sql = "select * FROM bao_car a LEFT JOIN bao_shop b ON a.shop_id=b.shop_id";
        // $query = $shops->query($sql);
        // // print_r($query);
        // // die();

        // foreach ($query as $key => $value) {
        //     //$arr['sp'] = M('car')->where("shop_gonghuoshang='".$value['shop_gonghuoshang']."'")->find();
        //     $ar[$value['shop_gonghuoshang']] = $s = M('car')->where("shop_gonghuoshang='".$value['shop_gonghuoshang']."'")->select();
        //     // $ar[$value['shop_gonghuoshang']][$key]['p'] = '555';
        //     for ($i=0; $i < count($s); $i++) {
        //         $ar[$value['shop_gonghuoshang']][$i]['cp'] = $shops->where("shop_id='".$s[$i]['shop_id']."'")->select();
        //     }
        // }
        // // $arrs = array_keys($ar);
        // // print_r($arrs);
        // // print_r($ar);
        // $ghs = M('gonghuoshang')->select();
        // $this->assign("gs",$ghs);
        // // $this->assign("sps",$arrs);
        // $this->assign("sp",$ar);
        // $this->redirect('Index/car');
        header('location: '.$_SERVER['HTTP_REFERER']);
    }

    public function delcar($shop_id){
        $del = M('car');
        $r = $del->where('shop_id='.$shop_id)->delete();
        header('location: '.$_SERVER['HTTP_REFERER']);
    }

    public function fenlei(){

        //商品分类
        $qur = M('typeshop')->select();
        $this->assign("qr",$qur);

        //商品
        $sql = "SELECT * FROM bao_shop,bao_typeshop where bao_shop.shop_typeid=bao_typeshop.type_id";
        $result = M('shop')->query($sql);//执行sql语句
        // print_r($result);

        $result1 = M('typeshop')->select();//执行sql语句
        // print_r($result1);


        foreach ($result1 as $key1 => $value1) {
            $ar1[$value1['type_id']] = "";
        }
        // print_r($ar1);

        foreach ($result as $key => $value) {
            
            $ar[$value['shop_typeid']] = $s = M('shop')->where("shop_typeid='".$value['shop_typeid']."'")->select();
        }
        // print_r($ar);

        // foreach ($ar1 as $key => $value) {
        //     $ar1[$value['type_id']] = $ar[$value['type_id']];
        // }
        $ar2 = $ar+$ar1;
        ksort($ar2);
        // print_r($ar2);

        // $arr = array_merge($ar,$ar1); 

        // print_r($arr);


        $this->assign("shop",$ar2);
        $this->display();
    }



    /*public function form(){
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
            if(!$_SESSION['user_id']){
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
    }*/

}