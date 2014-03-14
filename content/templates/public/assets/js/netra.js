$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	  $( "#cart" ).load( baseUrl + 'cart/total' );
	  $('a.ajax-cart').click(function(){
	  	$.get( $(this).attr('href'), function( data ) {
	  		$( "#cart" ).load( baseUrl + 'cart/total' );
		  var show = (data) ? 'Sticker sudah masuk ke keranjang belanja' : 'ada kesalahan silahkan ulangi kembali';
		  alert(show);
		});
	  	return false;
	  });
	});
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".navbar-inverse").css("background-color", "#1a1a1c");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".navbar-inverse").css("background-color", "transparent");
    }
});
