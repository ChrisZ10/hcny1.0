console.log(window.location.href);

/*****************************************/
/*           CAROUSEL ANIMATION          */
/*****************************************/

// previous button
jQuery( '.carousel-prev' ).on( 'click', function() {

    // pause currently playing audio first
    if ( jQuery( '.button.play_button' ).hasClass( 'play' ) ) {

        // pause audio
        var audio = jQuery( '.section.player.is-shown audio' );
        var audioElement = audio[0];
        audioElement.pause();

        // change to play button
        jQuery( '.button.play_button' ).html( '<i class="far fa-play-circle fa-2x"></i>' );
        jQuery( '.button.play_button' ).removeClass( 'play' );
        jQuery( '.button.play_button' ).addClass( 'pause' );

    }

    // reset progress bar
    jQuery( '.section.player.is-shown progress' ).attr( 'value', 0 );
    
    // get the current active carousel item by class name 'is-active'
    var current = jQuery( '.carousel-item.is-active' )[0];
    
    // find its index
    var current_index = jQuery( 'li' ).index( current );
    
    // find the index of the carousel item before it
    var prev_index;
    var count = jQuery( '.carousel-box' ).children().length;
    
    if ( current_index !== 0 ) {
        prev_index = current_index - 1;
    } else {
        prev_index = count - 1;
    }

    // get the previous carousel item by its index    
    var prev = jQuery( '.carousel-item' ).get( prev_index );
    
    // toggle class 'is-active' on current and previous carousel items
    current.classList.remove( 'is-active' );
    prev.classList.add( 'is-active' );

    // find the current and previous content
    var current_content = '#' + current.id + '_content';
    var prev_content = '#' + prev.id + '_content';
    current_content = jQuery( current_content );
    prev_content = jQuery( prev_content );
    
    // toggle class "is-shown" on current and previous content
    current_content.removeClass( 'is-shown' );
    prev_content.addClass( 'is-shown' );

    // find the current and previous player section
    var current_player = '#' + current.id + '_player';
    var prev_player = '#' + prev.id + '_player';
    current_player = jQuery( current_player );
    prev_player = jQuery( prev_player );

    // toggle class "is-shown" on current and previous player section
    current_player.removeClass( 'is-shown' );
    prev_player.addClass( 'is-shown' ); 

    // find the first audio in previous content
    var first_play_link = '#' + prev.id + '_content .play_link';
    first_play_link = jQuery(first_play_link)[0];
    
    // simulate "click" event on the first audio
    if (first_play_link) {
        first_play_link.click();
    }

}); // carousel previous button ends

// next button
jQuery( '.carousel-next' ).on( 'click', function() {
    
    // pause currently playing audio first
    if ( jQuery( '.button.play_button' ).hasClass( 'play' ) ) {

        // pause audio
        var audio = jQuery( '.section.player.is-shown audio' );
        var audioElement = audio[0];
        audioElement.pause();

        // change to play button
        jQuery( '.button.play_button' ).html( '<i class="far fa-play-circle fa-2x"></i>' );
        jQuery( '.button.play_button' ).removeClass( 'play' );
        jQuery( '.button.play_button' ).addClass( 'pause' );

    }

    // reset progress bar
    jQuery( '.section.player.is-shown progress' ).attr( 'value', 0 );

    // get the current active carousel item by class name 'is-active'
    var current = document.querySelector( '.carousel-item.is-active' );

    // find its index
    var current_index = jQuery( 'li' ).index( current );

    // find the index of the carousel item after it
    var next_index;
    var count = jQuery( '.carousel-box' ).children().length;
    
    if ( current_index !== count - 1 ) {
        next_index = current_index + 1;
    } else {
        next_index = 0;
    }

    // get the next carousel item by its index   
    var next = jQuery( '.carousel-item' ).get( next_index );
    
    // toggle class 'is-active' on current and next carousel items
    current.classList.remove( 'is-active' );
    next.classList.add( 'is-active' );

    // find the current and next content
    var current_content = '#' + current.id + '_content';
    var next_content = '#' + next.id + '_content';
    current_content = jQuery( current_content );
    next_content = jQuery( next_content );

    // toggle class "is-shown" on current and next content
    current_content.removeClass( 'is-shown' );
    next_content.addClass( 'is-shown' );

    // find the current and next player section
    var current_player = '#' + current.id + '_player';
    var next_player = '#' + next.id + '_player';
    current_player = jQuery( current_player );
    next_player = jQuery( next_player );

    // toggle class "is-shown" on current and next player section
    current_player.removeClass( 'is-shown' );
    next_player.addClass( 'is-shown' );

    // find the first audio in next content
    var first_play_link = '#' + next.id + '_content .play_link';
    first_play_link = jQuery( first_play_link )[0];

    // simulate "click" event on the first audio
    if ( first_play_link ) {
        first_play_link.click();
    }

}); // carousel next button ends

