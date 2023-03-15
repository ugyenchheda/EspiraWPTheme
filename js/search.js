var newsearch = true;
var markers_arr = new Array();
var municipality, zipcode, lat, lng;
var kvp = document.location.search.substr(1).split("&");
jQuery(document).ready(function($) {
  var espira_params = window.espira_params;
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split("&"),
      sParameterName,
      i;

    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split("=");
      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined
          ? true
          : decodeURIComponent(sParameterName[1]);
      }
    }
  };

  if (kvp.length && kvp[0] != "") {
    municipality = getUrlParameter("municipality");
    zipcode = getUrlParameter("zipcode");
    lat = getUrlParameter("latitude");
    lng = getUrlParameter("longitude");
    if (municipality !== undefined) {
      $("#municipality").val(municipality);
      $("#municipality").selectpicker("refresh");
    }
    if (zipcode !== undefined) {
      $("#zipcode").val(zipcode);
      $("#zipcode").selectpicker("refresh");
    }

    call_ajax_map(lat, lng, 6, 1, municipality, zipcode);
  } else {
    var markers = $("#markers").val();
    var infoWindowContent = $("#marker_contents").val();
    if (markers !== undefined) {
      full_map_search_load(JSON.parse(markers), JSON.parse(infoWindowContent));
    }
  }
  $("#municipality").on("changed.bs.select", function(
    e,
    clickedIndex,
    newValue,
    oldValue
  ) {
    municipality = this.value;
    $("#zipcode").val('');
    zipcode = $("#zipcode").val();
    var url = window.location.href;
    $('#header-search').val('');
    $('#mobile-search').val('');
    // lat = $("#lat").val();
    // lng = $("#lng").val();

    sted_of_fylke(municipality);
   
    // url=removeParam("latitude",url);
    // url=removeParam("longitude",url);
    refineUrl();
    insertParam("sok", '');
    insertParam("latitude", '');
    insertParam("longitude",'');
    insertParam("zipcode", '');
    insertParam("municipality", municipality);
    
      
    // console.log(url);
    // location.replace(url);
    // history.pushState({},"URL Rewrite Example",url)
    // window.history.replaceState( {},'municipality',municipality );
    call_ajax_map(null, null, 6, 1, municipality, zipcode);
  });

  $("#zipcode").on("changed.bs.select", function(
    e,
    clickedIndex,
    newValue,
    oldValue
  ) {
    municipality = $("#municipality").val();
    var url = window.location.href;
    zipcode = this.value;
    // lat = $("#lat").val();
    // lng = $("#lng").val();
    $('#header-search').val('');
    $('#mobile-search').val('');
    refineUrl();
    insertParam("sok", '');
    insertParam("latitude", '');
    insertParam("longitude",'');
    insertParam("zipcode", zipcode);
    if(municipality)
      insertParam("municipality", municipality);
    call_ajax_map(null, null, 6, 1, municipality, zipcode);
  });

  $(".map").each(function(index, Element) {
    var coords = $(Element)
      .text()
      .split(",");
    if (coords.length != 3) {
      $(this).display = "none";
      return;
    }
    var latlng = new google.maps.LatLng(
      parseFloat(coords[0]),
      parseFloat(coords[1])
    );

    var myOptions = {
      zoom: parseFloat(coords[2]),
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: false,
      mapTypeControl: true,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL
      }
    };

    var map = new google.maps.Map(Element, myOptions);

    var marker = new google.maps.Marker({
      position: latlng,
      map: map
    });
  });
  var options = {
    // types: ["(cities)"],
    componentRestrictions: { country: "no" }
  };
  $(document).on("hover", "#wholemap>div>div>div>.rslt-block", function() {
    var id = $(this).attr("id");
    if (id !== undefined) triggerHover(id);
  });

  function triggerHover(i) {
    google.maps.event.trigger(markers_arr[i], "mouseover");
    // map.getBounds();
  }

  // var autocomplete = new google.maps.places.Autocomplete(
  //   $("#chheda-map")[0],
  //   options
  // );

  // google.maps.event.addListener(autocomplete, "place_changed", function() {
  //   var place = autocomplete.getPlace();
  //    lat = place.geometry.location.lat();
  //    lng = place.geometry.location.lng();
  //   $(".btn-line-espira").html("Laster...");
  //   if ($("#lat").val() != lat) {
  //     newsearch = true;
  //     $("#municipality").val("");
  //     $("#zipcode").val("");
  //     $("#zipcode").selectpicker("refresh");
  //     $("#municipality").selectpicker("refresh");
  //   }
  //   if (newsearch === true) {
  //     $("#paged").val(2);
  //   }
  //   var posts_per_page = $("#posts_per_page").length
  //     ? $("#posts_per_page").val()
  //     : "6";
  //   var paged = $("#paged").length ? $("#paged").val() : 2;
  //   // var param="load_more";
  //   $("#lat").val(lat);
  //   $("#lng").val(lng);
  //   // console.log(lat);
  //   $("#header-search").val($("#chheda-map").val());
  //   $("#display-search-location").html("[ " + $("#chheda-map").val() + " ]");

  //   call_ajax_map(lat, lng, posts_per_page, paged);
  // });

  var autocomplete_header_search1 = new google.maps.places.Autocomplete(
    $("#mobile-search")[0],
    options
  );
  google.maps.event.addListener(
    autocomplete_header_search1,
    "place_changed",
    function() {
      var place1 = autocomplete_header_search1.getPlace();
      if (place1.geometry == undefined) {
        return false;
      }
      lat = place1.geometry.location.lat();
      lng = place1.geometry.location.lng();

      var getUrl = window.location;
      var baseUrl =
        getUrl.protocol +
        "//" +
        getUrl.host +
        "/" +
        getUrl.pathname.split("/")[1];
      var sok = $("#mobile-search").val();
      window.location.replace(
        baseUrl +
          "/finn-barnehage/?sok=" +
          sok +
          "&latitude=" +
          lat +
          "&longitude=" +
          lng
      );
    }
  );

  var autocomplete_header_search = new google.maps.places.Autocomplete(
    $("#header-search")[0],
    options
  );
  google.maps.event.addListener(
    autocomplete_header_search,
    "place_changed",
    function() {
      var place1 = autocomplete_header_search.getPlace();
      if (place1.geometry == undefined) {
        return false;
      }
      lat = place1.geometry.location.lat();
      lng = place1.geometry.location.lng();

      var getUrl = window.location;
      var baseUrl =
        getUrl.protocol +
        "//" +
        getUrl.host +
        "/" +
        getUrl.pathname.split("/")[1];
      var sok = $("#header-search").val();
      window.location.replace(
        baseUrl +
          "/finn-barnehage/?sok=" +
          sok +
          "&latitude=" +
          lat +
          "&longitude=" +
          lng
      );
    }
  );

  $("a.squborder").click(function() {
    $(".gridmain").addClass("active");
    $(".firsmain").removeClass("active");
    $(".listmain").removeClass("active");
    $(".firstpage")
      .addClass("listview")
      .removeClass("gridview")
      .removeClass("hide");
    $(".whole-map")
      .addClass("hide")
      .removeClass("wholemap");
  });
  $("a.list-view").click(function() {
    $(".listmain").addClass("active");
    $(".gridmain").removeClass("active");
    $(".firsmain").removeClass("active");
    $(".firstpage ")
      .addClass("gridview")
      .removeClass("listview");
    $(".whole-map")
      .addClass("hide")
      .removeClass("wholemap");
    $(".firstpage ").removeClass("hide");
  });
  $("a.circleborder").click(function() {
    $(".firsmain").addClass("active");
    $(".gridmain").removeClass("active");
    $(".listmain").removeClass("active");
    $(".whole-map")
      .addClass("wholemap")
      .removeClass("listview")
      .removeClass("hide")
      .removeClass("gridview");
    $(".firstpage").addClass("hide");
  });

  /** ajax load */
  $(".btn-line-espira").on("click", function() {
    lat = $("#lat").length ? $("#lat").val() : "";
    if (lat) {
      newsearch = 0;
      lat = $("#lat").val();
      lon = $("#lng").val();
      municipality = $("#municipality").val();
      zipcode = $("#zipcode").val();
      var posts_per_page = $("#posts_per_page").length
        ? $("#posts_per_page").val()
        : "6";
      var paged = $("#paged").length ? $("#paged").val() : 2;
      // google.maps.event.trigger(autocomplete, "place_changed");
      call_ajax_map(lat, lon, posts_per_page, paged, municipality, zipcode);
    } else {
      kindergarden_search_ajax("load_more");
    }
  });
  map_search_load();

  function kindergarden_search_ajax(param = "filter") {
    $(".btn-line-espira").html("Laster...");
    var posts_per_page = $("#posts_per_page").length
      ? $("#posts_per_page").val()
      : "6";
    var paged = $("#paged").length ? $("#paged").val() : 1;
    call_ajax_map(null, null, posts_per_page, paged, municipality, zipcode);
  }
  $(".cmb-type-pw-map").each(function() {
    initializeMap($(this));
  });

  // var latitude = getUrlParameter("latitude");
  // var longitude = getUrlParameter("longitude");

  // if (undefined !== latitude && undefined != longitude && latitude.length > 0 && longitude.length > 0) {
  //   $(".btn-line-espira").html("Laster...");
  //   if ($("#lat").val() != latitude) {
  //     newsearch = true;
  //   }
  //   if (newsearch === true) {
  //     $("#paged").val(2);
  //   }
  //   $("#lat").val(latitude);
  //   $("#lng").val(longitude);
  //   var posts_per_page = $("#posts_per_page").length
  //     ? $("#posts_per_page").val()
  //     : "6";
  //   var paged = $("#paged").length ? $("#paged").val() : 1;
  //   call_ajax_map(latitude, longitude, posts_per_page, paged);
  // }

  function call_ajax_map(
    latitude,
    longitude,
    posts_per_page = 6,
    paged = 1,
    municipality = "",
    zipcode = ""
  ) {
    var distance = 20; //in km
    $("#lat").val(latitude);
    $("#lng").val(longitude);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: espira_params.admin_ajax_url,
      data: {
        action: "espira_kindergarden_map_search",
        lat: latitude,
        lng: longitude,
        municipality: municipality,
        zipcode: zipcode,
        posts_per_page: posts_per_page,
        paged: paged,
        distance: distance
      },
      success: function(data) {
        // console.log(data);
        if (data.status == "success") {
          // return false;
          if (data.noresult == true) {
            $(".btn-line-espira").hide();
            $("#search_result").html(data.html);
            $("#wholemap").html(data.html);
            $("#paged").val(2);
          } else {
            $(".btn-line-espira").show();
            if (parseInt(paged) == 1) {
              //some how the first page will have paged 2 so if first page clear all and a
              $("#search_result").html(data.html);
            } else {
              $("#search_result").append(data.html);
            }
            $("#wholemap").html(data.full_map_html);
            $("#paged").val(parseInt(paged) + 1);
            $("#display-search-total").html(data.total_record);
            $("#total_record").val(data.total_record);
            // console.log(data.fylke);
            // $("#municipality").html(data.fylke);
            $("#municipality").val(municipality);
            // $('.selectpicker').selectpicker('refresh')
            $("#municipality").selectpicker("refresh");
            $("#zipcode").val(zipcode);
            // $('.selectpicker').selectpicker('refresh')
            $("#zipcode").selectpicker("refresh");

            if (municipality !== undefined && municipality != "") {
              $("#display-search-location").html("[ " + municipality + " ]");
            }
            if (zipcode !== undefined && zipcode != "") {
              if (municipality !== undefined && municipality != "") {
                $("#display-search-location").html(
                  "[ " + municipality + " / " + zipcode + " ]"
                );
              } else {
                $("#display-search-location").html("[ " + zipcode + " ]");
              }
            }

            // $("#paged").val(parseInt(paged) + 1);
            if (data.load_more_record == 0) {
              $(".btn-line-espira").hide();
            }
            $(".btn-line-espira").html(data.load_more_text);
          }

          map_search_load();
          full_map_search_load(data.markers, data.marker_contents, data.center);
        }
        $(".pre-loader-stange").hide();
        $(".btn-line-stange").prop("disabled", false);
        return false;
      }
    });
  }

  function sted_of_fylke(fylke) {
    if (fylke == "") {
      return false;
    }
    $.ajax({
      type: "POST",
      dataType: "json",
      url: espira_params.admin_ajax_url,
      data: {
        action: "espira_kindergarden_sted_of_fylke",
        fylke: fylke
      },
      success: function(data) {
        // console.log(data.html);
        if (data.status == "success") {
          if (data.html) {
            $("#zipcode").html(data.html);
            $("#zipcode").selectpicker("refresh");
          }
        }

        return false;
      }
    });
  }

  function myFunction() {
    // e.preventDefault();
    // sok = $("#chheda-map").val();
    // var lat = $("#lat").val();
    // var lon = $("#lng").val();
    // call_ajax_map(lat, lon);
  }
  $(".site-btn").click(function() {
    // myFunction();
    // alert('a')
    // google.maps.event.trigger(autocomplete, 'place_changed');
    // $( "#header-search" ).keypress();
    // var e = jQuery.Event( 'keypress', { which: $.ui.keyCode.ENTER } );

    // $('#header-search').trigger(e);
    // alert('testing');
    $('#header-search').trigger(jQuery.Event('keypress', { type : 'keypress', which : 13 }));
  });

  $("#header-search,#chheda-map").on("keypress", function(e) {
    if (e.which === 13) {
      var firstResult = $(".pac-container .pac-item:first").text();
      var geocoder = new google.maps.Geocoder();
      firstResult=firstResult.split(/(?=[A-Z])/).join(" ");
      geocoder.geocode({ address: firstResult }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          var lat = results[0].geometry.location.lat();
          var lng = results[0].geometry.location.lng();

          $("#lat").val(lat);
          $("#lng").val(lng);
          var getUrl = window.location;
          var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1];

          if (getUrl.pathname.split("/")[1] != "finn-barnehage1") {
            var sok = $("#header-search").val();

            window.location.replace(
              baseUrl +
                "/finn-barnehage/?sok=" +
                firstResult +
                "&latitude=" +
                lat +
                "&longitude=" +
                lng
            );
          }
          $("#display-search-location").html($("#header-search").val());
          call_ajax_map(lat, lng);
        } else {
          $("#lat").val();
          $("#lng").val();
          var newUrl = refineUrl();
          // alert(newUrl);
          window.history.pushState({}, "", newUrl);
          kvp = [];
          $("#display-search-location").html($("#header-search").val());
          call_ajax_map();
        }
      });
      return false;
    }
  });

  $(".searchform").submit(function(e) {
    e.preventDefault();
  });
});

