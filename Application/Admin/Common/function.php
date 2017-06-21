<?php
//获取active
function getActive($str){

    $a=substr($str,strrpos($str,'/')+1);
    return $a;
}

