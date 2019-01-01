$(document).ready(function(){
  //parallax
  var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});
  new ScrollMagic.Scene({triggerElement: "#parallax1"})
      .setTween("#parallax1 > div", {y: "80%", ease: Linear.easeNone})
      .addTo(controller);
  new ScrollMagic.Scene({triggerElement: "#parallax2"})
      .setTween("#parallax2 > div", {y: "80%", ease: Linear.easeNone})
      .addTo(controller);
	//enable bs tooltip
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
  $('nav#primary a').hover(
    function () {
      $(this).prev('h1').show();
    },
    function () {
      $(this).prev('h1').hide();
    }
  );
	//animate socials icon
	$("#facebook").hover(function(){
		if($(this).hasClass("hovered")){
      $(this).removeClass("hovered");
			$(this).css({
				"transform":"translate(0px,0px)"
			});
		}else {
			$(this).addClass("hovered");
			$(this).css({
				"transform":"translate(7px,0px)"
			});
		}
	});
	$("#twitter").hover(function(){
		if($(this).hasClass("hovered")){
      $(this).removeClass("hovered");
			$(this).css({
				"transform":"translate(0px,0px)"
			});
		}else {
			$(this).addClass("hovered");
			$(this).css({
				"transform":"translate(7px,0px)"
			});
		}
	});
	$("#google").hover(function(){
		if($(this).hasClass("hovered")){
      $(this).removeClass("hovered");
			$(this).css({
				"transform":"translate(0px,0px)"
			});
		}else {
			$(this).addClass("hovered");
			$(this).css({
				"transform":"translate(7px,0px)"
			});
		}
	});
	//open socials-link
	$('#facebook').click(function(){
		document.getElementById('facebook-link').click();
	});
  $('#default-footer-facebook').click(function(){
    document.getElementById('facebook-link').click();
  });
  //navigasi
  //Set navigation dots to an active state as the user scrolls
  function redrawDotNav(){
    var section1Top =  0;
    var section2Top =  $('#news').offset().top;
    var section3Top =  $('#about').offset().top;
    var section4Top =  $('#login').offset().top;
    $('nav#primary a').removeClass('active');
    if($(window).scrollTop() >= section1Top && $(document).scrollTop() < section2Top){
      $('nav#primary a#home').addClass('active');
    } else if ($(window).scrollTop() >= section2Top && $(document).scrollTop() < section3Top){
      $('nav#primary a#news').addClass('active');
    } else if ($(window).scrollTop() >= section3Top && $(document).scrollTop() < section4Top){
      $('nav#primary a#about').addClass('active');
    } else if ($(window).scrollTop() >= section4Top){
      $('nav#primary a#login').addClass('active');
    }
    
  }
  redrawDotNav();
  $(window).bind('scroll',function(e){
    redrawDotNav();
  });
  $('nav#primary a#home').click(function(){
    $('html, body').animate({
      scrollTop:0
    }, 1000);
    return false;
  });
  $('nav#primary a#news').click(function(){
    $('html, body').animate({
      scrollTop:$('#news').offset().top
    }, 1000);
    return false;
  });
  $('nav#primary a#about').click(function(){
    $('html, body').animate({
      scrollTop:$('#about').offset().top
    }, 1000);
    return false;
  });
  $('nav#primary a#login').click(function(){
    $('html, body').animate({
      scrollTop:$('#login').offset().top
    }, 1000);
    return false;
  });
  $('.news-breadcrumb').click(function(){
    $('html, body').animate({
      scrollTop:$('#news').offset().top
    }, 1000);
    return false;
  });
  //scroll speed control
  function wheel(event) {
  var delta = 0;
  if (event.wheelDelta) delta = event.wheelDelta / 120;
  else if (event.detail) delta = -event.detail / 3;
  handle(delta);
  if (event.preventDefault) event.preventDefault();
  event.returnValue = false;
  }
  function handle(delta) {
    var time = 1000;
    var distance = $('#news').offset().top/4;
    $('html, body').stop().animate({
        scrollTop: $(window).scrollTop() - (distance * delta)
    }, time );
  }
  window.onmousewheel = document.onmousewheel = wheel;
});