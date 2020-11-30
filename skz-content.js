// external js: isotope.pkgd.js

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}



// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
jQuery(document).ready(function($) {
  $(".ugb-blog-posts__category").each(function(){
  switch ( $(this).find("a").text()) {
    case "JYP Updates":
      $(this).addClass("jyp-updates");
      break;
	case "Interview":
      $(this).addClass("interview");
      break;
    case "Fan Talk":
      $(this).addClass("fan-talk");
      break;
	case "Melon":
      $(this).addClass("melon");
      break;
	case "Genie":
      $(this).addClass("genie");
      break;
	case "Article":
      $(this).addClass("article");
      break;
    }
  });
});

// init Isotope

/*jQuery(document).ready(function ($) {
  var $grid = $('.container').imagesLoaded( function() {
    // init Isotope after all images have loaded
    $grid.isotope({
      itemSelector: '.element-item',
      layoutMode: 'fitRows',
      getSortData: {
        oldest: '.date',
        newest: '.date',
        title: '.title'
      },
      sortAscending: {
        oldest: true,
        newest: false,
        title: true
      }});
  });


  $('.sort-by-button-group').on( 'click', 'button', function() {
    var sortValue = $(this).attr('data-sort-value');
    $grid.isotope({ sortBy: sortValue });
  });


  // filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };

  // bind filter button click
  $('.filters-button-group').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $grid.isotope({ filter: filterValue });
  });

  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });

  $('.element-item').on( 'click', 'button', function() {
    var show = $(this).attr('data-show-id');
    $(".collection." + show).toggleClass("show");
  });


  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content
  function sortDropdown() {
    document.getElementById("sortDropdown").classList.toggle("show");
  }

});*/
