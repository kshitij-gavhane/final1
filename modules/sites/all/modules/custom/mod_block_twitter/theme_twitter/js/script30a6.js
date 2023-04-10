
jQuery(document).ready(function($) {
       
	/* -------------------------------------------------------------------------
		TWITTER FEED
	------------------------------------------------------------------------- */

	$.fn.lvTwitterFeed = function(){
		if ( $.fn.tweet ) {

			var $this = $(this),
			feedId = $this.data( 'id' ),
			feedLimit = parseInt( $this.data( 'limit' ) ),
			feedEl = $this.find( '.twitter-feed' );
			var base_url = $('.url-declare').attr('url');
			//console.log(location.href.substring(0,location.href.lastIndexOf("/")+1));
			// INIT TWEET JS
			feedEl.tweet({
				username: feedId,
				modpath: location.href.substring(0,location.href.lastIndexOf("index.html")+1) + "?q=mod_block_twitter/tweet",
				count: feedLimit,
                template: '{text}{time}',
				loading_text: '<span class="c-loading-anim"><span></span></span>'
			});

		}
	};


	// Twiter For 

	if ( $.fn.lvTwitterFeed ) {
		$( '.twitter_site' ).each(function(){
			$(this).lvTwitterFeed();
		});
	}

});