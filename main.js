$(function () {
  let About = (($('#about').offset().top) - 500);
  $(window).scroll(function () {
    if ($(this).scrollTop() >= About) {
      $('#about').addClass('about-in');
    }
  });
});


$(function () {
  let Works = (($('#works').offset().top) - 500);
  let Contact = (($('#contact').offset().top) - 500);
  $(window).scroll(function () {
    if ($(this).scrollTop() >= Works) {
      $('.works-title').addClass('slide-in');
    }
    if ($(this).scrollTop() >= Contact) {
      $('.contact-title').addClass('slide-in');
    }
  });
});
