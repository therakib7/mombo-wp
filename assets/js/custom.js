/*
===========================================================================
  Template Name   : Mombo
===========================================================================
*/
 
(function($){
  "use strict";
  
  // this is for background overlay effect with elementor directly tag implement not possible
  $("#tc-effect-middle").prepend('<div class="effect effect-middle gray-bg"></div>');
  $("#tc-effect-shape").prepend('<div class="effect-shape"></div>'); 
  $("#tc-effect-radius-bg").prepend('<div class="effect-radius-bg"><div class="radius-1"></div><div class="radius-2"></div><div class="radius-3"></div><div class="radius-4"></div><div class="radius-x"></div></div>');
  
	var THE = {};
	var plugin_track = mombo.directory_uri + '/assets/plugin/';
	$.fn.exists = function () {
        return this.length > 0;
    };

	/* ---------------------------------------------- /*
	 * Pre load
	/* ---------------------------------------------- */
	THE.PreLoad = function() {
    var preload = document.getElementById("loading");
    if ( preload ) {
      preload.style.display = "none"; 
    } 
	} 

	/* ---------------------------------------------- /*
	 * Header Fixed
	/* ---------------------------------------------- */
	THE.HeaderFixd = function() {
		var HscrollTop  = $(window).scrollTop();  
	    if (HscrollTop >= 100) {
	       $('header').addClass('fixed-header');
	    }
	    else {
	       $('header').removeClass('fixed-header');
	    }
	}

	/*--------------------
        * One Page
    ----------------------*/
    THE.OnePage = function(){
        $('header a[href*="#"]:not([href="#"]), .go-to a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
              var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                  if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top - 70,
                      }, 1000);
                      return false;
                  }
            }
        });
    }

    /* ---------------------------------------------- /*
	 * Search Box
	/* ---------------------------------------------- */
	THE.SearchBox = function() {
		var SearchToggle = $(".h_search")
	 	SearchToggle.on("click", function() {
	        $('.h-search-section').toggleClass("searh-form-open");
    	});
	}

	THE.HeaderHeight = function(){
		var HHeight = $('.header-height .fixed-header-bar').height()
	    $('.header-height').css("min-height", HHeight);	
  } 
  
	/* ---------------------------------------------- /*
		* accordion
	/* ---------------------------------------------- */
	THE.Accordion = function() {
		$('.accordion').each(function (i, elem) {
	       	var $elem = $(this),
	           $acpanel = $elem.find(".acco-group > .acco-des"),
	           $acsnav =  $elem.find(".acco-group > .acco-heading");
	          $acpanel.hide().first().slideDown("easeOutExpo");
	          $acsnav.first().parent().addClass("acco-active");
	          $acsnav.on('click', function () {
	            if(!$(this).parent().hasClass("acco-active")){
	              var $this = $(this).next(".acco-des");
	              $acsnav.parent().removeClass("acco-active");
	              $(this).parent().addClass("acco-active");
	              $acpanel.not($this).slideUp("easeInExpo");
	              $(this).next().slideDown("easeOutExpo");
	            }else{
	               $(this).parent().removeClass("acco-active");
	               $(this).next().slideUp("easeInExpo");
	            }
	            return false;
	        });
	    });
	}

	/*--------------------
    * Counter JS
    ----------------------*/
	 THE.Counter = function () {
	  var counter = jQuery(".counter");
	  var $counter = $('.counter');
	  if(counter.length > 0) {  
	      loadScript(plugin_track + 'counter/jquery.countTo.js', function() {
	        $counter.each(function () {
	         var $elem = $(this);                 
	           $elem.appear(function () {
	             $elem.find('.count').countTo({
	             	speed: 2000,
    				refreshInterval: 10
	             });
	          });                  
	        });
	      });
	    }
	  }


    /*--------------------
    * Typed
    ----------------------*/
    THE.typedbox = function () {
      var typedjs = jQuery('.typed');
      if(typedjs.length > 0) {  
         loadScript(plugin_track + 'typed/typed.js', function() {
           typedjs.each(function () {
              var $this = $(this);
              $this.typed({
              strings: $this.attr('data-elements').split(','),
              typeSpeed: 150, // typing speed
              backDelay: 500 // pause before backspacing
              });
           }); 
         });
      }
    }

    /*--------------------
    * OwlSlider
    ----------------------*/
    THE.Owl = function () {
      var owlslider = jQuery("div.owl-carousel");
      if(owlslider.length > 0) {  
         loadScript(plugin_track + 'owl-carousel/js/owl.carousel.min.js', function() {
           owlslider.each(function () {
            var $this = $(this),
                $items = ($this.data('items')) ? $this.data('items') : 1,
                $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
                $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
                $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
                $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
                $autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 5000,
                $smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 1000,
                $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
                $CenterSlider = ($this.data('center')) ? $this.data('center') : false,
                $stage = ($this.attr('data-stage')) ? $this.data('stage') : 0,
                $space = ($this.attr('data-space')) ? $this.data('space') : 30;    
           
                $(this).owlCarousel({
                    loop: $loop,
                    items: $items,
                    responsive: {
                      0:{items: $this.data('xx-items') ? $this.data('xx-items') : 1},
                      480:{items: $this.data('xs-items') ? $this.data('xs-items') : 1},
                      768:{items: $this.data('sm-items') ? $this.data('sm-items') : 1},
                      980:{items: $this.data('md-items') ? $this.data('md-items') : 1},
                      1200:{items: $items}
                    },
                    dots: $navdots,
                    autoplayTimeout:$autospeed,
                    smartSpeed: $smartspeed,
                    autoHeight:$autohgt,
                    center:$CenterSlider,
                    margin:$space,
                    stagePadding:$stage,
                    nav: $navarrow,
                    navText:["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],
                    autoplay: $autoplay,
                    autoplayHoverPause: true   
                }); 
           }); 
         });
      }
    }

	/* ---------------------------------------------- /*
     * lightbox gallery
    /* ---------------------------------------------- */
    THE.Gallery = function() {
    	if ($(".lightbox-gallery").exists() || $(".popup-youtube, .popup-vimeo, .popup-gmaps").exists()){
    		loadScript(plugin_track + 'magnific/jquery.magnific-popup.min.js', function() {
    			if($(".lightbox-gallery").exists()){
    				$('.lightbox-gallery').magnificPopup({
				        delegate: '.gallery-link',
				        type: 'image',
				        tLoading: 'Loading image #%curr%...',
				        mainClass: 'mfp-fade',
				        fixedContentPos: true,
				        closeBtnInside: false,
				        gallery: {
				            enabled: true,
				            navigateByImgClick: true,
				            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
				        }
				    });	
    			}
    			if ($(".popup-youtube, .popup-vimeo, .popup-gmaps").exists()) {
		            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		                  disableOn: 700,
		                  type: 'iframe',
		                  mainClass: 'mfp-fade',
		                  removalDelay: 160,
		                  preloader: false,
		                  fixedContentPos: false
		            });
		        }
    		});
    	}
    }

     /*--------------------
    * Masonry
    ----------------------*/
    THE.masonry = function () {
      // blog masonry
      jQuery(function($) {
        // init Masonry
        var $grid = $('.masonry-post').masonry({
            // options
            itemSelector: '.post',
            // columnWidth: 400
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
      });

    	var portfolioWork = $('.portfolio-content');
    	if ($(".portfolio-content").exists()){
    		loadScript(plugin_track + 'isotope/isotope.pkgd.min.js', function() {
    			if ($(".portfolio-content").exists()){
					    $(portfolioWork).isotope({
					      resizable: false,
					      itemSelector: '.grid-item',
					      layoutMode: 'masonry',
					      filter: '*'
					    });
					    //Filtering items on portfolio.html
					    var portfolioFilter = $('.filter li');
					    // filter items on button click
					    $(portfolioFilter).on( 'click', function() {
					      var filterValue = $(this).attr('data-filter');
					      portfolioWork.isotope({ filter: filterValue });
					    });
					    //Add/remove class on filter list
					    $(portfolioFilter).on( 'click', function() {
					      $(this).addClass('active').siblings().removeClass('active');
					    });
    			}
    		});
    	}
	}

	/*--------------------
        * Progress Bar 
    ----------------------*/
    THE.ProgressBar = function(){
        $(".skill-bar .skill-bar-in").each(function () {
          var bottom_object = $(this).offset().top + $(this).outerHeight();
          var bottom_window = $(window).scrollTop() + $(window).height();
          var progressWidth = $(this).attr('aria-valuenow') + '%';
          if(bottom_window > bottom_object) {
            $(this).css({
              width : progressWidth
            });
          }
        });
    }

    /*--------------------
        * pieChart
    ----------------------*/
    THE.pieChart = function () {
    	var $Pie_Chart = $('.pie_chart_in');
        if ($Pie_Chart.exists()) {
            loadScript(plugin_track + 'easy-pie-chart/jquery.easypiechart.min.js', function() {
            $Pie_Chart.each(function () {
                var $elem = $(this),
                    pie_chart_size = $elem.attr('data-size') || "160",
                    pie_chart_animate = $elem.attr('data-animate') || "2000",
                    pie_chart_width = $elem.attr('data-width') || "6",
                    pie_chart_color = $elem.attr('data-color') || "#84ba3f",
                    pie_chart_track_color = $elem.attr('data-trackcolor') || "rgba(0,0,0,0.10)",
                    pie_chart_line_Cap = $elem.attr('data-lineCap') || "round",
                    pie_chart_scale_Color = $elem.attr('data-scaleColor') || "true";
                $elem.find('span, i').css({
                    'width': pie_chart_size + 'px',
                    'height': pie_chart_size + 'px',
                    'line-height': pie_chart_size + 'px',
                    'position': 'absolute'
                });
                $elem.appear(function () {
                    $elem.easyPieChart({
                        size: Number(pie_chart_size),
                        animate: Number(pie_chart_animate),
                        trackColor: pie_chart_track_color,
                        lineWidth: Number(pie_chart_width),
                        barColor: pie_chart_color,
                        scaleColor: false,
                        lineCap: pie_chart_line_Cap,
                        onStep: function (from, to, percent) {
                            $elem.find('span.middle').text(Math.round(percent));
                        }
                    });
               });
            });

         });
      }
    }

    /*--------------------
        * Countdown
    ----------------------*/
    var $count_timer = $('.count-down');
    THE.CountTimer = function () {
        if ($count_timer.exists()) {
            loadScript(plugin_track + 'count-down/jquery.countdown.min.js', function() {
				$('#clock_time').countdown(mombo.underconstruction_time_to, function(event) {
				  var $this = $(this).html(event.strftime(''
				    + '<div class="date-box-1"><span>%D</span> <label>days</label></div>'
				    + '<div class="date-box-1"><span>%H</span> <label>hr</label></div>'
				    + '<div class="date-box-1"><span>%M</span> <label>min</label></div>'
				    + '<div class="date-box-1"><span>%S</span> <label>sec</label></div>'));
				});
            });
        }
    }
    /*--------------------
        * particles
    ----------------------*/
    THE.particles = function() {
      if ($("#particles-box").exists()){
        loadScript(plugin_track + 'particles/particles.min.js', function() {
        });
        loadScript(plugin_track + 'particles/particles-app.js', function() {
        });
      }
    }

    /*--------------------
        * Parallax
    ----------------------*/
    THE.parallax = function() {
      if ($(".parallax").exists() || $(".parallax-img").exists()){
        loadScript(plugin_track + 'jarallax/jarallax-all.js', function() {
          jarallax(document.querySelectorAll('.parallax'));
          
          jarallax(document.querySelectorAll('.parallax-img'), {
            keepImg: true,
          });
        });
      }
    }


    /*-----------------------
    * Cookis
    -------------------------*/
    // THE.Cookis = function () {
    //   loadScript(plugin_track + 'cookie/herbyCookie.js', function() {
    //     $(document).herbyCookie({
    //         btnText: "Accept",
    //         policyText: "Privacy policy",
    //         text: "We use cookies to ensure you get the best experience on our website, if you continue to browse you'll be acconsent with our",
    //         scroll: false,
    //         expireDays: 30,
    //         link: "#"
    //     });
    //   });
    // }

    /*-----------------------
    * Cookis
    -------------------------*/
    THE.tooltip = function () {
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    }

    /*-----------------------
    * main-menu
    -------------------------*/
    THE.main_menu = function () {  
      function resized() {
        var $windowWidth = $(window).width();
        if ( $windowWidth <= 991 ) { 
          $(".main-menu").prepend("<span class='tc-menu-close'></span>"); 
          $(".tc-toggle-menu").click(function(){
            $(".main-menu").addClass("menu-show"); 
          });

          $(".main-menu span").click(function() {
            $(".main-menu").removeClass("menu-show"); 
          }); 
          
          $(".main-menu ul li.menu-item-has-children").on("click", function(e) {
            e.preventDefault();    
            e.stopImmediatePropagation();

            $(this).find('ul.sub-menu').first().toggle();
            return false;
          }); 
 
          $(".techcandle-mega-id").on("click", function(e) {
            e.preventDefault();   
            e.stopImmediatePropagation();
            
            $(".techcandle-mega-menu").toggle();
          }); 

          $(document).on('click', function(e) { 
            if ( !$(e.target).closest( $(".main-menu") ).length && !$(e.target).closest( $(".tc-toggle-menu") ).length ) {
              $(".main-menu").removeClass("menu-show");  
            } 
          });
        } 
      }

      resized();
      $(window).resize(function(){ 
        resized();
      });  
		
    } 
    /*-----------------------
    * Scroll Top
    -------------------------*/
    THE.scroll_top = function () {  
		if ( mombo.scroll_top_btn ) {
			var $bodyElement = $("body"),
			$window = $(window),
			$scrollHtml = $("<a href='#top' id='scroll-top' class='top-button btn-hide'><i class='fas fa-angle-up'></i></a>");

			$bodyElement.append($scrollHtml);

			var $scrolltop = $("#scroll-top");
			$window.on("scroll", function() {
				if ($(this).scrollTop() > $(this).height()) {
					$scrolltop
						.addClass("btn-show")
						.removeClass("btn-hide");
				} else {
					$scrolltop
						.addClass("btn-hide")
						.removeClass("btn-show");
				}
			});

			var $selectorAnchor = $("a[href='#top']");
			$selectorAnchor.on("click", function() {
				$("html, body").animate({
					scrollTop: 0
				}, "normal");
				return false;
			});
		}
    }
    /* ---------------------------------------------
     Scroll top
     --------------------------------------------- */
    
    
	/* ---------------------------------------------- /*
	 * All Functions
	/* ---------------------------------------------- */
    // loadScript
	var _arr  = {};
	function loadScript(scriptName, callback) {
	    if (!_arr[scriptName]) {
	      _arr[scriptName] = true;
	      var body    = document.getElementsByTagName('body')[0];
	      var script    = document.createElement('script');
	      script.type   = 'text/javascript';
	      script.src    = scriptName;
	      // then bind the event to the callback function
	      // there are several events for cross browser compatibility
	      // script.onreadystatechange = callback;
	      script.onload = callback;
	      // fire the loading
	      body.appendChild(script);
	    } else if (callback) {
	      callback();
	    }
	};

	// Window on Load
	$(window).on("load", function(){
		THE.masonry(),
		THE.PreLoad();
	});
	// Document on Ready
	$(document).on("ready", function(){
		THE.pieChart(),
		THE.CountTimer(),
		THE.HeaderFixd(),
		THE.OnePage(),
		THE.Accordion(),
		THE.Counter(), 
		THE.Gallery(),
		THE.SearchBox(),
		THE.HeaderHeight(), 
		THE.ProgressBar(),
		THE.particles(),
		THE.parallax(),
		// THE.Cookis(),
		THE.tooltip(),
		THE.main_menu(),
        THE.main_menu(),
        THE.scroll_top(),
		THE.typedbox(),
		THE.Owl();
	});

	// Document on Scrool
	$(window).on("scroll", function(){
		THE.ProgressBar(),
		THE.HeaderFixd();
	});

	// Window on Resize
	$(window).on("resize", function(){
		THE.HeaderHeight();
	});


})(jQuery);

// Custom Js

(function ($) {
  "use strict"; // use strict to start  

  function job_ajax(form) {
      var form = $(form);
      form.submit(function (event) {
          event.preventDefault();
          var $self = $(this);
          var data = form.serialize(); 
          $.ajax({
              type: "post",
              dataType: "html",
              url: mombo.ajaxurl,
              data: data,
              beforeSend: function() { 
                $('.job-ajax').html(mombo.loading_text);
              },
              success: function (resp) {    
                $('.job-ajax').html(resp);
              }, 
          });
      });  
  }
   
  if ($('#job-list').length) { 
    job_ajax('#job-list');
  }

})(jQuery);