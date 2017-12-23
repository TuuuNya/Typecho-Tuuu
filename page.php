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
    <link rel="stylesheet" href="<?php $this->options->themeUrl('plugins/share.js/css/share.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/fontello.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <!--正文宽度-->
    <style type="text/css">.layout-fixed { max-width: 740px; }</style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/atom-one-light.min.css">

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
<div class="site-main">
    <div class="site-content">
        <div class="blog-area">
            <?php while($this->next()): ?>
                <article class="post">
                    <div class="post-thumbnail" style="background-image: url(<?php
                    if (get_postthumb($this)){
                        echo get_postthumb($this);
                    } else {
                        $rand_num = rand(1,2);
                        $this->options->themeUrl("img/${rand_num}.jpeg");
                    }
                    ?>);">
                        <header class="entry-header">
                            <div class="layout-fixed">
                                <div class="entry-meta">
                                <span class="cat-links">
                                    <?php $this->tags('', true, ''); ?>
                                </span>
                                </div>
                                <h1 class="entry-title">
                                    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                                </h1>
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
                            </div>
                        </header>
                    </div>

                    <div class="layout-fixed">
                        <div class="entry-content">
                            <?php $this->content(); ?>

                            <div class="social-share"></div>
                            <aside class="about-author">
                                <h3>WRITTEN BY</h3>
                                <div class="author-bio">
                                    <div class="author-img">
                                        <a href="<?php $this->author->permalink(); ?>"><?php echo $this->author->gravatar(94); ?></a>
                                    </div>
                                    <div class="author-info">
                                        <h4 class="author-name">
                                            <?php $this->author(); ?>
                                        </h4>
                                        <p>
                                            <?php $this->options->description() ?>
                                        </p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>

                </article>
            <?php endwhile; ?>
            <div class="layout-fixed">
                <?php include('comments.php'); ?>
            </div>


        </div>


    </div>
</div>
<!--main end-->


<!--footer-->
<?php include('footer.php')?>
<!--footer end-->