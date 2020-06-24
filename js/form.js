jQuery('.find-church-btn').on('click', function() {
	var results = jQuery('#church-results .container');
	var keyword = jQuery('input[name=keyword]').val();
	var zip = jQuery('input[name=zip]').val();
    var city = jQuery('select[name=city]').val();
    var area = jQuery('select[name=area]').val();
	var day = jQuery('select[name=day]').val();
	var time = jQuery('select[name=time]').val();
	var lan = jQuery('select[name=language]').val();

	if (keyword === '' && zip === '' && city === 'none' && area === 'none' && day === 'none' && time === 'none' && lan === 'none') {
		alert('請設定搜索條件');
		jQuery('input[name=keyword]').focus();
	}

    if ((zip !== '' && is_valid(zip)) || 
        (zip === '' && (keyword !== '' || city !== 'none' || area !== 'none' || day !== 'none' || time !== 'none' || lan !== 'none'))) {
        results.html('<p class="is-size-6">正在為您搜索...</p>');
        var str = '&keyword=' + keyword +
                  '&zip=' + zip +
                  '&city=' + city +
                  '&area=' + area +
                  '&day=' + day +
                  '&time=' + time +
                  '&lan=' + lan +
                  '&action=find_church';
        //console.log(str);
        jQuery.ajax({
            type: 'GET',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
                //console.log(res);
                if (res.length === 0) {
                    results.html('<p class="is-size-6">抱歉，沒有找到任何匹配的結果</p>');
                } else {
                    var churches = list_churches(res);
                    results.html(
                        '<p class="is-size-6">找到 <strong>' + res.length + 
                        '</strong> 個匹配的結果：</p>' + 
                        '<hr>' +
                        churches
                    );
                }
                jQuery([document.documentElement, document.body]).animate({
                    scrollTop: jQuery("#church-results .container").offset().top
                }, 2000);
            },
            failure: function(err) {
                alert('搜索過程中發生錯誤，請重試');
                console.log(err);
            }
        });
    }

});

jQuery('input[name=keyword]').on('keyup', function(event) {
    if (event.which === 13) {
        jQuery('.find-church-btn').click();
    }
});

jQuery('input[name=zip]').on('keyup', function(event) {
    if (event.which === 13) {
        jQuery('.find-church-btn').click();
    }
});

function is_valid(zip) {
	var regex = /^[0-9]{5}$/g;
    if (zip.match(regex) === null) {
        alert('請輸入有效郵編，例如：11362');
        jQuery('input[name=zip]').focus();
        return false;
    } else
    	return true;
}

function list_churches(res) {
	var churches = '';
    
    for (i = 0; i < res.length; i++) {        
        //chinese name
        churches += '<p class="is-size-6 single-church">' +
               '<strong>' + res[i].church_name + '</strong>';
        //english name
        if (res[i].english_name !== null) {
            churches += ' | ' + res[i].english_name + '<br>';
        } else {
            churches += '<br>';
        }
        //website
        if (res[i].website !== null) {
            churches += '<a href="http://' + res[i].website +'" target="_blank">' +
                   res[i].website + '</a><br>';
        }        
        //address
        churches += '<span class="icon"><i class="fas fa-map-marker-alt"></i></span> ';
        churches += res[i].street + ', ' +
               res[i].city + ', ' +
               res[i].state + ' ' +
               res[i].zip + '<br>';    
        //contact
        churches += '<span class="icon"><i class="fas fa-user"></i></span> ';
        churches += res[i].contact_name + ' ' +
               res[i].title + ' | ' +
               '(' + res[i].phone.substring(0,3) + ') ' +
               res[i].phone.substring(3,6) + '-' +
               res[i].phone.substring(6) +
               '<br>';        
        //schedule
        churches += '<span class="icon"><i class="fas fa-calendar-alt"></i></span> ';
        churches += '聚會時間：<br>';        
        for (j = 0; j < res[i].schedule.length; j++) {
            var day;
            switch(res[i].schedule[j][0]) {
            	case 'mon': day = '週一';break;
            	case 'tue': day = '週二';break;
            	case 'wed': day = '週三';break;
            	case 'thu': day = '週四';break;
            	case 'fri': day = '週五';break;
            	case 'sat': day = '週六';break;
            	case 'sun': day = '週日';break;
            }
            var lan;
        	switch(res[i].schedule[j][2]) {
        		case 'mandarin': lan = '國語';break;
        		case 'english': lan = '英語';break;
                case 'spanish': lan = '西語';break;
                case 'thai': lan = '泰語';break;
                case 'korean': lan = '韓語';break;
        		case 'cantonese': lan = '粵語';break;
                case 'taiwanese': lan = '台语';break;
        		case 'foochow': lan = '福州話';break;
        		case 'wenzhounese': lan = '溫州話';break;
                case 'teochew': lan = '潮州話';break;
        	}

            churches += day + ' ' +
                        res[i].schedule[j][1].substring(0,5) + ' ' +
                        lan + '<br>'; 
        }
        churches += '</p>';
    }
    return churches;
}