<?php
function getzuozhe($type)
{
    $model=D(key);
    $info=$model->field("$type")->select();
    return $info;

}