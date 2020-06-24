if (document.location.href.indexOf('daily-devotion/?') > -1) {
    document.location.href = 'http://www.hcny.org/daily-devotion/';
}

// toggle navbar
document.addEventListener( 'DOMContentLoaded', () => {
    
    // get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll( '.navbar-burger' ), 0 );
    
    // check if there are any navbar burgers
    if ( $navbarBurgers.length > 0 ) {
        
        // add "click" event on each of them
        $navbarBurgers.forEach( el => {            
            el.addEventListener( 'click', () => {
                
                // get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById( target );
                
                // toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle( 'is-active' );
                $target.classList.toggle( 'is-active' );
            
            });
        });
    
    }

});

// find-church page back to top
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {    
    
    // check if there is a back-to-top button on the page
    if ( document.getElementById( "btt-button" ) !== null ) {
        
        if ( document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000 ) {
            document.getElementById( "btt-button" ).style.display = "block";
        } else {
            document.getElementById( "btt-button" ).style.display = "none";
        }

    }

}

// When the user clicks on the button, scroll to the top of the document
jQuery( '#btt-button' ).on( 'click', function() {
    
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

});

// load video
jQuery( '.video-loader' ).on( 'click', function() {
    
    jQuery( '#video' ).addClass( 'is-active' );
    jQuery( 'html' ).addClass( 'is-clipped' );

    // load video content
    var youtube_id = jQuery( this ).data( 'youtubeId' );
    var inner_html = '<div class="loading"><img src="' + 
                     theme_file.uri + '/assets/images/preloader.gif' + 
                     '"></div>' +
                     '<iframe class="youtube" src="https://www.youtube.com/embed/' + youtube_id +
                     '" frameborder="0" allowfullscreen></iframe>';

    jQuery( '#video .video-container' ).html( inner_html );

});

// close button animation
jQuery( '#video-close' ).on( 'click', function() {
    jQuery( '#video' ).removeClass( 'is-active' );
    jQuery( 'html' ).removeClass( 'is-clipped' );
});

jQuery( '#video-bg' ).on( 'click', function() {
    jQuery( '#video' ).removeClass( 'is-active' );
    jQuery( 'html' ).removeClass( 'is-clipped' );
});

// lazy-load images by using yall.js
document.addEventListener( "DOMContentLoaded", yall );

// masonry.js
var grid = jQuery( '.grid' ).masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    percentPosition: true
});

grid.imagesLoaded().progress( function() {
    grid.masonry( 'layout' );
});

// photo modals animation
jQuery( '.grid-item' ).on( 'click', function() {
    jQuery( '#photo' ).addClass( 'is-active' );
    jQuery( 'html' ).addClass( 'is-clipped' );
    jQuery( '#photo .modal-content' ).html(jQuery( this ).html());
});

jQuery( '#photo-close' ).on( 'click', function() {
    jQuery( '#photo' ).removeClass( 'is-active' );
    jQuery( 'html' ).removeClass( 'is-clipped' );
});

jQuery( '#photo-bg' ).on( 'click', function() {
    jQuery( '#photo' ).removeClass( 'is-active' );
    jQuery( 'html' ).removeClass( 'is-clipped' );
});

// tabs animation
function daySelected( event ) {
    
    var previous = document.querySelector( '.is-active' );
    var current = event.currentTarget;
    
    var day =current.id;
    var query = '.' + current.id + '.cell-groups';
    
    if ( current !== previous ) {
        previous.classList.remove( 'is-active' );
        current.classList.add( 'is-active' );
    }
    
    var previous_shown = document.querySelector( '.cell-groups.is-shown' );
    var current_shown = document.querySelector( query );
    
    previous_shown.classList.remove( 'is-shown' );
    previous_shown.classList.add( 'is-hidden' );
    current_shown.classList.remove( 'is-hidden' );
    current_shown.classList.add( 'is-shown' );

}

// manipulate weixin modal
function open_weixin() {
    var weixin = document.querySelector( '#weixin' );
    weixin.classList.add( 'is-active' );
}

function close_weixin() {
    var weixin = document.querySelector( '#weixin' );
    weixin.classList.remove( 'is-active' );
}