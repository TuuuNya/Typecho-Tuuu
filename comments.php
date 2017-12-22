<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    }
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
    ?>

    <li id="<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->_levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <article class="comment">
            <header class="comment-meta comment-author vcard">
                <?php $comments->gravatar('94', ''); ?>
                <cite class="fn">
                    <a href="#" class="url"><?php $comments->author(); ?></a>
                </cite>
                <a href="#"><?php $comments->date(); ?></a>
            </header>

            <!--<p class="comment-awaiting-moderation">经过博主审核后显示该评论</p>-->

            <section class="comment-content comment">
                <?php $comments->content(); ?>
            </section>

            <div class="reply">
                <?php $comments->reply(); ?>
                <span>↓</span>
            </div>

        </article>

        <ol class="children">
            <?php if ($comments->children) { ?>
                <div class="comment-children">
                    <?php $comments->threadedComments($options); ?>
                </div>
            <?php } ?>
        </ol>

    </li>

<?php } ?>



<div id="comments" class="comments-area">
    <h2 class="comments-title">
        已有 <?php $this->commentsNum('%d'); ?> 条评论
    </h2>
    <ol class="comment-list">
        <?php $this->comments()->to($comments); ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('&laquo;', '&raquo;'); ?>
    </ol>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">
            评论 <small><?php $comments->cancelReply(); ?></small>
        </h3>
        <form action="<?php $this->commentUrl() ?>" method="post" class="comment-form validate-form">
            <p class="comment-form-comment">
                <label for="comment">评论内容</label>
                <textarea id="comment" name="text" cols="45" rows="8" maxlength="65525" aria-required="true" required="required" class="required"><?php $this->remember('text'); ?></textarea>
            </p>
            <!-- 如果当前用户已经登录 -->
            <?php if($this->user->hasLogin()): ?>
                <!-- 显示当前登录用户的用户名以及登出连接 -->
                <p>已登录为 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>.
                    <a href="<?php $this->options->index('Logout.do'); ?>" title="Logout">注销 &raquo;</a></p>

                <!-- 若当前用户未登录 -->
            <?php else: ?>
            <p class="comment-form-author">
                <label for="author">
                    昵称
                    <span class="required">*</span>
                </label>
                <input type="text" value="<?php $this->remember('author'); ?>" id="author" name="author" size="30" maxlength="245" required="required" class="required">
            </p>
            <p class="comment-form-email">
                <label for="email">
                    邮箱
                    <span class="required">*</span>
                </label>
                <input type="email" value="<?php $this->remember('mail'); ?>" id="email" name="mail" size="30" maxlength="100" required="required" class="required email">
            </p>
            <p class="comment-form-url">
                <label for="url">
                    网址
                    <span class="required">*</span>
                </label>
                <input type="url" value="<?php $this->remember('url'); ?>" id="url" name="url" size="30" maxlength="200">
            </p>
            <?php endif; ?>
            <p class="form-submit">
                <?php $security = $this->widget('Widget_Security'); ?>
                <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>">
                <input type="submit" class="submit" value="提交评论">
            </p>
        </form>
    </div>
    <?php else: ?>
        <h3 style="text-align:center"><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>