function map_search_load() {
  jQuery(".map").each(function(index, Element) {
    var coords = jQuery(Element)
      .text()
      .split(",");
    if (coords.length != 3) {
      jQuery(this).display = "none";
      return;
    }
    var latlng = new google.maps.LatLng(
      parseFloat(coords[0]),
      parseFloat(coords[1])
    );

    var myOptions = {
      zoom: parseFloat(coords[2]),
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: false,
      mapTypeControl: true,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL
      }
    };
    var map = new google.maps.Map(Element, myOptions);

    var marker = new google.maps.Marker({
      position: latlng,
      map: map
    });
  });
}

function full_map_search_load(
  markers = "",
  infoWindowContent = "",
  center = [59.9138688, 10.752245399999993]
) {
  // console.log(markers);
  var map;
  var bounds = new google.maps.LatLngBounds();
  var latlng;
  if (markers.length < 1) {
    return false;
  }
  if (center.length) {
    latlng = new google.maps.LatLng(
      parseFloat(center[0]),
      parseFloat(center[1])
    );
  } else if (markers.length) {
    latlng = new google.maps.LatLng(
      parseFloat(markers[0][1]),
      parseFloat(markers[0][2])
    );
  } else {
    latlng = new google.maps.LatLng(59.9138688, 10.752245399999993);
  }

 
 
    var mapOptions = {
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
  

  // Display a map on the page
  map = new google.maps.Map(
    document.getElementById("map-multiple-kindergardens"),
    mapOptions
  );
  

  // alert(markers.length);
  // map.setTilt(45);

  // if(markers.length==1){
  //   map.setOptions({maxZoom: 20 });
  // }

  // markers=[['Abildsø skole', 59.9138688,10.752245399999993],['Espira Marienfryd barnehage', 59.9138688,10.75224539999900],['Espira Marienfryd barnehage', 59.92051,10.79178],['Espira Grefsen Stasjon', 59.9416718,10.777763199999981],['Bekkelaget skole', 59.8825,10.7838],['Abilds&oslash; skole', 59.8808,10.825],]

  // Display multiple markers on a map
  var infoWindow = new google.maps.InfoWindow(),
    marker,
    i;

  // Loop through our array of markers &amp; place each one on the map
  for (i = 0; i < markers.length; i++) {
    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
    bounds.extend(position);
    marker = new google.maps.Marker({
      position: position,
      map: map,
      title: markers[i][0]
    });
    // markers_arr.push(marker);
    // markers_arr.push({
    //   id: markers[i][3]
    // });
    markers_arr[markers[i][3]] = marker;

    // Each marker to have an info window
    // google.maps.event.addListener(marker, 'mouseout', function() {
    //   infoWindow.close();

    // });

    // Each marker to have an info window
    google.maps.event.addListener(
      marker,
      "mouseover",
      (function(marker, i) {
        return function() {
          infoWindow.setContent(infoWindowContent[i][0]);
          infoWindow.open(map, marker);
        };
      })(marker, i)
    );
    google.maps.event.addListener(
      marker,
      "click",
      (function(marker, i) {
        return function() {
          infoWindow.setContent(infoWindowContent[i][0]);
          infoWindow.open(map, marker);
        };
      })(marker, i)
    );

    // Automatically center the map fitting all markers on the screen
    map.fitBounds(bounds);
    map.panToBounds(bounds);
    var listener = google.maps.event.addListener(map, "idle", function() { 
      if (map.getZoom() > 16) map.setZoom(16); 
      google.maps.event.removeListener(listener); 
    });
    
  }

}
function insertParam(key, value) {
  key = encodeURI(key);
  value = encodeURI(value);

  // var kvp = document.location.search.substr(1).split('&');
  // console.log(kvp);

  var i = kvp.length;
  var x;
  while (i--) {
    x = kvp[i].split("=");

    if (x[0] == key) {
      if (value) {
      }
      x[1] = value;
      kvp[i] = x.join("=");
      break;
    }
  }

  if (i < 0) {
    
    
      kvp[kvp.length] = [key, value].join("=");
    
     
  }

  // searchparams=kvp;
  // console.log(kvp);
  window.history.replaceState({}, "serch", "?" + kvp.join("&"));

  //this will reload the page, it's likely better to store this until finished
  // document.location.search = kvp.join('&');
}
function removeParam(key, sourceURL) {
  var rtn = sourceURL.split("?")[0],
    param,
    params_arr = [],
    queryString = sourceURL.indexOf("?") !== -1 ? sourceURL.split("?")[1] : "";
  if (queryString !== "") {
    params_arr = queryString.split("&");
    for (var i = params_arr.length - 1; i >= 0; i -= 1) {
      param = params_arr[i].split("=")[0];
      if (param === key) {
        params_arr.splice(i, 1);
      }
    }
    rtn = rtn + "?" + params_arr.join("&");
  }
  window.history.replaceState({}, "serch", "?" + params_arr.join("&"));
  // return rtn;
}
function refineUrl() {
  //get full url
  var url = window.location.href;
  //get url after/
  var value = (url = url.slice(0, url.indexOf("?")));
  //get the part after before ?
  value = value.replace(
    '@System.Web.Configuration.WebConfigurationManager.AppSettings["BaseURL"]',
    ""
  );
  return value;
}
