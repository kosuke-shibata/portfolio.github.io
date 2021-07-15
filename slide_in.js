$('.menu-button').on('click', function(){
  if ($('.menu-command').hasClass('menu-open')) {
    $('.menu-command').removeClass('menu-open');
  } else {
    $('.menu-command').addClass('menu-open');
  }
});
