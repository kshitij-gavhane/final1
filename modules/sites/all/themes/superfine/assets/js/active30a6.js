(function ($) {
    'use strict';

    $(document).ready(function () {

        var window_width = $(window).width();

        if ($.fn.waypoint) {
            $('.animated').css('opacity', '0');
            $('.animated').waypoint(function () {
                $(this).addClass('fadeInUp');
                $('.animated.fadeInUp').css({
                    opacity: 1
                });
            }, {
                offset: '90%'
            });
        }


        // singlePrice Hover effect
        $('.singlePrice').on('mouseenter', function () {
            $('.singlePrice').removeClass('active');
            $(this).addClass('active');
        });

        // singlePlan Hover effect
        $('.singlePlan').on('mouseenter', function () {
            $(' .singlePlan').removeClass('active');
            $(this).addClass('active');
        });

        if ($.fn.owlCarousel) {
            var hero_slider = $('.hero_slider');
            hero_slider.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 7000,
                margin: 30,
                nav: true,
                navText: ['<i class="icofont icofont-simple-left"></i>', '<i class="icofont icofont-simple-right"></i>']
            });


            hero_slider.on('translate.owl.carousel', function () {
                $(this).find('.homeImg').removeClass('fadeInLeft animated').css('opacity', '0');
                $(this).find('.homeSlider').removeClass('fadeInRight animated').css('opacity', '0');
            });
            hero_slider.on('translated.owl.carousel', function () {
                $(this).find('.homeImg').addClass('fadeInLeft animated').css('opacity', '1');
                $(this).find('.homeSlider').addClass('fadeInRight animated').css('opacity', '1');
            });

            var arrowPos;
            if (window_width > 1199) {
                var arrowPos = (window_width - 1140) / 2;
            } else if (window_width > 991 && window_width < 1200) {
                var arrowPos = (window_width - 940) / 2;
            } else if (window_width > 767 && window_width < 992) {
                var arrowPos = (window_width - 720) / 2;
            } else {
                $('.hero_slider .owl-nav div').remove();
            }

            $('.hero_slider .owl-nav div.owl-next').css('right', '-' + arrowPos + 'px');
            $('.hero_slider .owl-nav div.owl-prev').css('left', '-' + arrowPos + 'px');




        }

        if ($.fn.owlCarousel) {
            var tstSlider2 = $('.tstSlider2');
            tstSlider2.owlCarousel({
                items: 3,
                loop: true,
                autoplay: true,
                autoplayTimeout: 7000,
                margin: 30,
                responsive: {
                    0: {
                        items: 1,
                        margin: 0
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        }

        if ($.fn.owlCarousel) {
            //tstSlider
            var tstSlider = $('.tstSlider');
            tstSlider.owlCarousel({
                items: 1,
                dots: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 7000
            });

            tstSlider.on('translate.owl.carousel', function () {
                $(this).find('.owl-item .singleSlide .tstTxt p').removeClass('fadeInLeft animated').css('opacity', '0');
                $(this).find('.owl-item .singleSlide .tstTxt > div').removeClass('fadeInUp animated').css('opacity', '0');
                $(this).find('.owl-item .singleSlide .tstImg').removeClass('zoomInRight animated').css('opacity', '0');
            });
            tstSlider.on('translated.owl.carousel', function () {
                $(this).find('.owl-item.active .singleSlide .tstTxt p').addClass('fadeInLeft animated').css('opacity', '1');
                $(this).find('.owl-item.active .singleSlide .tstTxt > div').addClass('fadeInUp animated').css('opacity', '1');
                $(this).find('.owl-item.active .singleSlide .tstImg').addClass('zoomInRight animated').css('opacity', '1');
            });
        }

        if ($.fn.owlCarousel) {
            //brandSlider
            var brandSlider = $('.brandSlider');
            brandSlider.owlCarousel({
                items: 5,
                loop: true,
                dots: false,
                nav: false,
                margin: 50,
                autoplay: true,
                smartSpeed: 600,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 3,
                        margin: 20
                    },
                    480: {
                        items: 4,
                        margin: 30
                    },
                    768: {
                        items: 5,
                        margin: 50
                    }
                }
            });
        }

        //searchForm
        $('.cartSearch li.search a').on("click", function () {
            $('.searchForm').toggleClass('active');
        });
        $('.searchForm i').on("click", function () {
            $('.searchForm').toggleClass('active');
        });


        //disable blank anchor tag
        $("a[href='#']").on("click", function ($) {
            $.preventDefault();
        });

        //add to cart
        $('.addCart').on("click", function () {
            $(this).toggleClass('clicked');
        });

        // submenu parent add class
        $('.dropdown-menu').each(function () {
            $(this).closest('li').addClass('dropdown');
        });
        $('.mega-menu').each(function () {
            $(this).closest('li').addClass('static');
        });


        if (window_width < 992) {
            $('.dropdown ').on('click', function () {
                var id = $(this).attr('id');

                if(id=='anout-di'){
                    $(".dropdown:not(#anout-di)").removeClass('open');
                    $(this).toggleClass('open')
                }else if(id=='collab'){
                     $(".dropdown:not(#collab)").removeClass('open');
                     $(this).toggleClass('open')
                }else if(id=='opport'){
                     $(".dropdown:not(#opport)").removeClass('open');
                     $(this).toggleClass('open')
                }else if(id=='di-initiatives'){
                     $(".dropdown:not(#di-initiatives)").removeClass('open');
                     $(this).toggleClass('open')
                }else{
                    $('.dropdown').removeClass('open');
                }
                
                // $('.dropdown').removeClass('open');
               // $(this).toggleClass('open')
                //$('.dropdown').removeClass('mb-none');
                //  $('.dropdown a').removeClass('active');
                //$('.dropdown-menu').css('display',' ');
                // $('.dropdown-menu').removeAttr('style');

                // $(this).siblings('ul').slideToggle();
                // $(this).toggleClass('active');
                // $(this).closest('li').toggleClass('mb-none');

            });
        }


        $('.innerCart li.duration .fa-caret-left').on("click", function () {
            var num = parseInt($(this).siblings('span').text());
            var num = num - 1;
            if (num == 0) {
                return;
            }
            $(this).siblings('span').text(num);

        });
        $('.innerCart li.duration .fa-caret-right').on("click", function () {
            var num = parseInt($(this).siblings('span').text());
            var num = num + 1;
            $(this).siblings('span').text(num);
        });

        $('.singleCart > i').on("click", function () {
            $(this).parent().fadeOut(function () {
                $(this).remove();
            });
        });


        $('.layoutBg .singleBg').each(function () {
            var bgImg = $(this).find('img').attr('src');
            $(this).css('background-image', 'url(' + bgImg + ')');
            $(this).on("click", function () {
                $('body').css('background-image', 'url(' + bgImg + ')')
            });
        });

        $('.layoutBtn .boxed').on("click", function () {
            $('.mainWrap').addClass('active');
            $('.layoutBtn a').removeClass('active');
            $(this).addClass('active');
            $('.layout_bg_wrap').slideDown();
        });
        $('.layoutBtn .wide').on("click", function () {
            $('.mainWrap').removeClass('active');
            $('.layoutBtn a').removeClass('active');
            $(this).addClass('active');
            $('.layout_bg_wrap').slideUp();
        });

        $('.colorTheme .singleTheme').each(function () {
            var linkHref = $(this).find('span').text();
            $(this).on("click", function () {
                $('.theme-link link').attr('href', linkHref);


                $('.colorTheme .singleTheme').removeClass('active');
                $(this).addClass('active');
            });
        });

        $('.styler .icon').on("click", function () {
            $('.styler').toggleClass('active');
        });



        if (window_width > 991) {
            $('.dropdown').on('mouseenter', function () {
                $(this).addClass('open');
            });
            $('.dropdown').on('mouseleave', function () {
                $(this).removeClass('open');
            });
        }

        $('.preloader').fadeOut().remove();

    });

    var color_x = ($('.v2').length) ? "#288feb" : "#ffffff";



    /* ---- particles.js config ---- */

    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 2,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 60,
                    "size_min": 0.1,
                    "sync": false
                }
            },

            "line_linked": {
                "enable": true,
                "distance": 200,
                "color": color_x,
                "opacity": .5,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "grab"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 140,
                    "line_linked": {
                        "opacity": .5
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
})(jQuery);




   jQuery(document).ready(function ($) {

                    $('#hide').click(function () {
                        $('.content-toggle').css('height', '670');
                        $('.read-more').removeClass('expanded');
                        $('.read-more').removeClass('collapse');
                        $('#hide').addClass('collapse');
                        $('#show').addClass('expanded');
                    })
                    $('#show').click(function () {
                        $('.content-toggle').css('height', 'auto');
                        $('.read-more').removeClass('expanded');
                        $('.read-more').removeClass('collapse');
                        $('#hide').addClass('expanded');
                        $('#show').addClass('collapse');
                    })
                });

                jQuery(document).ready(function ($) {

                    $('#hide').click(function () {
                        $('.content-toggle').css('height', '489');
                        $('.menu-content a').removeClass('expanded');
                        $('.menu-content a').removeClass('collapse');
                        $('#hide').addClass('collapse');
                        $('#show').addClass('expanded');
                    })
                    $('#show').click(function () {
                        $('.content-toggle').css('height', 'auto');
                        $('.menu-content a').removeClass('expanded');
                        $('.menu-content a').removeClass('collapse');
                        $('#hide').addClass('expanded');
                        $('#show').addClass('collapse');
                    })
                });