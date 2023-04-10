$(document).on('click','.audio_control',function(){
	var player = $('#audioSource')[0];
	if(player.paused == true){
		player.play();
		$(this).removeClass('ac_paused');
	}
	else{
		player.pause();
		$(this).addClass('ac_paused');
	}
});

$(function(){
	$('.hs_image').addClass('bounceInUp');
	$('.atm_wrap').addClass('bounceInRight');

});

function fadeInElements(ele){
	var count = 0;
	var elements = ele.find('*');

	var animate = setInterval(function(){
		if(count <= elements.length){
			$(elements[count]).addClass('view');
			count++;
		}
		else{
			clearInterval(animate);
		}
	},500);
}

$(document).ready(function() {
	popup.init();
	$(document).on('click','.popup_close',function(){
		var videoID = $(this).parents('.popup').attr('id');
		$('#'+videoID+'_iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
	});
});

$(window).load(function(){
	$('.nav').css('display','block');
	$('.popup').css('display','block');
		fadeInElements($('.dw_image'));
});

var popup = {
	el:{
  },
  data:{
		currentPopup:''
  },
  init:function(){
    popup.bindUIActions();

  },
  bindUIActions:function(){
    $(document).on("click",'.popup_open',function(){
			popup.open($(this).data('popup'));
		});
    $(document).on("click",'.popup_close',function(){
			popup.close($(this).parents('.popup').attr('id'));
		});
		$(document).on("click",'.popup_overlay',function(){
			popup.close(popup.data.currentPopup);
		});
  },
	open:function(popupID){
		popup.data.currentPopup=popupID;
		$('#'+popupID).addClass('open');
		$('#'+popupID).find('.popup_focus').focus();
		$('.popup_overlay').addClass('open');
	},
	close:function(popupID){
		popup.data.currentPopup='';
		$('#'+popupID).removeClass('open');
		$('.popup_overlay').removeClass('open');
	},
};

$(document).mouseup(function(e){

    var container = $('.auto_close');
    var opener = $('.opener');
    if (!container.is(e.target) && container.has(e.target).length === 0
       && !opener.is(e.target) && opener.has(e.target).length === 0
       ){
        container.removeClass('open');
        $('.opener').removeClass('active');
        $('.overlay').removeClass('open');
    }
});

$(document).on('click','.opener',function(){
    $this = $(this);
    $this.toggleClass('active');
    $('.opener').not($this).removeClass('active');
    var toOpen = $('.'+$this.data('open'));
    toOpen.toggleClass('open');
    $('.auto_close').not(toOpen).removeClass('open');
    toOpen.find('.open_focus').focus();
    if($this.data('overlay')){
      $('.overlay').toggleClass('open');
    }
});

function log(input){
    console.log(input);
}

$(function(){
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });
});
