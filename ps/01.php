<?php
 //generate img
  $time =time();
  //要截图的网址
  $url = 'http://www.xianggl.com/';
  //输出图片的位置与名称
  $out = 'images/tmp-'.$time.'.png';
  $path = 'D://phpStudy/WWW/ps/xiaoxiang.exe';//你下载CutyCapt存放的位置
  //输出图片的尺寸
  $width = 800;
  $height = 1500;
  //命令
  $cmd = "$path --url=$url --out=$out --min-width=$width --min-height=$height";
  system($cmd);
  //显示图片
  echo "<img src='".$out."' >";
?>