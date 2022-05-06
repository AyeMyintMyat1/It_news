$(document).ready(function () {
  // $('#show-sidebar-btn').click(function () {
  //  $('.sidebar').addClass('open');
  // });
  // $('#hide-sidebar-btn').click(function () {
  //  $('.sidebar').removeClass('open');
  // });
  $('#show-sidebar-btn').click(function () {
    $('.sidebar').animate({ marginLeft: 0 });
  });
  $('#hide-sidebar-btn').click(function () {
    $('.sidebar').animate({ marginLeft: "-100%" });
  });
});
function go(url) {
  setTimeout(function () {
    location.href = `${url}`;
  }, 500);
}
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

$('#full-screen-btn').click(function () {
  $(this).closest('.card').toggleClass('full-screen-card');
  console.log($('.card').hasClass('full-screen-card'));
  if ($('.card').hasClass('full-screen-card')) {
    $(this).html(`<i class="feather-minimize-2 text-secondary"></i>`);
  } else {
    $(this).html(`<i class="feather-maximize-2 text-secondary"></i>`);
  }
});

if($('.nav-menu .active').offset() != undefined){
    let screenHeight = $(window).height();
    let currentMenuHeight = $('.nav-menu .active').offset().top;
    console.log(currentMenuHeight);

    if (currentMenuHeight>screenHeight * 0.8) {
        $('.sidebar').animate(
            {
                scrollTop:currentMenuHeight-100
            },1000)
    }
}
