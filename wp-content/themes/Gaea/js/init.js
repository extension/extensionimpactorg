jQuery(function($){
	"use strict";
var GAEA = window.GAEA || {};
GAEA.megaMenu = function() {
        jQuery('.megamenu-sub-title').closest('ul.sub-menu').wrapInner('<div class="row" />').wrapInner('<div class ="megamenu-container container" />').wrapInner('<li />');
        jQuery('.megamenu-container').closest('li.menu-item-has-children').addClass('megamenu');
        var $class = '';
		jQuery(".megamenu-container").each(function(index, elem) {
    var numImages = $(this).find('.row').children().length;
	switch (numImages)
        {
            case 1:
                $class = 12;
                break;
            case 2:
                $class = 6;
                break;
            case 3:
                $class = 4;
                break;
            case 4:
                $class = 3;
                break;
            default:
                $class = 2;
        }
		$(this).find('.row').find('.col-md-3').each(function() {
            jQuery(this).removeClass('col-md-3').addClass('col-md-' + $class);
        })
		//$('.megamenu-container .row .div:has(.col-md-3)').addClass('col-md-' + $class).removeClass('col-md-3');
		//jQuery(this).find('.row').children().addClass('col-md-' + $class).removeClass('col-md-3');
    // do whatever processing you wanted to with numImages here
});
}
/* ==================================================
	Contact Form Validations
================================================== */
	GAEA.ContactForm = function(){
		$('.contact-form').each(function(){
			var formInstance = $(this);
			formInstance.submit(function(){
		
			var action = $(this).attr('action');
		
			$("#message").slideUp(750,function() {
			$('#message').hide();
		
			$('#submit')
				 .after('<img src="' + $('#image_path').val() + '/images/assets/ajax-loader.gif" class="loader" />')
				.attr('disabled','disabled');
		
			$.post(action, {
				name: $('#name').val(),
				email: $('#email').val(),
				phone: $('#phone').val(),
				comments: $('#comments').val(),
                subject: $('#subject').val(),
                admin_email: $('#admin_email').val(),
			},
				function(data){
					document.getElementById('message').innerHTML = data;
					$('#message').slideDown('slow');
					$('.contact-form img.loader').fadeOut('slow',function(){$(this).remove()});
					$('#submit').removeAttr('disabled');
					if(data.match('success') != null) $('.contact-form').slideUp('slow');
		
				}
			);
			});
			return false;
		});
		});
	}
/* ==================================================
	Responsive Nav Menu
================================================== */
	GAEA.navMenu = function() {
		// Responsive Menu Events
		$('#menu-toggle').click(function(){
			$(this).toggleClass("opened");
			$(".main-navigation").slideToggle();
			return false;
		});
		$(window).resize(function(){
			if($("#menu-toggle").hasClass("opened")){
				$(".main-navigation").css("display","block");
			} else {
				$("#menu-toggle").css("display","none");
			}
		});
	}
/* ==================================================
	Scroll to Top
================================================== */
	GAEA.scrollToTop = function(){
		var windowWidth = $(window).width(),
			didScroll = false;
	
		var $arrow = $('#back-to-top');
	
		$arrow.click(function(e) {
			$('body,html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
			e.preventDefault();
		})
	
		$(window).scroll(function() {
			didScroll = true;
		});
	
		setInterval(function() {
			if( didScroll ) {
				didScroll = false;
	
				if( $(window).scrollTop() > 200 ) {
					$arrow.fadeIn();
				} else {
					$arrow.fadeOut();
				}
			}
		}, 250);
	}
/* ==================================================
   Accordion
================================================== */
	GAEA.accordion = function(){
		var accordion_trigger = $('.accordion-heading.accordionize');
		
		accordion_trigger.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				accordion_trigger.find('.active').addClass('inactive');          
				accordion_trigger.find('.active').removeClass('active');   
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}
/* ==================================================
   Toggle
================================================== */
	GAEA.toggle = function(){
		var accordion_trigger_toggle = $('.accordion-heading.togglize');
		
		accordion_trigger_toggle.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}
/* ==================================================
   Tooltip
================================================== */
	GAEA.toolTip = function(){ 
		$('a[data-toggle=tooltip]').tooltip();
	}
/* ==================================================
   Twitter Widget
================================================== */
	GAEA.TwitterWidget = function() {
		$('.twitter-widget').each(function(){
			var twitterInstance = $(this); 
			var twitterTweets = twitterInstance.attr("data-tweets-count") ? twitterInstance.attr("data-tweets-count") : "1"
			twitterInstance.twittie({
            	dateFormat: '%b. %d, %Y',
            	template: '<li><i class="fa fa-twitter"></i> {{tweet}} <span class="date">{{date}}</span></li>',
            	count: twitterTweets,
            	hideReplies: true
        	});
		});
	}
/* ==================================================
   Flex Slider
================================================== */
	GAEA.FlexSlider = function() {
		$('.flexslider').each(function(){
				var carouselInstance = $(this); 
				var carouselAutoplay = carouselInstance.attr("data-autoplay") == 'yes' ? true : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselDirection = carouselInstance.attr("data-direction") ? carouselInstance.attr("data-direction") : "horizontal"
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"
				var carouselSpeed = carouselInstance.attr("data-speed") ? carouselInstance.attr("data-speed") : "5000"
				var carouselPause = carouselInstance.attr("data-pause") == 'yes' ? true : false
				
				carouselInstance.flexslider({
					animation: carouselStyle,
					easing: "swing",               
					direction: carouselDirection,       
					slideshow: carouselAutoplay,              
					slideshowSpeed: carouselSpeed,         
					animationSpeed: 600,         
					initDelay: 0,              
					randomize: false,            
					pauseOnHover: carouselPause,       
					controlNav: carouselPagination,           
					directionNav: carouselArrows,            
					prevText: "",          
					nextText: ""
				});
		});
	}
/* ==================================================
   PrettyPhoto
================================================== */
	GAEA.PrettyPhoto = function() {
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			  opacity: 0.5,
			  social_tools: "",
			  deeplinking: false
		});
	}
/* ======
/* ==================================================
   Animated Counters
================================================== */
	GAEA.Counters = function() {
		$('.counters').each(function () {
			$(".timer .count").appear(function() {
			var counter = $(this).html();
			$(this).countTo({
				from: 0,
				to: counter,
				speed: 2000,
				refreshInterval: 60,
				});
			});
		});
		
			$(".countdown .timer .count").appear(function() {
			var counter = $(this).html();
			$(this).countTo({
				from: 0,
				to: counter,
				speed: 2000,
				refreshInterval: 60,
				});
			});
		
	}
/* ==================================================
   SuperFish menu
================================================== */
	GAEA.SuperFish = function() {
		$('.sf-menu').superfish({
			  delay: 200,
			  animation: {opacity:'show', height:'show'},
			  speed: 'fast',
			  cssArrows: false,
			  disableHI: true
		});
		$(".main-navigation > ul > li:has(ul)").find("a:first").append(" <i class='fa fa-angle-down'></i>");
		$(".main-navigation > ul > li > ul > li:has(ul)").find("a:first").append(" <i class='fa fa-angle-right'></i>");
		$(".main-navigation > ul > li > ul > li > ul > li:has(ul)").find("a:first").append(" <i class='fa fa-angle-right'></i>");
	}
/* ==================================================
   IsoTope Portfolio
================================================== */
		GAEA.IsoTope = function() {	
		$("ul.sort-source").each(function() {
			var source = $(this);
			var destination = $("ul.sort-destination[data-sort-id=" + $(this).attr("data-sort-id") + "]");
			if(destination.get(0)) {
				$(window).load(function() {
					destination.isotope({
						itemSelector: ".grid-item",
						layoutMode: 'sloppyMasonry'
					});
					source.find("a").click(function(e) {
						e.preventDefault();
						var $this = $(this),
							filter = $this.parent().attr("data-option-value");
						source.find("li.active").removeClass("active");
						$this.parent().addClass("active");
						destination.isotope({
							filter: filter
						});
						if(window.location.hash !== "" || filter.replace(".","") !== "*") {
							self.location = "#" + filter.replace(".","");
						}
						return false;
					});
					$(window).bind("hashchange", function() {
						var hashFilter = "." + location.hash.replace("#",""),
							hash = (hashFilter === "." || hashFilter === ".*" ? "*" : hashFilter);
						source.find("li.active").removeClass("active");
						source.find("li[data-option-value='" + hash + "']").addClass("active");
						destination.isotope({
							filter: hash
						});
					});
					var hashFilter = "." + (location.hash.replace("#","") || "*");
					var initFilterEl = source.find("li[data-option-value='" + hashFilter + "'] a");
					if(initFilterEl.get(0)) {
						source.find("li[data-option-value='" + hashFilter + "'] a").click();
					} else {
						source.find("li:first-child a").click();
					}
				});
			}
		});
		$(window).load(function() {
			var IsoTopeCont = $(".isotope-grid");
			IsoTopeCont.isotope({
				itemSelector: ".grid-item",
				layoutMode: 'sloppyMasonry'
			});
			if ($(".grid-holder").length > 0){	
				var $container_blog = $('.grid-holder');
				$container_blog.isotope({
					itemSelector : '.grid-item',
					layoutMode: 'sloppyMasonry'
				});
		
				$(window).resize(function() {
					var $container_blog = $('.grid-holder');
					$container_blog.isotope({
						itemSelector : '.grid-item',
						layoutMode: 'sloppyMasonry'
					});
				});
			}
		});
	}
/* ==================================================
   Nivo Slider
================================================== */
	GAEA.NivoSlider = function() {
		$('.nivoslider').each(function(){
				var nivoInstance = $(this); 
				var nivoAutoplay = nivoInstance.attr("data-autoplay") == 'no' ? true : false
				var nivoPagination = nivoInstance.attr("data-pagination") == 'yes' ? true : false
				var nivoArrows = nivoInstance.attr("data-arrows") == 'yes' ? true : false
				var nivoThumbs = nivoInstance.attr("data-thumbs") == 'yes' ? true : false
				var nivoEffect = nivoInstance.attr("data-effect") ? nivoInstance.attr("data-effect") : "random"
				var nivoSlices = nivoInstance.attr("data-slices") ? nivoInstance.attr("data-slices") : "15"
				var nivoanimSpeed = nivoInstance.attr("data-animSpeed") ? nivoInstance.attr("data-animSpeed") : "500"
				var nivopauseTime = nivoInstance.attr("data-pauseTime") ? nivoInstance.attr("data-pauseTime") : "3000"
				var nivoPause = nivoInstance.attr("data-pauseonhover") == 'yes' ? true : false
				
				nivoInstance.nivoSlider({
					effect: nivoEffect,
					slices: nivoSlices,
					animSpeed: nivoanimSpeed,
					pauseTime: nivopauseTime,
					directionNav: nivoArrows,
					controlNav: nivoPagination,
					controlNavThumbs: nivoThumbs,
					pauseOnHover: nivoPause,
					manualAdvance: nivoAutoplay
				});
		});
	}
/* ==================================================
   Sticky Navigation
================================================== */	
	GAEA.StickyNav = function() {
		$(".header-v1 .lower-header, .header-v2 .lower-header").sticky({topSpacing:0});
		$(".full-width-menu").sticky({topSpacing:0});
	}
/* ==================================================
   Init Functions
================================================== */
$(document).ready(function(){
	GAEA.megaMenu();
	GAEA.ContactForm();
	GAEA.scrollToTop();
	GAEA.accordion();
	GAEA.toggle();
	GAEA.toolTip();
	GAEA.navMenu();
	GAEA.TwitterWidget();
	GAEA.FlexSlider();
	GAEA.PrettyPhoto();
	GAEA.SuperFish();
	GAEA.Counters();
	GAEA.IsoTope();
	if(urlajax_gaea.sticky==1) {
	GAEA.StickyNav(); }
	GAEA.NivoSlider();
	//$.scrollTo( $(this.hash).position().top-$('.lower-header').height()-40, 800, { easing:'easeOutQuint' });
});
// COUNTDOWN TIMER
// FrontPage Time Counter
var expiryDate = $('#counter').data('date');
var target = new Date(expiryDate),
finished = false,
availiableExamples = {
	set15daysFromNow: 15 * 24 * 60 * 60 * 1000,
	set5minFromNow  : 5 * 60 * 1000,
	set1minFromNow  : 1 * 60 * 1000
};
function callback(event) {
	var $this = $(this);
	switch(event.type) {
		case "seconds":
		case "minutes":
		case "hours":
		case "days":
		case "weeks":
		case "daysLeft":
			$this.find('div span#'+event.type).html(event.value);
			if(finished) {
				$this.fadeTo(0, 1);
				finished = false;
			}
			break;
		case "finished":
			$this.fadeTo('slow', .5);
			finished = true;
			break;
	}
}
if(urlajax_gaea.countdown==1) {
$('#counter').countdown(target.valueOf(), callback); }
// Pages Design Functions

/* Added in v1.5 */
$(".search-module-trigger").click(function(e){
	e.stopPropagation();
	$(".search-module-opened").toggle();
 	$('.cart-module-opened').hide();
	e.preventDefault();
});
$(".search-module-opened").click(function(e){
	e.stopPropagation();
});
$("#cart-module-trigger").click(function(e){
	e.stopPropagation();
	$(".cart-module-opened").toggle();
 	$('.search-module-opened').hide();
	e.preventDefault();
});
$(".cart-module-opened").click(function(e){
	e.stopPropagation();
});
$(document).click(function(){
 	$('.search-module-opened, .cart-module-opened').hide();
});
/* End added in v1.5 */

// Any Button Scroll to section
$('.scrollto').click(function(){
	$.scrollTo( this.hash, 800, { easing:'easeOutQuint' });
	return false;
});
$('.secondary-bar .scrollto').click(function(){
	$.scrollTo( $(this.hash).position().top-$('.lower-header').height()-40, 800, { easing:'easeOutQuint' });
	return false;
});

// FITVIDS
$(".fw-video, .sidr-inner").fitVids();
$(document).ready(function(){
// Gallery Flex list height
var liMaxHeight = -1;
var length=$(".format-gallery .slides").length;
if(length>0)
{
   $(".format-gallery .slides").each(function(index) {
      var $ul = $(this);
      $($ul).find("li").each(function(index) {
      if ($(this).outerHeight() > liMaxHeight) {
        liMaxHeight = $(this).outerHeight();
    }
      });
       $($ul).css('height',liMaxHeight)
       $($ul).find('a').css('height',liMaxHeight)
      });
}

// Centering the dropdown menus
$(".main-navigation ul li").mouseover(function() {
	 var the_width = $(this).find("a").width();
	 var child_width = $(this).find("ul").width();
	 var width = parseInt((child_width - the_width)/2);
	$(this).find("ul").css('left', -width);
});
//Footer Widget Title
$('.footer-widget .widgettitle').html(function(index, curHTML) {
 	var text = curHTML.split(/[\s-]/),
	 newtext = '<span class="accent-color">' + text.pop() + '</span>';
 	return text.join(' ').concat(' ' + newtext);
});
// Double border
$(".double-border").each(function(){
	$(this).append('<div class="accent-bg"></div><div class="accent-bg"></div>');
});
});
var BCOLS = function(){
	var $tallestCol;
	$('.border-cols').each(function(){
	   $tallestCol = 0;
	   $(this).find('div').
	each(function(){
			($(this).height() > $tallestCol) ? $tallestCol = $(this).height() : $tallestCol = $tallestCol;
		});   
		if($tallestCol == 0) $tallestCol = 'auto';
		$(this).find('div').css('height',$tallestCol);
	});
}
//Donation Form
$(".donate-paypal").click(function(){
	CauseName = $(this).parents(".cause-item").find("h3").html();
	$(".payment-to-cause").html(CauseName);
});
$('select[name="donation amount"]').change(function(){
  if ($(this).val() === "Custom")
  {
    $('.custom-donate-amount').show();
	$('input[name="Custom Donation Amount"]').focus();
  }
  else
  {
    $('.custom-donate-amount').hide();
  }
});
// Listing Item Height
var LIH = function() {
	$(".events-listing .upcoming-events li").each(function(){
		var ELH = $(this).height();
		$(this).find(".event-details-btn").css("line-height",ELH+16+'px');
	});
}
	
// Home border column
var BCHF = function() {
	var BCH = $(".home .border-col").height();
	var BCS = $(".home .sidebar").height();
	var BCRS = BCS + 90
	if(BCH < BCS){
		$(".home .border-col").css("height",BCRS);
	}
}
// Featured Projects
var FB = function() {
	var FPB = $(".featured-project-block").width();
	var FPBT = $(".featured-project-block").find(".project-title").height();
	var FPBTO = FPBT + 8
	$(".project-overlay").css("width",FPB);
	$(".project-overlay .project-cat").css("line-height",FPBTO+'px');
}
// Image Hover icons for gallery items
$(document).ready(function(){
	BCHF();
	FB();
	LIH();
	BCOLS();
});
$(window).load(function(){
	$(".format-image").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-search'></i></span>");
	});
	$(".format-standard").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-plus'></i></span>");
	});
	$(".format-video").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-play'></i></span>");
	});
	$(".format-link").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-link'></i></span>");
	});
});
$(window).resize(function(){
	BCHF();
	FB();
	LIH();
	BCOLS();
});
$(".cust-counter" ).wrapAll( "<section class=\"counters padding-tb45 accent-color text-align-center\"><div class=\"container\"><div class=\"row\">");
// List Styles
$('a.external').prepend('<i class="fa fa-external-link"></i> ');
// Heading Styles
$(".title, .widget-title").each(function(){
	$(this).wrapInner( "<div class='title-border'></div>");
});
if(urlajax_gaea.animations==1) {
// Animation Appear
$("[data-appear-animation]").each(function() {
	var $this = $(this);
  
	$this.addClass("appear-animation");
  
	if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {
  
		$this.appear(function() {
  
			var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
  
			if(delay > 1) $this.css("animation-delay", delay + "ms");
			$this.addClass($this.attr("data-appear-animation"));
  
			setTimeout(function() {
				$this.addClass("appear-animation-visible");
			}, delay);
  
		}, {accX: 0, accY: -150});
  
	} else {
  
		$this.addClass("appear-animation-visible");
	}
});
}
// Animation Progress Bars
$("[data-appear-progress-animation]").each(function() {
	var $this = $(this);
	$this.appear(function() {
		var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
		if(delay > 1) $this.css("animation-delay", delay + "ms");
		$this.addClass($this.attr("data-appear-animation"));
		setTimeout(function() {
			$this.animate({
				width: $this.attr("data-appear-progress-animation")
			}, 1500, "easeOutQuad", function() {
				$this.find(".progress-bar-tooltip").animate({
					opacity: 1
				}, 500, "easeOutQuad");
			});
		}, delay);
	}, {accX: 0, accY: -50});
});
// Parallax Jquery Callings
if(!Modernizr.touch) {
	$(window).bind('load', function () {
		parallaxInit();						  
	});
}
function parallaxInit() {
	$('.parallax1').parallax("50%", 0.1);
	$('.parallax2').parallax("50%", 0.1);
	$('.parallax3').parallax("50%", 0.1);
	$('.parallax4').parallax("50%", 0.1);
	$('.parallax5').parallax("50%", 0.1);
	$('.parallax6').parallax("50%", 0.1);
	$('.parallax7').parallax("50%", 0.1);
	$('.parallax8').parallax("50%", 0.1);
	/*add as necessary*/
}
// Window height/Width Getter Classes
var wheighter = $(window).height();
var wwidth = $(window).width();
$(".wheighter").css("height",wheighter);
$(".wwidth").css("width",wwidth);
$(window).resize(function(){
	var wheighter = $(window).height();
	var wwidth = $(window).width();
	$(".wheighter").css("height",wheighter);
	$(".wwidth").css("width",wwidth);
});
});