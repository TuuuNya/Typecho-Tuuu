(function($){
    // 搜索相关
    $('.icon-search-toggle').click(function(e) {
        e.stopPropagation();
        $('html').toggleClass('is-search-toggled-on');
        $('html').removeClass('is-social-toggled-on');
        if($('html').hasClass('is-search-toggled-on')) {
            $('.search-container input[name="s"]').trigger('focus');
        }
    });
    $('.search-container *').click(function(e) {
        e.stopPropagation();
    });
    // 在其他地方点击关闭
    $(document).click (function (e) {
        $('html').removeClass('is-search-toggled-on');
    });
})(jQuery);