$(function() {
  setNavbar();
  $(window).on('scroll', () => setNavbar());
  function setNavbar() {
    if (scrollFromTop() > 100) {
      $('.Navigation').addClass('Navigation--scrolled');
    } else {
      $('.Navigation').removeClass('Navigation--scrolled');
    }
  }
  $('.Navigation__mobile-menu').on("click", function() {
    $(this).toggleClass('--active');
    $('.Navigation').toggleClass('--mobile-active');
  });
});

function scrollFromTop() {
  return $(window).scrollTop();
}
