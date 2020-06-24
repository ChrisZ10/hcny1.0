//find-church
jQuery('#by-name').on('click', function(event) {
    //window.location.href = theme_file.site_url + '/church-results';
    var content = jQuery('#find-church-results .container');
    
    var name = jQuery('input[name=church-name]').val();   
    //check input validity
    if (name === '') {
        alert('請輸入您要查找的教會名稱');
        jQuery('input[name=church-name]').focus();
    }
    else {
        content.html('<p class="is-size-6">正在為您搜索...</p>');
        var str = '&name=' + name + '&action=search_by_church_name';
        //console.log(str);
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
                //console.log(res);
                jQuery('input[name=church-name]').val('');                   
                if (res.length === 0) {
                    content.html('<p class="is-size-6">抱歉，沒有找到任何匹配的結果</p>');
                } else {
                    var lists = list_churches(res);
                    content.html(
                        '<p class="is-size-6">找到 <strong>' + res.length + 
                        '</strong> 個名稱包含 <strong>' + name + 
                        '</strong> 的教會：</p>' + 
                        '<hr>' +
                        lists
                    );
                }
            },
            failure: function(err) {
                alert('搜索過程中發生錯誤，請重試');
                //console.log(err);
            }
        });
    }        
});

jQuery('#by-zip').on('click', function(event) {
    var content = jQuery('#find-church-results .container');

    var zip = jQuery('input[name=church-zip]').val();
    //check input validity
    if (zip === '') {
        alert('請輸入郵編');
        jQuery('input[name=church-zip]').focus();
    } else {
        var regex = /^[0-9]{5}$/g;
        if (zip.match(regex) === null) {
            alert('請輸入有效郵編');
            jQuery('input[name=church-zip]').focus();
        } else {
            content.html('<p class="is-size-6">正在為您搜索...</p>');
            var str = '&zip=' + zip + '&action=search_by_church_zip';
            //console.log(str);
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',       
                url: ajax_obj.url,
                data: str,
                success: function(res) {
                    //console.log(res);
                    jQuery('input[name=church-zip]').val('');                   
                    if (res.length === 0) {
                        content.html('<p class="is-size-6">抱歉，沒有找到任何匹配的結果</p>');
                    } else {
                        var lists = list_churches(res);
                        content.html(
                            '<p class="is-size-6">找到 <strong>' + res.length + 
                            '</strong> 個郵編是 <strong>' + zip + 
                            '</strong> 的教會：</p>' + 
                            '<hr>' +
                            lists
                        );
                    }
                },
                failure: function(err) {
                    alert('搜索過程中發生錯誤，請重試');
                    //console.log(err);
                }
            });
        }     
    }
});

jQuery('#by-city').on('click', function(event) {
    var content = jQuery('#find-church-results .container');

    var city = jQuery('input[name=church-city]').val();
    //check input validity
    if (city === '') {
        alert('請輸入城市');
        jQuery('input[name=church-city]').focus();
    } else {
        content.html('<p class="is-size-6">正在為您搜索...</p>');
        var str = '&city=' + city + '&action=search_by_church_city';
        //console.log(str);
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
                //console.log(res);
                jQuery('input[name=church-city]').val('');                   
                if (res.length === 0) {
                    content.html('<p class="is-size-6">抱歉，沒有找到任何匹配的結果</p>');
                } else {
                    var lists = list_churches(res);
                    content.html(
                        '<p class="is-size-6">找到 <strong>' + res.length + 
                        '</strong> 個在 <strong>' + city + 
                        '</strong> 聚會的教會：</p>' + 
                        '<hr>' +
                        lists
                    );
                }
            },
            failure: function(err) {
                alert('搜索過程中發生錯誤，請重試');
                //console.log(err);
            }
        });
    }

});

