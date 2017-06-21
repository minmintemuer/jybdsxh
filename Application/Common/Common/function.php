<?php
/**
 * Created by PhpStorm.
 * User: WuLiming
 * Date: 2017/4/18
 * Time: 21:54
 */
//获取公司电话
function getTel(){
    $model=D(zx);
    $info=$model->where("type='tel'")->select();
    return $info[0][img];
}
//获取logo
function getLogo(){
    $model=D(zx);
    $info=$model->where("type='logo'")->select();
    return $info[0][img];
}
function getXhjj(){
    $model=D(xhjj);
    $info=$model->select();
    return $info;
}
function getfoot()
{
    $model=D(foot);
    $info=$model->where("type='qt'")->select();
    return $info[0][content];
}
