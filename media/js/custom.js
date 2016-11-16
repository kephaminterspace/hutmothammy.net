
/**********************/

/**
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var button = document.getElementById( 'topnav' ).getElementsByTagName( 'div' )[0],
	    menu   = document.getElementById( 'topnav' ).getElementsByTagName( 'ul' )[0];

	if ( undefined === button )
		return false;

	// Hide button if menu is missing or empty.
	if ( undefined === menu || ! menu.childNodes.length ) {
		button.style.display = 'none';
		return false;
	}

	button.onclick = function() {
		if ( -1 == menu.className.indexOf( 'srt-menu' ) )
			menu.className = 'srt-menu';

		if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
			button.className = button.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( ' toggled-on', '' );
		} else {
			button.className += ' toggled-on';
			menu.className += ' toggled-on';
		}
	};
} )();

/* =========================================================
Flexslider Slide show
============================================================ */
$(window).load(function(){
  $('.flexslider').flexslider({
	animation: "slide",
	controlNav: false,
	directionNav: true,
	start: function(slider){
	  $('body').removeClass('loading');
	}
  });
});

/* =========================================================
Tab Page
============================================================ */
function tab_gold_select(i)
  {
	  document.getElementById("tab_1").className=" ";        
	  document.getElementById("tab_2").className=" ";
	  document.getElementById("tab_"+i).className="cm-act";
	  if (document.getElementById("div_gold0"+i)==null)
	  {
		  return;
	  }
	  if (document.getElementById("div_gold01")!=null){
		  document.getElementById("div_gold01").style.display="none";
	  }
	  if (document.getElementById("div_gold02")!=null){
		  document.getElementById("div_gold02").style.display="none";
	  }


	  if (document.getElementById("div_gold0"+i)!=null){
		  document.getElementById("div_gold0"+i).style.display="";
	  }
  }


/* =========================================================
Scroll to top
============================================================ */
jQuery(document).ready(function(){

    // hide #back-top first
    jQuery("a#back-top").hide();
	
    // fade in #back-top
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 200) {
                jQuery('a#back-top').fadeIn();
            } else {
                jQuery('a#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        jQuery('a#back-top').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

});



