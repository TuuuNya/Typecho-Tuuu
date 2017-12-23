<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' | '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/fontello.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <!--正文宽度-->
    <style type="text/css">.layout-fixed { max-width: 740px; } h1{font-size: 2.20em; letter-spacing: -1px;}</style>

    <?php $this->header(); ?>
</head>
<body>

<div class="site-header">

    <h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
    <div class="site-navigation">
        <div class="nav-menu">
            <ul>
                <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <li><a href="#">归档</a></li>
                <li><a href="#">关于</a></li>
                <li><a href="#">友链</a></li>
            </ul>
        </div>
    </div>
    <div class="search-container easing">
        <a class="icon-search-toggle toggle-link"></a>
        <div class="search-box">
            <form action="#">
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

<!--main-->
<div id="main" class="site-main">
    <div id="primary" class="content-area">
        <div id="content" class="site-content">
            <div class="layout-fixed">
                <div class="blog-simple">
                    <header class="entry-header">
                        <h1 class="entry-title">
                            Searched for <i>"<?php $this->archiveTitle(array(
                                    'search'    =>  _t('%s'),
                                ), '', ''); ?>"</i>
                        </h1>
                    </header>
                    <ul>
                        <?php if ($this->have()): ?>
                        <?php while($this->next()): ?>
                        <li>
                            <article class="post hentry">
                                <header class="entry-header">
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <?php $this->category(''); ?>
                                        </span>
                                    </div>
                                    <h1 class="entry-title">
                                        <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                                    </h1>
                                    <p><?php $this->excerpt(200, '...'); ?></p>
                                    <div class="entry-meta">
                                        <span class="entry-date">
                                            <i class="icon-clock"></i>
                                            <a href="#"><?php $this->date('Y-m-d'); ?></a>
                                        </span>
                                        <span class="comment-link">
                                            <i class="icon-comment"></i>
                                            <a href="#"><?php $this->commentsNum('%d'); ?> 条评论</a>
                                        </span>
                                        <span class="author">
                                            <i class="icon-user-outline"></i>
                                            <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                                        </span>
                                    </div>
                                </header>
                            </article>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>

                    <div class="navigation">
                        <div class="nav-previous">
                            &nbsp;<?php $this->pageLink('<span class="meta-nav">←</span>上一页'); ?>
                        </div>

                        <div class="nav-next">
                            &nbsp;<?php $this->pageLink('下一页<span class="meta-nav">→</span>','next'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main end-->


<!--footer-->
<?php include('footer.php')?>
<!--footer end-->