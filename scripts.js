fullscreen();
$(window).resize(fullscreen);
$(window).scroll(headerParallax);

function fullscreen() {
  var masthead = $('.masthead');
  var windowH = $(window).height();
  var windowW = $(window).width();

  masthead.width(windowW);
  masthead.height(windowH);
}
