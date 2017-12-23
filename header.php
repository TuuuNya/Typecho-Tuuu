<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $this->options->title(); ?> | <?php $this->options->description() ?></title>
    <?php if ($this->is('post')) : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('plugins/share.js/css/share.min.css') ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/fontello.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <?php if ($this->is('post')) : ?>
    <!--正文宽度-->
    <style type="text/css">.layout-fixed { max-width: 740px; }</style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/atom-one-light.min.css">
    <?php endif; ?>

    <?php $this->header(); ?>
</head>
<body>

<div class="site-header">

    <h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
    <div class="site-navigation">
        <div class="nav-menu">
            <ul>
                <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <div class="search-container easing">
        <a class="icon-search-toggle toggle-link"></a>
        <div class="search-box">
            <form action="">
                <label>
                    <span class="screen-reader-text">搜索：</span>
                    <input type="text" name="s" id="search-field" placeholder="type and hit enter …">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>
        </div>
    </div>
    <div class="social-container">
        <div class="textwidget">
            <ul class="social">
                <li><a href="#" target="_blank" class="icon-weibo"></a></li>
                <li><a href="#" target="_blank" class="icon-wechat"></a></li>
                <li><a href="#" target="_blank" class="icon-github-circled"></a></li>
            </ul>
        </div>
    </div>

</div>