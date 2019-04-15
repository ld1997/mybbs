<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
   	  // 获取分区信息
   	  $parts = M('bbs_part')->select();
   	  $parts = array_column($parts,null  ,'pid');

   	  //获取版块信息
   	  $cates = M('bbs_cate')->select();

   	  //把版块信息 追加到 分区信息中
   	  foreach($cates as $cate){
   	  		$parts[ $cate['pid'] ]['sub'][] = $cate;
   	  }

   	  $this->assign('parts',$parts);
      $this->display();//View/Index/index.html;
    }
}