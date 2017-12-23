<footer class="site-footer">
    <div class="site-info">
        <p>Migration and optimization <i class="icon-heart"></i> <em>by</em> <a href="#">王松_Tuuu</a></p>
    </div>
</footer>

<script src="<?php $this->options->themeUrl('js/jquery.min.js') ?>"></script>
<script src="<?php $this->options->themeUrl('js/main.js') ?>"></script>
<script src="<?php $this->options->themeUrl('plugins/share.js/js/social-share.min.js') ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>

</body>
</html>