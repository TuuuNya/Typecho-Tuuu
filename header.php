<div class="site-header">

    <h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
    <div class="site-navigation">
        <div class="nav-menu">
            <ul>
                <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <li><a href="#">文章</a></li>
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
                    <input type="search" name="search" id="search-field" placeholder="type and hit enter …">
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