/*****************************************/
/*           PLAYLIST ANIMATION          */
/*****************************************/

// playlist collapse animation
function collapse( event ) {
    
    // access the playlist that triggered the "click" event
    var target = jQuery( event.currentTarget );
    
    var content;
    var content_box;

    // check if playlist is already collapsed
    if ( target.hasClass( 'collapsible-title' ) ) { // playlist is collapsed
        
        // toggle class on target playlist
        target.removeClass( 'collapsible-title' );
        target.addClass( 'collapsed-title' );
        
        // change playlist icon from plus to minus indicating it's collapsed
        content = target.text() + 
                  '<span class="icon">' +
                      '<i class="fas fa-minus-circle"></i>' +
                  '</span>';
        target.html( content );
        
        // get the target playlist content
        content_box = target.parent().parent().children( '.collapse-content' );
        
        // show content
        content_box.css( 'display', 'initial' );

    } 

    else { // playlist is not collapsed
        
        // toggle class on target playlist
        target.removeClass( 'collapsed-title' );
        target.addClass( 'collapsible-title' );
        
        // change playlist icon from minus to plus indicating it's folded
        content = target.text() + 
                  '<span class="icon">' +
                      '<i class="fas fa-plus-circle"></i>' +
                  '</span>';
        target.html( content );
        
        // get the target playist content
        content_box = target.parent().parent().children( '.collapse-content' );
        
        // hide content
        content_box.css( 'display', 'none' );
    
    }

} // playlist collapse animation ends

/***********************************/
/*           LOAD AUDIBLE          */
/***********************************/