jQuery('#by-time').on('click', function(event) {
    var content = jQuery('#find-church-results .container');

    var select = jQuery('select[name=church-day]').val();
    var day;
    switch(select) {
        case '週一': 
            day = 'mon'; 
            break;
        case '週二': 
            day = 'tue'; 
            break;
        case '週三': 
            day = 'wed'; 
            break;
        case '週四': 
            day = 'thu'; 
            break;
        case '週五': 
            day = 'fri'; 
            break;
        case '週六': 
            day = 'sat'; 
            break;
        case '週日': 
            day = 'sun'; 
            break;
        default: 
    }
    var time = jQuery('input[name=church-time]').val();
    if (time === '') {
        alert('請輸入聚會時間');
        jQuery('input[name=church-time]').focus();
    } else {
        content.html('<p class="is-size-6">正在為您搜索...</p>');
        var str = '&day=' + day + '&time=' + time + '&action=search_by_church_time';
        //console.log(str);
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
                //console.log(res);
                jQuery('select[name=church-day]').val('週日');
                jQuery('input[name=church-time]').val('');                   
                if (res.length === 0) {
                    content.html('<p class="is-size-6">抱歉，沒有找到任何匹配的結果</p>');
                } else {
                    var lists = list_churches(res);
                    content.html(
                        '<p class="is-size-6">找到 <strong>' + res.length + 
                        '</strong> 個在 <strong>' + select + ' ' + time +
                        '</strong> 有聚會的教會：</p>' + 
                        '<hr>' +
                        lists
                    );
                }
            },
            failure: function(err) {
                alert('搜索過程中發生錯誤，請重試');
                //console.log(err);
            }
        });
    }
});

jQuery('#by-lan').on('click', function(event) {
    var content = jQuery('#find-church-results .container');

    var select = jQuery('select[name=church-language]').val();
    var language;
    switch(select) {
        case '國語': 
            language = 'mandarin'; 
            break;
        case '英語': 
            language = 'english'; 
            break;
        case '粵語': 
            language = 'cantonese'; 
            break;
        case '福州話': 
            language = 'foochow'; 
            break;
        case '溫州話': 
            language = 'wenzhounese'; 
            break;
        default: 
    }
    content.html('<p class="is-size-6">正在為您搜索...</p>');
    var str = '&language=' + language + '&action=search_by_church_language';
    //console.log(str);
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',       
        url: ajax_obj.url,
        data: str,
        success: function(res) {
            //console.log(res);                   
            if (res.length === 0) {
                content.html('<p class="is-size-6">抱歉，沒有找到任何匹配的結果</p>');
            } else {
                var lists = list_churches(res);
                content.html(
                    '<p class="is-size-6">找到 <strong>' + res.length + 
                    '</strong> 個有 <strong>' + select + 
                    '</strong> 聚會的教會：</p>' + 
                    '<hr>' +
                    lists
                );
            }
        },
        failure: function(err) {
            alert('搜索過程中發生錯誤，請重試');
            //console.log(err);
        }
    });
});

jQuery('input[name=church-name]').on('keyup', function(event) {
    if (event.which === 13) {
        jQuery('#by-name').click();
    }
});
jQuery('input[name=church-zip]').on('keyup', function(event) {
    if (event.which === 13) {
        jQuery('#by-zip').click();
    }
});
jQuery('input[name=church-city]').on('keyup', function(event) {
    if (event.which === 13) {
        jQuery('#by-city').click();
    }
});
jQuery('input[name=church-time]').on('keyup', function(event) {
    if (event.which === 13) {
        jQuery('#by-time').click();
    }
});

function list_churches(res) {
    var str = '';
    for (i = 0; i < res.length; i++) {
        
        //chinese name
        str += '<p class="is-size-6 single-church">' +
               '<strong>' + res[i].church_name + '</strong>';
        
        //english name
        if (res[i].english_name !== null) {
            str += ' | ' + res[i].english_name + '<br>';
        } else {
            str += '<br>';
        }
        
        //website
        if (res[i].website !== null) {
            str += '<a href="http://' + res[i].website +'" target="_blank">' +
                   res[i].website + '</a><br>';
        }
        
        //address
        str += '<span class="icon"><i class="fas fa-map-marker-alt"></i></span> ';
        str += res[i].street + ', ' +
               res[i].city + ', ' +
               res[i].state + ' ' +
               res[i].zip + '<br>';
        
        //contact
        str += '<span class="icon"><i class="fas fa-user"></i></span> ';
        str += res[i].contact_name + ' ' +
               res[i].title + ' | ' +
               '(' + res[i].phone.substring(0,3) + ') ' +
               res[i].phone.substring(3,6) + '-' +
               res[i].phone.substring(6) +
               '<br>';
        
        //schedule
        str += '<span class="icon"><i class="fas fa-calendar-alt"></i></span> ';
        str += '聚會時間：<br>';        
        for (j = 0; j < res[i].schedule.length; j++) {
            str += res[i].schedule[j][0].toUpperCase() + ' ' +
                   res[i].schedule[j][1].substring(0,5) + ' ' +
                   res[i].schedule[j][2].charAt(0).toUpperCase() + 
                   res[i].schedule[j][2].substring(1) + '<br>'; 
        }

        str += '</p>';
    }
    return str;
}

