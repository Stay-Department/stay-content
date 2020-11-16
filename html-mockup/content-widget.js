// external js: isotope.pkgd.js

// init Isotope
var iso;

imagesLoaded('.container', function() {
iso = new Isotope( '.container', {
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
  }
});
});

var sortByGroup = document.querySelector('.sort-by-button-group');
sortByGroup.addEventListener( 'click', function( event ) {
  // only button clicks
  if ( !matchesSelector( event.target, '.button' ) ) {
    return;
  }
  var sortValue = event.target.getAttribute('data-sort-value');
  iso.arrange({ sortBy: sortValue });
});


// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function( itemElem ) {
    var number = itemElem.querySelector('.number').textContent;
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function( itemElem ) {
    var name = itemElem.querySelector('.name').textContent;
    return name.match( /ium$/ );
  }
};

// bind filter button click
var filtersElem = document.querySelector('.filters-button-group');
filtersElem.addEventListener( 'click', function( event ) {
  // only work with buttons
  if ( !matchesSelector( event.target, 'button' ) ) {
    return;
  }
  var filterValue = event.target.getAttribute('data-filter');
  // use matching filter function
  filterValue = filterFns[ filterValue ] || filterValue;
  iso.arrange({ filter: filterValue });
});

// change is-checked class on buttons
var buttonGroups = document.querySelectorAll('.button-group');
for ( var i=0, len = buttonGroups.length; i < len; i++ ) {
  var buttonGroup = buttonGroups[i];
  radioButtonGroup( buttonGroup );
}

function radioButtonGroup( buttonGroup ) {
  buttonGroup.addEventListener( 'click', function( event ) {
    // only work with buttons
    if ( !matchesSelector( event.target, 'button' ) ) {
      return;
    }
    buttonGroup.querySelector('.is-checked').classList.remove('is-checked');
    event.target.classList.add('is-checked');
  });
}

function toggle(name) {
  var element = document.querySelectorAll(name);
  for (var i=0; i< element.length; i++){
    if (element[i].classList.toggle('selected')) {
      element[i].querySelector('.see-more').classList.toggle('showNone');
      iso.arrange({filter:name});
      iso.layout();
    } else {
        setTimeout(function(){iso.arrange({filter:"*"});}, 1000);
        element[i].querySelector('.see-more').classList.toggle('showNone');
    }
  }
}


/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function sortDropdown() {
  document.getElementById("sortDropdown").classList.toggle("display");
}