// load audible by "click" event
jQuery( '.play_link' ).on( 'click', function( event ) {

    // pause currently playing audio first
    if ( jQuery( '.button.play_button' ).hasClass( 'play' ) ) {

        // pause audio
        var audio = jQuery( '.section.player.is-shown audio' );
        var audioElement = audio[0];
        audioElement.pause();

        // change to play button
        jQuery( '.button.play_button' ).html( '<i class="far fa-play-circle fa-2x"></i>' );
        jQuery( '.button.play_button' ).removeClass( 'play' );
        jQuery( '.button.play_button' ).addClass( 'pause' );

    }

    // reset progress bar
    jQuery( '.section.player.is-shown progress' ).attr( 'value', 0 );

    // access target audio 
    var target = jQuery( event.currentTarget );

    // access the currently selected audio
    var current = jQuery( '.play_link.is-selected' );
    
    // change icons of target audio and currently selected audio
    var content_selected = target.text() + 
                       '<span class="icon">' +
                           '<i class="far fa-check-circle"></i>' +
                       '</span>';
    var content_unselected = current.text() + 
                         '<span class="icon">' +
                             '<i class="far fa-play-circle"></i>' +
                         '</span>';
    
    // toggle class "is-selected" on target and currently selected audio
    current.removeClass( 'is-selected' );
    current.html( content_unselected );
    target.addClass( 'is-selected' );
    target.html( content_selected );

    // load track
    var dir;

    // bible
    if ( target.hasClass( 'bible' ) ) {
        dir = '/assets/audios/bible/';
    } 
    // the pilgrim's progress
    else if ( target.attr( 'id' ).search( 'pilgrims' ) !== -1 ) {
        dir = '/assets/audios/the_pilgrims_progress/';
    } 
    // humility
    else if ( target.attr( 'id' ).search( 'humility' ) !== -1 ) {
        dir = '/assets/audios/humility/';
    } 
    // the tongue - a creative force
    else if ( target.attr( 'id' ).search( 'tongue' ) !== -1 ) {
        dir = '/assets/audios/the_tongue/';
    } 
    // streams in the desert
    else if ( target.attr( 'id' ).search( 'streams' ) !== -1 ) {
        dir = '/assets/audios/streams/';
    } 
    // pray for godly characteristics into children
    else if ( target.attr( 'id' ).search( 'pray' ) !== -1 ) {
        dir = '/assets/audios/pray_for_children/';
    } 
    // the blessing and the curse of women
    else if ( target.attr( 'id' ).search( 'women' ) !== -1 ) {
        dir = '/assets/audios/women/';
    }

    // generate source url
    var srcUrl = theme_file.uri + dir + target.attr( 'id' ) + '.mp3';
    
    // access player section
    var title = jQuery( '.section.player.is-shown h3' );
    var audio = jQuery( '.section.player.is-shown audio' );
    var audioElement = audio[0];
    
    // update title and src for currently selected audio  
    title.html( target.text() );
    audio.attr( 'src', srcUrl );
    audio.load();

    // hide control panel first when loading audio
    jQuery( '.control_box .status' ).css( 'display', 'flex' );
    jQuery( '.control_box .controls' ).css( 'display', 'none' );

    // detect safari
    var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
    if ( isSafari ) {
        
        // show control panel and hide status directly
        jQuery( '.control_box .status' ).css( 'display', 'none' );
        jQuery( '.control_box .controls' ).css( 'display', 'flex' );

        // update progress bar
        time_mark_current.html( format_time( audioElement.currentTime ) );
        time_mark_duration.html( format_time( audioElement.duration ) );
        
    }
    else {
        // when audio is successfully loaded
        audio.on( 'canplay', function() {
            if ( audioElement.readyState > 3 ) {
                
                // show control panel and hide status
                jQuery( '.control_box .status' ).css( 'display', 'none' );
                jQuery( '.control_box .controls' ).css( 'display', 'flex' );
    
                // update progress bar    
                time_mark_current.html( format_time( audioElement.currentTime ) );
                time_mark_duration.html( format_time( audioElement.duration ) );
            
            }
        });

    }

});

/*******************************************/
/*           CONTROL PANEL LOGIC           */
/*******************************************/

// play button
jQuery( '.button.play_button' ).on( 'click', function() {
    
    // access currently playing audio
    var audioElement = jQuery( '.section.player.is-shown audio' )[0];

    // currently pause
    if ( jQuery( this ).hasClass( 'pause' ) ) {

        // play audio
        audioElement.play();

        // change to pause button
        jQuery( this ).html( '<i class="far fa-pause-circle fa-2x"></i>' );
        jQuery( this ).removeClass( 'pause' );
        jQuery( this ).addClass( 'play' );

    }
    // currently play
    else {

        // pause audio
        audioElement.pause();

        // change to play button
        jQuery( this ).html( '<i class="far fa-play-circle fa-2x"></i>' );
        jQuery( this ).removeClass( 'play' );
        jQuery( this ).addClass( 'pause' );

    }

});

// reset button
jQuery( '.button.reset_button' ).on( 'click', function() {

    // access currently playing audio
    var audioElement = jQuery( '.section.player.is-shown audio' )[0];

    // reset audio
    audioElement.currentTime = 0;

    // automatically change to play button
    if (jQuery( '.button.play_button' ).hasClass( 'play' ) ) {

        // pause audio
        audioElement.pause();

        // change to play button
        jQuery( '.button.play_button' ).html( '<i class="far fa-play-circle fa-2x"></i>' );
        jQuery( '.button.play_button' ).removeClass( 'play' );
        jQuery( '.button.play_button' ).addClass( 'pause' );

    }

});

