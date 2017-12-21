<?php

//获取题图
function get_postthumb($obj) {
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );  //通过正则式获取图片地址
    if(isset($matches[1][0])){
        $thumb = $matches[1][0];
        return $thumb;
    }else{
        return false;
    }
}
