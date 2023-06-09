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
    $('body').addClass('overbody');
    $(".site-navigation").addClass("open");
  });

  $(".closebtn").click(function() {
    $('body').removeClass('overbody');
    $(".site-navigation").removeClass("open");
  });

  $(".bgoverlay").click(function() {
    $('body').removeClass('overbody');
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

  

  $("#owldep").owlCarousel({
    smartSpeed: 2000,    
    nav: true, 
    responsive: {
      320: {
        items: 2
      },
      767: {
        items: 3
      },
      1000: {
        items: 3
      }
    }
  });
 
    $('#owldep .nav-item a ').on('click', function() {
      $('#owldep .nav-item a.active').removeClass('active');  
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
    margin: 50,
    loop: true,
    dots: false,
    responsive: {
      320: {
        items: 1,
        stagePadding: 0,
        margin: 10
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
  // Skillbar Js
  $(".bar").each(function() {
    $(this)
      .find(".bar-inner")
      .animate(
        {
          width: $(this).attr("data-width")
        },
        2000
      );
  });

  // Skillbar Js
  $(".first.circle")
    .circleProgress({
      value: 0.6
    })
    .on("circle-animation-progress", function(event, progress) {
      $(this)
        .find("strong")
        .html(Math.round(46.8 * progress) + "<i>%</i>");
    });

  $(".second.circle")
    .circleProgress({
      value: 0.6
    })
    .on("circle-animation-progress", function(event, progress) {
      $(this)
        .find("strong")
        .html(Math.round(33.33 * progress) + "<i>%</i>");
    });
  // new added Js for tabs
  const items = document.querySelectorAll(".tabs label.toggle");

  function toggleAccordion() {
    $(".tabs .tab-details-content").removeClass("active");
    this.classList.toggle("active");
    this.nextElementSibling.classList.toggle("active");
  }

  items.forEach(item => item.addEventListener("click", toggleAccordion));

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function(e) {
      e.preventDefault();

      document.querySelector(this.getAttribute("href")).scrollIntoView({
        behavior: "smooth"
      });
    });
  });

  // Category load more post

  $("#category_post_load").on("click", function() {
    espira_cat_ajax();
  });
  var is_loading = 0;
  $(window).scroll(function() {
    if (is_loading != 0) {
      return false;
    }
    var bottom_position =
      $(document).height() - ($(window).scrollTop() + $(window).height());
    if (bottom_position % 70 == 0 && noresult == false) {
      $("#category_post_load").trigger("click");
    }
  });

  function espira_cat_ajax() {
    is_loading = 1;
    $(".btn-line-espira").html("Laster...");
    //$(".loading-category").show();
    $(".btn-line-espira").show();
    $(".btn-line-espira").prop("disabled", true);
    let posts_per_page = $("#posts_per_page").val();
    let cat_name = $("#category").val();
    let paged = $("#paged").val();

    $.ajax({
      type: "POST",
      dataType: "json",
      url: espira_params.admin_ajax_url,
      data: {
        action: "load_category_post",
        posts_per_page: posts_per_page,
        paged: paged,
        cat_name: cat_name
      },
      success: function(data) {
        if (data.status == "success") {
          if (data.noresult == true) {
            //$(".loading-category").hide();
            noresult = true;
            // $(".btn-line-espira").hide();
            // $(".loadmore").append(
            //   "<div class='no-news'>Ingen flere nyheter</div>"
            // );
          } else {
            $(".loading-category").hide();
            $("#load-post-category").append(data.html);
            $("#paged").val(parseInt(paged) + 1);
          }
          is_loading = 0;
        }

        $(".btn-line-espira").prop("disabled", false);
        return false;
      }
    });
  }

  // Tag load more post

  $("#tag_post_load").on("click", function() {
    espira_tag_ajax();
  });

  var is_loading = 0;

  $(window).scroll(function() {
    if (is_loading != 0) {
      return false;
    }
    var bottom_position =
      $(document).height() - ($(window).scrollTop() + $(window).height());
    if (bottom_position % 70 == 0 && noresult == false) {
      $("#tag_post_load").trigger("click");
    }
  });

  function espira_tag_ajax() {
    is_loading = 1;
    $(".btn-line-espira").html("Laster...");
    //$(".loading-category").show();
    $(".btn-line-espira").show();
    $(".btn-line-espira").prop("disabled", true);
    let posts_per_page = $("#posts_per_page").val();
    let tag_id = $("#tag_id").val();
    let paged = $("#paged").val();

    $.ajax({
      type: "POST",
      dataType: "json",
      url: espira_params.admin_ajax_url,
      data: {
        action: "load_tag_post",
        posts_per_page: posts_per_page,
        paged: paged,
        tag_id: tag_id
      },
      success: function(data) {
        if (data.status == "success") {
          if (data.noresult == true) {
            $(".loading-category").hide();
            noresult = true;
            $(".btn-line-espira").hide();
            // $(".loadmore").append(
            //   "<div class='no-news'>Ingen flere nyheter</div>"
            // );
          } else {
            $(".loading-category").hide();
            $("#load-post-tag").append(data.html);
            $("#paged").val(parseInt(paged) + 1);
          }
          is_loading = 0;
        }

        $(".btn-line-espira").prop("disabled", false);
        return false;
      }
    });
  }

  $(".search-icon").click(function() {
    $(".header-pop-up").addClass("show");
  });

  $(".header-pop-up i.fa-close").click(function() {
    $(".header-pop-up").removeClass("show");
  });
});