// stepback button
jQuery( '.button.stepback_button' ).on( 'click', function() {

    // stop current audio by simulating "click" on reset button
    jQuery( '.button.reset_button' ).click();

    // track current item in playlist
    var current = jQuery( '.list.is-shown .play_link.is-selected' );

    // find its order in the playlist
    var total = jQuery( '.list.is-shown .play_link' );
    var index = total.index( current );

    // find the order of previous item in the playlist
    var length = total.length;
    var pre_index = ( index !== 0 )? --index : length - 1;

    // access previous item
    var pre = total.get( pre_index );

    // change to previous audio by simulating "click" on it
    pre.click();

    // auto-play by simulating "click" on play button
    jQuery( '.button.play_button' ).click();

});

// stepforward button
jQuery( '.button.stepforward_button' ).on( 'click', function() {

    // stop current audio by simulating "click" on reset button
    jQuery( '.button.reset_button' ).click();

    // track current item in playlist
    var current = jQuery( '.list.is-shown .play_link.is-selected' );

    // find its order in the playlist
    var total = jQuery( '.list.is-shown .play_link' );
    var index = total.index( current );

    // find the order of next item in the playlist
    var length = total.length;
    var next_index = ( index !== length - 1 )? ++index : 0;

    // access previous item
    var next = total.get( next_index );

    // change to previous audio by simulating "click" on it
    next.click();

    // auto-play by simulating "click" on play button
    jQuery( '.button.play_button' ).click();

});

/************************************/
/*           PROGRESS BAR           */
/************************************/

// update progress bar
document.querySelectorAll( '.section.player audio' ).forEach( function( element ) {

    element.addEventListener( 'timeupdate', function() {
    
        // calculate progress bar value
        var current = this.currentTime;
        var total = this.duration;
        var value = current / total * 100;
        
        // avoid NaN error
        if ( isNaN( value ) ) {
            value = 0;
        }

        // update progress bar
        jQuery( '.section.player.is-shown progress' ).attr( 'value', value );

        var time_mark_current = jQuery(this).parent().parent().find( '#current_time' );
        var time_mark_duration = jQuery(this).parent().parent().find( '#duration' );

        time_mark_current.html( format_time( current ) );
        time_mark_duration.html( format_time( total ) );
        
    });

});

// progress bar "click" event listener
document.addEventListener( 'click', function( e ) {

    if ( e.target.classList.contains( 'progress' ) ) {

        // calculate percentage
        var percent = e.offsetX / e.target.offsetWidth;

        // avoid NaN error
        if ( isNaN( percent ) ) {
            percent = 0;
        }

        // change audio current time
        var audio = document.querySelector( '.section.player.is-shown audio' );
        audio.currentTime = audio.duration * percent;

        // update progress bar
        jQuery( '.section.player.is-shown progress' ).attr( 'value', percent * 100 );

    }

}, false );

// help function to format time
function format_time( time_in_seconds ) {

    var hours, minutes, seconds

    // calculate hours
    hours = Math.floor( time_in_seconds / 3600 );

    // calculate minutes
    minutes = Math.floor( time_in_seconds / 60 );
    if ( hours > 0 ) {
        minutes = minutes % 60;
    }

    // calculate seconds
    seconds = Math.floor( time_in_seconds % 60 );

    // generate minutes part
    if ( !isNaN( minutes ) ) {
        minutes = ( minutes >= 10 )? minutes : "0" + minutes;
    } else {
        minutes = "--";
    }
    

    // generate seconds part
    if ( !isNaN( seconds ) ) {
        seconds = ( seconds >= 10 )? seconds : "0" + seconds;
    } else {
        seconds = "--";
    }
    

    return ( hours > 0 )? hours + ":" + minutes + ":" + seconds : minutes + ":" + seconds;

}

/*********************************/
/*           AUTO PLAY           */
/*********************************/