//update profile
/*jQuery('#edit_ln').on('click', function() {
    //console.log('test');
    if (document.querySelector('#ln').disabled) {
        document.querySelector('#ln').disabled = false;
        document.querySelector('#edit_ln').innerHTML = '<i class="fas fa-check"></i>';
    } else {
        var em = document.querySelector('#em').value;
        var ln = document.querySelector('#ln').value;
        var str = '&em=' + em + '&ln=' + ln + '&action=update_ln';
        console.log(str);
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
                console.log(res);
            },
            failure: function(err) {
                console.log(err);
            }
        });
        alert('姓氏已更新');
        document.querySelector('#ln').disabled = true;
        document.querySelector('#edit_ln').innerHTML = '<i class="fas fa-pen"></i>';
    }
});
jQuery('#edit_fn').on('click', function() {
    //console.log('test');
    if (document.querySelector('#fn').disabled) {
        document.querySelector('#fn').disabled = false;
        document.querySelector('#edit_fn').innerHTML = '<i class="fas fa-check"></i>';
    } else {
        var em = document.querySelector('#em').value;
        var fn = document.querySelector('#fn').value;
        var str = '&em=' + em + '&fn=' + fn + '&action=update_fn';
        console.log(str);
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
                console.log(res);
            },
            failure: function(err) {
                console.log(err);
            }
        });
        alert('名字已更新');
        document.querySelector('#fn').disabled = true;
        document.querySelector('#edit_fn').innerHTML = '<i class="fas fa-pen"></i>';
    }
});
jQuery('#edit_zip').on('click', function() {
    //console.log('test');
    if (document.querySelector('#zip').disabled) {
        document.querySelector('#zip').disabled = false;
        document.querySelector('#edit_zip').innerHTML = '<i class="fas fa-check"></i>';
    } else {
        var em = document.querySelector('#em').value;
        var zip = document.querySelector('#zip').value;
        var str = '&em=' + em + '&zip=' + zip + '&action=update_zip';
        console.log(str);
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',       
            url: ajax_obj.url,
            data: str,
            success: function(res) {
                console.log(res[2]);
                if (res[2] === 'empty zip')
                    alert('請輸入您的郵編');
                else if (res[2] === 'invalid zip')
                    alert('請輸入有效郵編');
                else {
                    alert('郵編已更新');
                    document.querySelector('#zip').disabled = true;
                    document.querySelector('#edit_zip').innerHTML = '<i class="fas fa-pen"></i>';
                }
            },
            failure: function(err) {
                console.log(err);
            }
        });        
    }
});*/

//ride
/*jQuery('#submit_requested_ride').on('click', function() {
    //console.log('test');
    var ln = document.querySelector('#ride_ln').value;
    var fn = document.querySelector('#ride_fn').value;
    var cn = document.querySelector('#ride_cn').value;
    var event = document.querySelector('#ride_event').value;
    var time = document.querySelector('#ride_time').value;
    var seats = document.querySelector('#ride_seats').value;
    var city = document.querySelector('#ride_city').value;
    var st = document.querySelector('#ride_st').value;
    var crst = document.querySelector('#ride_crst').value;

    var str = '&ln=' + ln + 
              '&fn=' + fn + 
              '&cn=' + cn + 
              '&event=' + event + 
              '&time=' + time + 
              '&seats=' + seats + 
              '&city=' + city + 
              '&st=' + st + 
              '&crst=' + crst + 
              '&action=create_requested_ride';
    console.log(str);
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',       
        url: ajax_obj.url,
        data: str,
        success: function(res) {
            console.log(res);
        },
        failure: function(err) {
            console.log(err);
        }
    });
});*/

//library

//add a book
/*jQuery('#add-book').on('click', function() {
    
    //console.log('test');
    
    var isbn = jQuery('input[name=isbn]').val();
    var title = jQuery('input[name=title]').val();
    var authors = jQuery('input[name=authors]').val();
    var year = jQuery('input[name=year]').val();
    var copies = jQuery('input[name=copies]').val();
    var avail = jQuery('input[name=avail]').val();
    var summary = jQuery('textarea#summary').val();

    var str = '&isbn=' + isbn + 
              '&title=' + title + 
              '&authors=' + authors + 
              '&year=' + year + 
              '&copies=' + copies + 
              '&avail=' + avail + 
              '&summary=' + summary +
              '&action=add_book';
    console.log(str);

    jQuery.ajax({
        type: 'POST',
        dataType: 'json',       
        url: ajax_obj.url,
        data: str,
        success: function(res) {
            console.log(res);
        },
        failure: function(err) {
            console.log(err);
        }
    });
    
});*/