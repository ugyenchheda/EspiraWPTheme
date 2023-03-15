jQuery(document).ready(function($) {
  var noresult = false;
  $(".selectpicker").selectpicker({
    noneSelectedText: "Vennligst velg"
  });

  // Sticky Header
  $(window).scroll(function() {
    if ($(window).scrollTop()) {
      $(".site-header").addClass("sticky");
    } else {
      $(".site-header").removeClass("sticky");
    }
  });

  $(".navbar-toggle").click(function() {
    $(".site-navigation").addClass("open");
  });

  $(".closebtn").click(function() {
    $(".site-navigation").removeClass("open");
  });

  $(".bgoverlay").click(function() {
    $(".site-navigation").removeClass("open");
  });

  $(".menu-item-has-children").click(function() {
    $(".sub-menu").slideToggle();
  });

  $("#owl-one").owlCarousel({
    loop: true,
    smartSpeed: 1500,
    autoplay: true,
    responsive: {
      320: {
        items: 1
      },
      767: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });

  $("#owl-two").owlCarousel({
    smartSpeed: 1500,
    autoplay: true,
    nav: true,
    margin: 10,
    loop: true,
    dots: false,
    responsive: {
      320: {
        items: 1
      },
      767: {
        items: 1
      },
      1000: {
        items: 4
      }
    }
  });

  $("#owl-three").owlCarousel({
    smartSpeed: 1500,
    autoplay: false,
    nav: true,
    margin: 10,
    loop: true,
    dots: false,
    responsive: {
      320: {
        items: 1
      },
      767: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });
  $(".owl-carousel-gallary").owlCarousel({
    smartSpeed: 1500,
    autoplay: false,
    nav: true,
    margin: 10,
    loop: true,
    dots: false,
    responsive: {
      320: {
        items: 1
      },
      767: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  $("#owl-four").owlCarousel({
    smartSpeed: 1500,
    autoplay: false,
    nav: true,
    margin: 10,
    loop: true,
    dots: false,
    responsive: {
      320: {
        items: 1
      },
      767: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });

});