// autoplay next audio by using "ended event"
jQuery( 'audio.playing' ).on( 'ended', function( event ) {

    // reset progress bar
    jQuery( '.section.player.is-shown progress' ).attr( 'value', 0 );

    // track the current playlist
    var audible_player_id = jQuery(this).parent().parent().parent().attr('id');
    
    // track the corresponding item in the playlist
    audible_id = audible_player_id.replace( '_player', '_content' );
    var query = '#' + audible_id + ' .play_link';
    var current = jQuery( query + '.is-selected' );
    
    // find its order in the playlist
    var index = jQuery( query ).index( current );
    
    // find the order of its next audio in the playlist
    var length = jQuery( query ).length;
    var next_index = ( index !== length - 1 )? ++index : 0;

    // access next audio
    var next = jQuery( query ).get( next_index );
    next = jQuery( next );
    
    // change icons of next audio and current audio
    var content_selected = next.text() + 
                       '<span class="icon">' +
                           '<i class="far fa-check-circle"></i>' +
                       '</span>';
    var content_unselected = current.text() + 
                         '<span class="icon">' +
                             '<i class="far fa-play-circle"></i>' +
                         '</span>';
    
    // toggle class "is-seleted" on next and current audio
    current.removeClass('is-selected');
    current.html(content_unselected);
    next.addClass('is-selected');
    next.html(content_selected);

    // load track
    var dir;

    // bible
    if ( next.hasClass( 'bible' ) ) {
        dir = '/assets/audios/bible/';
    } 
    // the pilgrim's progress
    else if ( next.attr( 'id' ).search( 'pilgrims' ) !== -1 ) {
        dir = '/assets/audios/the_pilgrims_progress/';
    } 
    // humility
    else if ( next.attr( 'id' ).search( 'humility' ) !== -1 ) {
        dir = '/assets/audios/humility/';
    } 
    // the tongue - a creative force
    else if ( next.attr( 'id' ).search( 'tongue' ) !== -1 ) {
        dir = '/assets/audios/the_tongue/';
    } 
    // streams in the desert
    else if ( next.attr( 'id' ).search( 'streams' ) !== -1 ) {
        dir = '/assets/audios/streams/';
    } 
    // pray for godly characteristics into children
    else if ( next.attr( 'id' ).search( 'pray' ) !== -1 ) {
        dir = '/assets/audios/pray_for_children/';
    } 
    // the blessing and the curse of women
    else if ( next.attr( 'id' ).search( 'women' ) !== -1 ) {
        dir = '/assets/audios/women/';
    }

    // generate source url for next audio 
    var srcUrl = theme_file.uri + dir + next.attr( 'id' ) + '.mp3';
    var title = jQuery( '.section.player.is-shown h3' );
    
    // update title and src for currently selected audio
    title.html( next.text() );
    jQuery( this ).attr( 'src', srcUrl );
    this.load();

    // hide control panel first when loading audio
    jQuery( '.control_box .status' ).css( 'display', 'flex' );
    jQuery( '.control_box .controls' ).css( 'display', 'none' );

    // detect safari
    var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
    if ( isSafari ) {
        
        // show control panel and hide status directly
        jQuery( '.control_box .status' ).hide();
        jQuery( '.control_box .controls' ).show();
        
    } 
    else {
        // when audio is successfully loaded
        jQuery( this ).on( 'canplay', function() {
            if ( this.readyState > 3 ) {
    
                // show control panel and hide status
                jQuery( '.control_box .status' ).hide();
                jQuery( '.control_box .controls' ).show();
    
            }
            
        });
        
    }

    // play audio
    this.play();

    // change to pause button
    jQuery( '.button.play_button' ).html( '<i class="far fa-pause-circle fa-2x"></i>' );
    jQuery( '.button.play_button' ).removeClass( 'pause' );
    jQuery( '.button.play_button' ).addClass( 'play' );

});

// homepage to audible
jQuery( '#audible-showroom .to-audible' ).on( 'click', function( event ) {
    window.location.href = theme_file.site_url + '/audible';
});