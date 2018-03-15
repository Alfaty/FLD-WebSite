/*! .isOnScreen() returns bool */
jQuery.fn.isOnScreen = function(){

    var win = jQuery(window);

    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};

/*----------------------------------------------------
/* Scroll to top
/*--------------------------------------------------*/
jQuery(document).ready(function($) {
	//move-to-top arrow
	jQuery("body").prepend("<div id='move-to-top' class='animate '><i class='fa fa-angle-up'></i></div>");
	var scrollDes = 'html,body';  
	/*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
	if(navigator.userAgent.match(/opera/i)){
		scrollDes = 'html';
	}
	//show ,hide
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 160 && !jQuery('#site-footer').isOnScreen()) {
			jQuery('#move-to-top').addClass('filling').removeClass('hiding');
		} else {
			jQuery('#move-to-top').removeClass('filling').addClass('hiding');
		}
	});
	// scroll to top when click 
	jQuery('#move-to-top').click(function () {
		jQuery(scrollDes).animate({ 
			scrollTop: 0
		},{
			duration :500
		});
	});
});

/*----------------------------------------------------
/* Make all anchor links smooth scrolling
/*--------------------------------------------------*/
jQuery(document).ready(function($) {
 // scroll handler
  var scrollToAnchor = function( id, event ) {
	// grab the element to scroll to based on the name
	var elem = $("a[name='"+ id +"']");
	// if that didn't work, look for an element with our ID
	if ( typeof( elem.offset() ) === "undefined" ) {
	  elem = $("#"+id);
	}
	// if the destination element exists
	if ( typeof( elem.offset() ) !== "undefined" ) {
	  // cancel default event propagation
	  event.preventDefault();

	  // do the scroll
	  // also hide mobile menu
	  var scroll_to = elem.offset().top;
	  $('html, body').removeClass('mobile-menu-active').animate({
			  scrollTop: scroll_to
	  }, 600, 'swing', function() { if (scroll_to > 46) window.location.hash = id; } );
	}
  };
  // bind to click event
  $("a").click(function( event ) {
	// only do this if it's an anchor link
	var href = $(this).attr("href");
	if ( href && href.match("#") && href !== '#' ) {
	  // scroll to the location
	  var parts = href.split('#'),
		url = parts[0],
		target = parts[1];
	  if ((!url || url == window.location.href.split('#')[0]) && target)
		scrollToAnchor( target, event );
	}
  });
});

/*----------------------------------------------------
/* Responsive Navigation
/*--------------------------------------------------*/
jQuery(document).ready(function($){
	$('#primary-navigation').append('<div id="mobile-menu-overlay" />');

	$('.toggle-mobile-menu').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('body').toggleClass('mobile-menu-active');

		if ( $('body').hasClass('mobile-menu-active') ) {
			if ( $(document).height() > $(window).height() ) {
				var scrollTop = ( $('html').scrollTop() ) ? $('html').scrollTop() : $('body').scrollTop();
				$('html').addClass('noscroll').css( 'top', -scrollTop );
			}
			$('#mobile-menu-overlay').fadeIn();
		} else {
			var scrollTop = parseInt( $('html').css('top') );
			$('html').removeClass('noscroll');
			$('html,body').scrollTop( -scrollTop );
			$('#mobile-menu-overlay').fadeOut();
		}
	});
}).on('click', function(event) {

	var $target = jQuery(event.target);
	if ( ( $target.hasClass("fa") && $target.parent().hasClass("toggle-caret") ) ||  $target.hasClass("toggle-caret") ) {// allow clicking on menu toggles
		return;
	}
	jQuery('body').removeClass('mobile-menu-active');
	jQuery('html').removeClass('noscroll');
	jQuery('#mobile-menu-overlay').fadeOut();
});

/*----------------------------------------------------
/*  Dropdown menu
/* ------------------------------------------------- */
jQuery(document).ready(function($) {
	
	function mtsDropdownMenu() {
		var wWidth = $(window).width();
		if(wWidth > 865) {
			$('#navigation ul.sub-menu, #navigation ul.children').hide();
			var timer;
			var delay = 100;
			$('#navigation li').hover( 
			  function() {
				var $this = $(this);
				timer = setTimeout(function() {
					$this.children('ul.sub-menu, ul.children').slideDown('fast');
				}, delay);
				
			  },
			  function() {
				$(this).children('ul.sub-menu, ul.children').hide();
				clearTimeout(timer);
			  }
			);
		} else {
			$('#navigation li').unbind('hover');
			$('#navigation li.active > ul.sub-menu, #navigation li.active > ul.children').show();
		}
	}

	mtsDropdownMenu();

	$(window).resize(function() {
		mtsDropdownMenu();
	});
});

/*---------------------------------------------------
/*  Vertical menus toggles
/* -------------------------------------------------*/
jQuery(document).ready(function($) {

	$('.widget_nav_menu, #navigation .menu').addClass('toggle-menu');
	$('.toggle-menu ul.sub-menu, .toggle-menu ul.children').addClass('toggle-submenu');
	$('.toggle-menu ul.sub-menu').parent().addClass('toggle-menu-item-parent');

	$('.toggle-menu .toggle-menu-item-parent').append('<span class="toggle-caret"><i class="fa fa-plus"></i></span>');

	$('.toggle-caret').click(function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
	});
});

