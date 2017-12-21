<?php
/**
 * 移植并优化自Readme主题
 *
 * @package Tuuu Theme
 * @author 王松_Tuuu
 * @version 1.0.0
 * @link http://www.hackersb.cn
 */
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $this->options->title(); ?> | <?php $this->options->description() ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/fontello.css') ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <?php $this->header(); ?>
</head>
<body>

<!--header-->
<?php include('header.php'); ?>
<!--header end-->

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
                                    <?php $this->category(''); ?>
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
                </article>
            <?php endwhile; ?>

        </div>

        <div class="layout-fixed">
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
<!--main end-->

<!--footer-->
<?php include('footer.php'); ?>
<!--footer end-->

<script src="<?php $this->options->themeUrl('js/jquery.min.js') ?>"></script>
<script src="<?php $this->options->themeUrl('js/main.js') ?>"></script>
</body>
</html>