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

//获取上一篇
function prev_post($archive)
{
    $db = Typecho_Db::get();
    $content = $db->fetchRow($db->select()
        ->from('table.contents')
        ->where('table.contents.created < ?', $archive->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $archive->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_DESC)
        ->limit(1));
    if ($content)
    {
        $content = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($content);
        return $content;
    }
    else
    {
        return false;
    }
}

//获取下一篇
function next_post($archive)
{
    $db = Typecho_Db::get();
    $content = $db->fetchRow($db->select()
        ->from('table.contents')
        ->where('table.contents.created > ? AND table.contents.created < ?', $archive->created, Helper::options()->gmtTime)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $archive->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_ASC)
        ->limit(1));
    if ($content)
    {
        $content = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($content);
        return $content;
    }
    else
    {
        return false;
    }
}