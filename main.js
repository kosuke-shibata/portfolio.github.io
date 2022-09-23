
$(function () {
  let About = (($('#about').offset().top) - 600);
  let Service = (($('#services').offset().top) - 600);
  let Works = (($('#works').offset().top) - 600);
  $(window).scroll(function () {
    if ($(this).scrollTop() >= About) {
      $('#about').addClass('about-in');
    }
    if ($(this).scrollTop() >= Service) {
      $('.services-title').addClass('slide-in');
    }
    if ($(this).scrollTop() >= Works) {
      $('.works-title').addClass('slide-in');
    }
  });
});

$(window).on('touchmove.noScroll', function(e) {
  e.preventDefault();
});

$(window).off('.noScroll');
