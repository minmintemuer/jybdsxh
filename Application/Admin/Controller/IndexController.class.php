<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class IndexController extends Controller
{
    public function dosession()//判断用户是否是通过登陆后进入后台管理的页面的，如果不是通过登陆进入的，则必须登陆，否则无法管理页面
    {
        //如果session中没有值，就退出不让他进行管理后台
        if(empty(session('user'))){
            session(null); // 清空当前的session
            $this->error("请登陆后在进行后台的管理",'login');
        }
    }

    public function login()//用户登录
    {
        session(null); // 清空当前的session
        session('user',null); // 删除user
        session('[destroy]'); // 销毁session
        $model=D(foot);
        $info=$model->where("type='ht'")->select();
        $this->assign("ht",$info);
        $this->display();
    }

    public function gologin()//用户登录
    {

        $user=$_POST['user'];
        $password=md5($_POST['password']);
        if(!empty($user) and !empty($password))
        {
            $model=D(admin);
            $info=$model->where("'$user'=user and '$password'=password")->select();
            if($info)
            {   $info=$model->field(newdate)->select();
                $data[date]=$info[0][newdate];
                $model->where("user='admin'")->save($data);
                $data1['newdate'] =date("Y-m-d H:i:s", time());
                $model->where("user='admin'")->save($data1);
                $this->success("登陆成功",'index');
                session('[start]'); // 启动session
                session('user',$user);//建立session变量
            }
            else
            {
                $this->error("用户名或密码错误",'login');
            }

        }else{
            $this->error("用户名或密码不能为空",'login');
        }
    }

    public function index()//后台主页显示
    {
        $this->dosession();
        $model=D(admin);
        $info=$model->select();
        $this->assign("admin",$info);
        $this->display();
    }

    public function banner()//横幅图片显示
    {
        $this->dosession();
        $model = D(zx);
        $info = $model->where("type='banner'")->select();//横幅图片查询
        $info1 = $model->where("type='logo'")->select();//logo图片查询
        $this->assign("logo", $info1);
        $this->assign("banner", $info);
        $this->display();
    }

    public function delbanner()//横幅图片删除
    {
        $this->dosession();
        $id = $_GET['id'];
        $model = D(zx);
        $info=$model->where("id='$id'")->field(img)->select();
        $model->where("id='$id'")->delete();
        @unlink('Public/images/'.$info[0]["img"]);
        $this->success("删除横幅成功", "banner");
    }

    public function addbanner()//横幅图片添加
    {
        $this->dosession();
        $model = D(zx);
        $data[type]='banner';
        $model->add($data);
        $info=$model->where("type='banner'")->order('id desc')->limit(1)->select();
        $this->upload('image',$model,$info[0][id],'banner');
        $this->success("添加横幅成功", "banner");
    }

    public function alterlogo()//修改logo图片
    {
        $this->dosession();
        //先删图片
        $name = $_POST['pic'];
        $model = D(zx);
        $info=$model->where("type='logo'")->select();
        @unlink('Public/images/'.$info[0]["img"]);
        $model->where("type='logo'")->delete();
        $data[type]="logo";
        $model->add($data);
        $info=$model->where("type='logo'")->select();
        $this->upload('image',$model,$info[0][id],'banner');
        $this->success("修改logo成功", "banner");
    }

    public function ggl()//公告栏信息修改
    {
        $this->dosession();
        $this->display();
    }

    public function alterggl()//修改公告信息
    {
        $this->dosession();
        $name = $_POST['content'];
        $model = D(gg);
        $model->where(1)->delete();
        $data[content]=$name;
        $model->add($data);
        $this->success("修改成功","ggl");
    }

    public function xhjj()//学会简介显示
    {
        $this->dosession();
        $this->display();
    }

    public function alterxhjj()//学会简介修改
    {
        $this->dosession();
        //先删图片
        $name = $_POST['content'];
        $model = D(xhjj);
        $info=$model->select();
        @unlink('Public/images/'.$info[0]["img"]);
        $model->where(1)->delete();
        $data['content'] = $name;
        $model->add($data);
        $info=$model->where("content='$name'")->select();
        $this->upload('image',$model,$info[0][id],'xhjj');
        $this->success("修改成功", "xhjj");
    }

    public function xhld()//学会领导显示
    {
        $this->dosession();
        $model = D(header);
        $info = $model->select();
        $this->assign("xhld", $info);
        $this->display();
    }

    public function delxhld()//学会领导删除
    { $this->dosession();
        $id = $_GET['id'];
        $model = D(header);
        $info=$model->where("id='$id'")->field(img)->select();
        $model->where("id='$id'")->delete();
        @unlink('Public/images/'.$info[0]["img"]);
        $this->success("删除成功", "xhld");
    }

    public function addxhld()//学会领导添加
    {
        $this->dosession();
        $name = $_POST['name'];
        $pro = $_POST['produce'];
        $model = D(header);
        $data['name'] = $name;
        $data['produce'] = $pro;
        $model->add($data);
        $info=$model->where("produce='$pro'")->select();
        $this->upload('image',$model,$info[0][id],'xhld');
        $this->success("添加成功",xhld);
    }

    public function wjtz()//文件通知学会通知页面显示
    {
        $this->dosession();
        $model = D(xhtz);
        $model1 = D(wjxz);
        $info1 = $model1->select();
        $info = $model->select();
        $this->assign('xhtz', $info);
        $this->assign('wjxz', $info1);
        $this->display();
    }

    public function addwjxz()//添加文件
    {
        $this->dosession();
        $name = $_POST['title'];
        $content = $_POST['content'];
        $model = D(wjxz);
        $data['lanmu'] = $name;
        $data['content'] = $content;
        $data['time'] = date("Y-m-d H:i:s", time());
        $model->add($data);
        $info=$model->where("content='$content'")->select();
        $this->uploadfile('file',$model,$info[0][id],'wjtz');
        $this->success("添加成功", "wjtz");
    }

    public function delwjxz()//删除文件
    {
        $this->dosession();
        $id = $_GET['id'];
        $model = D(wjxz);
        $info=$model->where("id='$id'")->field(file)->select();
        $model->where("id='$id'")->delete();
        @unlink('Public/file/'.$info[0]["file"]);
        $this->success("删除成功", "wjtz");
    }

    public function alterxhtz()//修改学会通告
    {
        $this->dosession();
        $name = $_POST['name'];
        $content = $_POST['content'];
        $model = D(xhtz);
        $model->where(1)->delete();
        $data['content'] = $content;
        $data['title'] = $name;
        $data['time'] = date("Y-m-d H:i:s", time());
        $model->add($data);
        $this->success("修改成功", "wjtz");
    }

    public function dsjn()//显示电商技能页面
    {
        $this->dosession();
        $model = D(dsjn);
        $info = $model->select();
        $this->assign("dsjn", $info);
        $this->display();
    }

    public function alterdsjj()//修改电商简介
    {
        $this->dosession();
        $content = $_POST['content'];
        $model = D(dsjj);
        $model->where(1)->delete();
        $data['content'] = $content;
        $model->add($data);
        $this->success('修改电商简介成功', 'dsjn');
    }

    public function deldsjn()//删除电商技能
    {
        $this->dosession();
        $id = $_GET['id'];
        $model = D(dsjn);
        $info=$model->where("id='$id'")->field(img)->select();
        $model->where("id='$id'")->delete();
        @unlink('Public/images/'.$info[0]["img"]);
        $this->success("删除成功", "dsjn");
    }

    public function adddsjn()//添加电商技能
    {
        $this->dosession();
        $name = $_POST['title'];
        $content = $_POST['content'];
        $model = D(dsjn);
        $data['title'] = $name;
        $data['content'] = $content;
        $data['date'] = date("Y-m-d H:i:s", time());
        $model->add($data);
        $info=$model->where("content='$content'")->select();
        $this->upload('image',$model,$info[0][id],'dsjn');
        $this->success("添加成功", "dsjn");

    }

    public function yqlj()//友情链接页面显示
    {
        $this->dosession();
        $model = D(a);
        $info = $model->select();
        $this->assign("yqlj", $info);
        $this->display();
    }

    public function delyqlj()//删除友情链接
    {
        $this->dosession();
        $id = $_GET['id'];
        $model = D(a);
        $model->where("id='$id'")->delete();
        $this->success("删除成功", "yqlj");
    }

    public function addyqlj()//添加友情链接
    {
        $this->dosession();
        $name = $_POST['name'];
        $href = $_POST['address'];
        $model = D(a);
        $data['name'] = $name;
        $data['href'] = $href;
        $model->add($data);
        $this->success("添加友情链接成功", 'yqlj');

    }

    public function xsqk()//学术期刊显示
    {
        $this->dosession();
        $this->display();
    }

    public function alterxsqk()//修改学术期刊
    {
        $this->dosession();
        $content = $_POST['content'];
        $model = D(xhqkjj);
        $model->where(1)->delete();
        $data['content'] = $content;
        $model->add($data);
        $this->success("简介修改成功", 'xsqk');
    }

    public function gxsd()//高校视点显示
    {
        $this->dosession();
        $model = D(xhzx);
        $model1 = D(gxsd);
        $info = $model->select();
        $info1 = $model1->select();
        $this->assign("xhzx", $info);
        $this->assign("gxsd", $info1);
        $this->display();
    }

    public function delxhzx()//删除学会咨询
    {
        $this->dosession();
        $id = $_GET['id'];
        $model = D(xhzx);
        $info=$model->where("id='$id'")->field(img)->select();
        $model->where("id='$id'")->delete();
        @unlink('Public/images/'.$info[0]["img"]);
        $this->success("删除成功", "gxsd");

    }

    public function delgxsd()//删除高校视点
    {
        $this->dosession();
        $id = $_GET['id'];
        $model = D(gxsd);
        $info=$model->where("id='$id'")->field(img)->select();
        $model->where("id='$id'")->delete();
        @unlink('Public/images/'.$info[0]["img"]);
        $this->success("删除成功", "gxsd");

    }

    public function addgxsd()//添加高校视点
    {
        $this->dosession();
        $model=D("gxsd");
        $title=$_POST[title];
        $content=$_POST[content];
        $data['lanmu'] = $title;
        $data['content'] = $content;
        $data['time'] =date("Y-m-d H:i:s", time());
        $model->add($data);
        $info=$model->where("content='$content'")->select();
        $this->upload('image',$model,$info[0][id],'gxsd');
        $this->success("添加成功","gxsd");

    }

    public function addxhzx()//添加学会咨询
    {
        $this->dosession();
        $model=D("xhzx");
        $title=$_POST[title];
        $content=$_POST[content];
        $data['lanmu'] = $title;
        $data['content'] = $content;
        $data['time'] =date("Y-m-d H:i:s", time());
        $model->add($data);
        $info=$model->where("content='$content'")->select();
        $this->upload('image',$model,$info[0][id],'gxsd');
        $this->success("添加成功","gxsd");



    }

    public function upload($ftype = 'image',$model,$id,$address)//上传文件
     {
        //这里划分一下允许上传的文件类型，与3.1相比，文件类型不再是数组类型了，而是字符串，这是个区别。
        if ($ftype == 'image') {
            $ftype = 'jpg,gif,png,jpeg,bmp';
        } else if ($ftype == 'file') {
            $ftype = 'zip,rar,doc,xls,ppt';
        }
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 6 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)
            'exts' => $ftype, //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => '', //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => 'Public/images/', //保存根路径
            'savePath' => '', //保存路径
        );
        /* 调用文件上传组件上传文件 */
        //实例化上传类，传入上面的配置数组
        $this->uploader = new Upload($setting, 'Local');
        $info = $this->uploader->upload($_FILES);
        //这里判断是否上传成功
        if ($info) {
            //// 上传成功 获取上传文件信息
            foreach ($info as &$file) {
                //拼接出上传目录
                $file['rootpath'] =  ltrim($setting['rootPath'], ".");
                //拼接出文件相对路径
                $file['filepath'] = $file['rootpath'] . $file['savepath'] . $file['savename'];
            }
            $data['img'] =$info[pic][savename];
            $model->where("id='$id'")->save($data);
            //这里可以输出一下结果,相对路径的键名是$info['upload']['filepath']
            $this->success("记录添加成功",$address);
            exit();
        } else {
            //输出错误信息
            exit($this->uploader->getError());
        }
    }

    public function uploadfile($ftype = 'file',$model,$id,$address)//上传文件
    {
        //这里划分一下允许上传的文件类型，与3.1相比，文件类型不再是数组类型了，而是字符串，这是个区别。
        if ($ftype == 'image') {
            $ftype = 'jpg,gif,png,jpeg,bmp';
        } else if ($ftype == 'file') {
            $ftype = 'zip,rar,doc,docx,xls,ppt,pptx,xlsx,pdf,txt,psd';
        }
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 0, //上传的文件大小限制 (0-不做限制)
            'exts' => $ftype, //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => '', //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => 'Public/file/', //保存根路径
            'savePath' => '', //保存路径
            'upload_max_filesize'=>0,
        );
        /* 调用文件上传组件上传文件 */
        //实例化上传类，传入上面的配置数组
        $this->uploader = new Upload($setting, 'Local');
        $info = $this->uploader->upload($_FILES);
        //这里判断是否上传成功
        if ($info) {
            //// 上传成功 获取上传文件信息
            foreach ($info as &$file) {
                //拼接出上传目录
                $file['rootpath'] =  ltrim($setting['rootPath'], ".");
                //拼接出文件相对路径
                $file['filepath'] = $file['rootpath'] . $file['savepath'] . $file['savename'];
            }
            $data['file'] =$info[file][savename];
            $model->where("id='$id'")->save($data);
            //这里可以输出一下结果,相对路径的键名是$info['upload']['filepath']
            $this->success("记录添加成功",$address);
            exit();
        } else {
            //输出错误信息
            exit($this->uploader->getError());
        }
    }

    public function updatepassword()//修改密码
    {
        $this->dosession();
        $user=$_POST['user'];
        $oldpassword=md5($_POST['oldpassword']);
        $data['password']=md5($_POST['newpassword']);
        $model=D(admin);
        $info=$model->where("'$oldpassword'=password and '$user'=user")->select();
        if($info)
        {
            $model->where("'$user'=user")->save($data);
            $this->success("修改密码成功",'index');
        }else{
           $this->error("原密码或者用户名错误",'xgmm');
        }
    }

    public function lxwm()//联系我们页面显示
    {
        $this->dosession();
        $model=D(lxwm);
        $info=$model->select();
        $this->assign("lxwm",$info);
        $this->display();
    }

    public function dellxwm()//删除联系我们
    {
        $this->dosession();
        $id=$_GET[id];
        $model=D(lxwm);
        $model->where("id='$id'")->delete();
        $this->success("删除成功","lxwm");
    }

    public function addlxwm()//添加联系我们
    {
        $this->dosession();
        $data[title]=$_POST[title];
        $data[content]=$_POST[content];


        if(!empty($data))
        {
            $model=D(lxwm);
            $info=$model->add($data);
            if($info)
            {
                $this->success("添加成功","lxwm");
            }else{
                $this->error("添加失败","lxwm");
            }
        }
    }

    public  function zcfg()//在后台显示政策法规内容
    {
        $this->dosession();
        $model=D(zcfg);
        $info=$model->select();
        $this->assign('zcfg',$info);
        //dump($info);
        $this->display();
    }

    public  function delzcfg()//删除政策法规内容
    {
        $this->dosession();
        $model=D(zcfg);
        $info=$model->where("id='$_GET[id]'")->delete();
        if($info){
            $this->success("删除政策成功！","zcfg");
        }
        else{
            $this->error("删除政策失败","zcfg");
        }
    }

    public  function addzcfg()//添加政策法规
    {
        $this->dosession();
        $data['title']=$_POST['title'];
        $data['content']=$_POST['content'];
        $data['date']=date("Y-m-d");
        if(!empty($data)){
            $model=D(zcfg);
            $info=$model->add($data);
            if($info){
                $this->success("添加政策法规成功","zcfg");
            }
            else{
                $this->error("添加数据失败！","zcfg");
            }
        }else{
            $this->error("添加数据不能为空！","zcfg");
        }
    }

    public  function gqml()//在后台显示各期目录
    {
        $this->dosession();
        $model=D(xhqkml);
        $info=$model->select();
        $this->assign('gqml',$info);
        //dump($info);
        $this->display();
    }

    public function delgqml()//删除各期目录
    {
        $this->dosession();
        $id=$_GET['id'];
        $model=D(xhqkml);
        $model->where("id='$id'")->delete();
        $this->success("删除成功","gqml");
    }

    public function addgqml()//添加各期目录
    {
        $this->dosession();
        $title=$_POST['title'];
        $content=$_POST['content'];
        $model=D(xhqkml);
        $data[lanmu]=$title;
        $data[content]=$content;
        $data['time'] =date("Y-m-d H:i:s", time());
        $model->add($data);
        $this->success("添加成功","gqml");
    }

    public  function foot()//在后台显示注脚
    {
        $this->dosession(); // 判断用户是否通过登陆进入后台管理
        $model=D(foot);
        $info=$model->select();
        $this->assign('foot',$info);
        // dump($info);
        $this->display();
    }

    public  function addfoot()//修改注脚
    {
        $this->dosession(); // 判断用户是否通过登陆进入后台管理
        $data[content]=$_POST[qtfoot];//前台
        $data2[content]=$_POST[htfoot];//后台
        if($data[content] != ""){
            $model=D(foot);
            $info=$model->where("type='qt'")->save($data);
            if($info){
                $this->success("修改前台的页脚成功",'foot');
            }else{
                $this->error("修改失败",'foot');
            }
        }
        if($data2[content]!=""){
            $model=D(foot);
            $info=$model->where("type='ht'")->save($data2);
            if($info){
                $this->success("修改后台的页脚成功",'foot');
            }else{
                $this->error("修改失败",'foot');
            }
        }

    }

    public  function key()//在后台显示网站的作者，描述，关键字
    {
        $this->dosession(); // 判断用户是否通过登陆进入后台管理
        $model=D(key);
        $info=$model->select();
        $this->assign('key',$info);
        //dump($info);
        $this->display();
    }

    public  function addkey()//在后台显示网站的作者，描述，关键字
    {
        $this->dosession(); // 判断用户是否通过登陆进入后台管理
        $data[zuozhe]=$_POST[zuozhe];//作者
        $data1[miaoshu]=$_POST[miaoshu];//描述
        $data2[key]=$_POST[keyword];
        $model=D(key);
        if($data[zuozhe] != ""){
            $info=$model->where("id=1")->save($data);
            if($info){
                $this->success("修改网页作者成功",'key');
            }else{
                $this->error("修改失败",'key');
            }
        }
        if($data1[miaoshu]!=""){
            $info=$model->where("id=1")->save($data1);
            if($info){
                $this->success("修改网页描述成功",'key');
            }else{
                $this->error("修改失败",'key');
            }
        }
        if($data2[key]!=""){
            $info=$model->where("id=1")->save($data2);
            if($info){
                $this->success("修改网页关键字成功",'key');
            }else{
                $this->error("修改失败",'key');
            }
        }
    }

    public function xgmm()//修改密码显示
    {
        $this->dosession();
        $this->display();
    }

    public function video()//视频页面显示
    {
        $this->dosession();
        $model=D(movie);
        $info=$model->select();
        $this->assign("video",$info);
        $this->display();
    }

    public function delvideo()//删除视频
    {
        $this->dosession();
        $id=$_GET[id];
        $model=D(movie);
        $info=$model->where("id='$id'")->field("img,movie")->select();
        @unlink('Public/images/'.$info[0]["img"]);
        @unlink('Public/video/'.$info[0]["movie"]);
        $model->where("id='$id'")->delete();
        $this->success("删除成功","video");
    }

    public function addvideo()//添加视频
    {
        $this->dosession();
        $data[title] = $_POST['title'];
        $data[author]=$_POST[author];
        $data[content] = $_POST['content'];
        $data['date'] = date("Y-m-d");
        $model = D(movie);
        $model->add($data);
        $info=$model->where("content='$data[content]'")->select();
        $this->uploadmovie('movie',$model,$info[0][id]);
        $this->upload('image',$model,$info[0][id],'video');
        $this->success("添加成功", "video");
    }

    public function uploadmovie($ftype = 'image',$model,$id)//上传视频
    {
        //这里划分一下允许上传的文件类型，与3.1相比，文件类型不再是数组类型了，而是字符串，这是个区别。
        if ($ftype == 'image') {
            $ftype = 'jpg,gif,png,jpeg,bmp';
        } else if ($ftype == 'movie') {
            $ftype = 'avi,rmvb,rm,asf,divx,mpg,mpeg,mpe,wmv,mp4,mkv,vob,gif';
        }
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 0, //上传的文件大小限制 (0-不做限制)
            'exts' => $ftype, //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => '', //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => 'Public/video/', //保存根路径
            'savePath' => '', //保存路径
        );
        /* 调用文件上传组件上传文件 */
        //实例化上传类，传入上面的配置数组
        $this->uploader = new Upload($setting, 'Local');
        $info = $this->uploader->upload($_FILES);
        //这里判断是否上传成功
        if ($info) {
            //// 上传成功 获取上传文件信息
            foreach ($info as &$file) {
                //拼接出上传目录
                $file['rootpath'] =  ltrim($setting['rootPath'], ".");
                //拼接出文件相对路径
                $file['filepath'] = $file['rootpath'] . $file['savepath'] . $file['savename'];
            }
            $data['movie'] =$info[movie][savename];
            $model->where("id='$id'")->save($data);
            //这里可以输出一下结果,相对路径的键名是$info['upload']['filepath']
        } else {
            //输出错误信息
            $this->uploader->getError();
        }
    }

    public function altertel()//修改tel
    {
        $tel=$_POST[tel];
        $model=D("zx");
        $data[img]=$tel;
        $model->where("type='tel'")->save($data);
        $this->success("修改成功","foot");
    }

}
