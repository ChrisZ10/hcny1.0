// calculate nth day of year for today
var today = new Date();

var start = new Date(today.getFullYear(), 0, 0);
var difference = today - start;

var one_day = 1000 * 60 * 60 * 24;
var day = Math.floor(difference/one_day);

// create Sly obj
var sly = new Sly(jQuery('#date-slider .frame'), {

	// options
	slidee: jQuery('#date-slider .slidee'),
	horizontal: true,

	itemNav: 'basic',
	smart: true,
	activateOn: 'click',
	startAt: day - 1,

	mouseDragging: true,
	touchDragging: true,
	releaseSwing: true,
	elasticBounds: true,

	// scrollbar
	// scrollBar: jQuery('#date-slider .scrollbar'),
	// scrollBy: 1,
	// dragHandle: true,
	// dynamicHandle: true,
	// clickBar: true

});

// initiate Sly obj only when at "daily-devotion" page
if (jQuery('#date-slider .frame').length === 1) {	
	sly.init();
}

// fetch daily devotion article on a specific date
jQuery('#date-slider .frame li').on('click', function(event) {
	
	// only if not disabled
	if (jQuery(event.target).attr('disabled') !== 'disabled') {
		
		// find nth day of the year
		var index = jQuery(event.target).index();
		var str = '&index=' + index + '&action=find_post';
		
		// send ajax request
		jQuery.ajax({
			type: 'GET',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
            	// display content
            	jQuery('#single-devotion-container').html(res[0].content);
            },
            failure: function(err) {
                console.log(err);
            }
        });

	}

});

jQuery('#back-to-current').on('click', function() {
	jQuery('#date-slider .frame').sly('activate', day - 1);
});

jQuery('#prev-date').on('click', function() {
	jQuery('#date-slider .frame').sly('prev');
});

jQuery('#next-date').on('click', function() {
	jQuery('#date-slider .frame').sly('next');
});

sly.on('active', function (eventName, itemIndex) {
	
	if (!jQuery('.slidee li').eq(itemIndex).attr('disabled')) {
	
		var str = '&index=' + itemIndex + '&action=find_post';
		
		// send ajax request
		jQuery.ajax({
			type: 'GET',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
            	// display content
            	jQuery('#single-devotion-container').html(res[0].content);
            },
            failure: function(err) {
                console.log(err);
            }
        });

	}
});

