// Stellar Nav
jQuery(document).ready(function($) {
    jQuery('.stellarnav').stellarNav({
        theme: 'light',
        breakpoint: 991,
        position: 'right',
        // phoneBtn: '18009997788',
        // locationBtn: 'https://www.google.com/maps'
    });
});




// Go to Top
$(function () {
  // Scroll Event
  $(window).on("scroll", function () {
      var scrolled = $(window).scrollTop();
      if (scrolled > 600) $(".go-top").addClass("active");
      if (scrolled < 600) $(".go-top").removeClass("active");
  });
  // Click Event
  $(".go-top").on("click", function () {
      $("html, body").animate({ scrollTop: "0" }, 500);
  });
});


//Owl Carousel
$('#banner-slider').owlCarousel({
    loop: true,
    autoplay:true,
    autoplayTimeout:3000,
    margin: 0,
    dots: true,
    nav: false,
    items: 1,
})

$('#testimonialSlider').owlCarousel({
    loop: true,
    autoplay:false,
    autoplayTimeout:3000,
    margin: 0,
    dots: true,
    nav: false,
    items: 1,
})

//Counter js
var counted = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (counted == 0 && $(window).scrollTop() > oTop) {
    $('.count').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    counted = 1;
  }

});


$('#furnitureSlider').owlCarousel({
    loop: true,
    autoplay:true,
    autoplayTimeout:3000,
    dots: true,
    nav: false,
    items: 1,
    responsive:{
        0:{
            items:1.3,
            // nav:true,
            margin: 10,
        },
        600:{
            items:3.4,
            // nav:false,
            margin: 10,
        },
        1000:{
            items:3.5,
            // nav:true,
            // loop:false,
            margin: 15,
        }
    }
})

$('#blogSlider').owlCarousel({
    loop: true,
    autoplay:true,
    autoplayTimeout:3000,
    dots: true,
    nav: false,
    items: 1,
    responsive:{
        0:{
            items:1.3,
            // nav:true,
            margin: 10,
        },
        600:{
            items:2.4,
            // nav:false,
            margin: 10,
        },
        1000:{
            items:2.5,
            // nav:true,
            // loop:false,
            margin: 15,
        }
    }
})