<?php

function themeConfig($form) {
    $socialWechat = new Typecho_Widget_Helper_Form_Element_Text('socialWechat', NULL, NULL, _t('微信'), _t('请输入微信二维码图片地址'));
    $form->addInput($socialWechat);
    $socialGithub = new Typecho_Widget_Helper_Form_Element_Text('socialGithub', NULL, NULL, _t('Github'), _t('请输入 Github 地址'));
    $form->addInput($socialGithub);
    $socialWeibo = new Typecho_Widget_Helper_Form_Element_Text('socialWeibo', NULL, NULL, _t('Weibo'), _t('请输入微博地址'));
    $form->addInput($socialWeibo);
    $siteStat = new Typecho_Widget_Helper_Form_Element_Textarea('siteStat', NULL, NULL, _t('统计代码'), _t('在这里填入网站统计代码'));
    $form->addInput($siteStat);
}

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