<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()//主页显示
    {
        //首页显示友情链接
        $model=D(a);
        $info=$model->select();
        $this->assign("a_href",$info);
        //所有页面的公告
        $ggmodel=D(gg);
        $gginfo=$ggmodel->select();
        $this->assign("gg",$gginfo[0]['content']);
        //banner横幅
        $bannermodel=D(zx);
        $bannerinfo=$bannermodel->where("type='banner'")->select();
        $this->assign("banner",$bannerinfo);
        //高校信息
        $model=D(gxsd);
        $info=$model->select();
        $this->assign("gxsd",$info);
        //电商技能
        $dsjnmodel=D(dsjn);
        $dsjninfo=$dsjnmodel->order("date desc")->limit(3)->select();
        //dump($dsjninfo);
        $this->assign("dsjn",$dsjninfo);
        //显示学会资讯
        $model=D(xhzx);
        $info=$model->order("time desc")->limit(2)->select();
        $this->assign("xhzx",$info);
        //显示高校视点
        $model=D(gxsd);
        $info=$model->order("time desc")->limit(2)->select();
        $this->assign("gxsd",$info);




        $this->display();

    }
    public function xhjj() //学会简介
    {
        $this -> display();
    }
    public function layout()
    {
        $this -> display();
    }
    public function xhld() //学会领导信息获取
    {

        $model=D(header);
        $info=$model->select();
        $this->assign("xhld",$info);
        $this->display();
    }
    public function xhzx()//学会动态---学会咨询页面信息获取
    {
        $model=D(xhzx);
        $info=$model->select();
        $this->assign("xhzx",$info);
        $this->display();
    }
    public function xhzxcont()//学会动态---学会咨询页面栏目信息获取
    {
        $id=$_GET[id];
        $model=D(xhzx);
        $info=$model->where("id='$id'")->select();
        $this->assign("xhzxcont",$info);
        $this->display();
    }
    public function gxsd()//高校信息--高校视点页面信息获取
    {

        $model=D(gxsd);
        $info=$model->select();
        $this->assign("gxsd",$info);
        $this->display();
    }
    public function gxsdcont() //高校信息--高校视点栏目页面信息获取
    {
        $id=$_GET['id'];
        $model=D(gxsd);
        $info=$model->where("id='$id'")->select();
        $this->assign("gxsdcont",$info);
        $this->display();
    }
    public function xhtz()//文件通知--学会通知页面
    {
        $model=D(xhtz);
        $info=$model->select();
        $this->assign("xhtz",$info);
        $this->display();
    }
    public function wjxz()//文件通知--文件下载页面
    {
        $model=D(wjxz);
        $info=$model->select();
        $this->assign("wjxz",$info);
        $this->display();
    }
    public function wjxzcont()//文件通知--文件下载栏目页面
    {
        $id=$_GET[id];
        $model=D(wjxz);
        $info=$model->where("id='$id'")->select();
        $this->assign("wjxzcont",$info);
        $this->display();
    }
    public function yjjj()//学术期刊--重庆高校简介
    {
        $model=D(xhqkjj);
        $info=$model->select();
        $this->assign("xhqkjj",$info);
        $this->display();
    }
    public function gqml()//学术期刊--各期目录
    {
        $model=D(xhqkml);
        $info=$model->select();
        $this->assign("xhqkml",$info);
        $this->display();
    }
    public function gqmlcont()//学术期刊--各期目录栏目
    {

        $id=$_GET[id];
        $model=D(xhqkml);
        $info=$model->where("id='$id'")->select();
        $this->assign("xhqkmlcont",$info);
        $this->display();
    }
    public function lxwm()  //联系我们
    {

        $model=D(lxwm);
        $info=$model->select();
        //dump($info);
        $this->assign("lxwm",$info);
        $this -> display();
    }
    public function gyds()//电商简介
    {

        $model=D(dsjj);
        $info=$model->select();
        //dump($info);
        $this->assign("info",$info);
        $this -> display();
    }
    public function jnds()//电商技能
    {

        $model=D(dsjn);
        $info=$model->select();
        //dump($info);
        $this->assign("info",$info);
        $this -> display();
    }
    public function jndscont()//电商技能内容
    {

        $model=D(dsjn);
        $id=$_GET['id'];
        $info=$model->where("id=$id")->select();
        //dump($info);
        $this->assign("info",$info);
        $this -> display();
    }
    public function zcfg()//政策法规
    {

        $model=D(zcfg);
        $info=$model->select();
        //dump($info);
        $this->assign("info",$info);
        $this -> display();
    }
    public function zcfgcont() //政策法规
    {

        $model=D(zcfg);
        $id=$_GET['id'];
        $info=$model->where("id=$id ")->select();
        //dump($info);
        $this->assign("info",$info);
        $this -> display();
    }
    public function video()//视频展示页面
    {
        $model=D(movie);
        $info=$model->select();
        $this->assign("video",$info);
        $this->display();
    }
    public function watch()//视频观看界面
    {
        $id=$_GET[id];
        $model=D(movie);
        $info=$model->where("id='$id'")->select();
        $model->where("id='$id'")->setInc('visitor',1);
        $this->assign("movie",$info);
        $this->display();
    }
    public function addwathch(){
            $id=$_POST[id];
            $model=D(movie);
            $model->where("id='$id'")->setInc('cont',1);

    }






}