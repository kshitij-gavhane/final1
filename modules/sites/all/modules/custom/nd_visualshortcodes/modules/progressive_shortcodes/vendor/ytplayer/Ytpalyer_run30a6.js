(function($){
    if($.fn.YTPlayer) {
        function fullscreenBanner() {
            var h = $(window).height();
            $('.video-fullscreen').each(function (i) {
                $(this).height(h);
                $(this).find('.video-body').height(h);
            });
        }
        $(document).ready(function(){
            //fullscreenBanner();
            $('.shortcode_yplayer .player').YTPlayer();
        });
       // $(window).resize(fullscreenBanner);

    }
}(jQuery));