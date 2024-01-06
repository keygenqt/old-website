$(function () {

    $(window).resize(function (event) {
        if ($('.pagination').length === 0) {
            $('div.body').not('.site-index').find('.content-data div.page').css('padding-bottom', '30px')
        }
    });

    $(window).scroll(function (event) {
        const scroll = $(window).scrollTop();
        const topFooter = ($('.body').height() - $('.footer').outerHeight()) - ($(window).height());
        const buttonUpTop = $(window).width() > 1230 ? 100 : 80;
        const buttonThemeTop = 30;

        if (scroll < topFooter || ($(window).width() < 1230)) {
            $('.button-up').css('bottom', buttonUpTop + 'px');
            $('.button-theme').css('bottom', buttonThemeTop + 'px');
        } else {
            $('.button-up').css('bottom', (buttonUpTop + (scroll - topFooter)) + 'px');
            $('.button-theme').css('bottom', (buttonThemeTop + (scroll - topFooter)) + 'px');
        }
        if (scroll > 100) {
            $('.button-up').show();
        } else {
            $('.button-up').hide();
        }
    });

    $('.button-up').click(function () {
        $('html, body').animate({scrollTop: 0}, 300);
    });

    $('.button-theme').click(function () {
        const body = $('body');
        if (body.hasClass('black')) {
            body.removeClass('black');
            $.get('/ajax/add-theme?theme=0', function (data) {
                console.log(data);
            });
        } else {
            body.addClass('black');
            $.get('/ajax/add-theme?theme=1', function (data) {
                console.log(data);
            });
        }
    });

    setTimeout(function () {
        $(window).scroll();
        $(window).resize();
    }, 50);
});

function setCookie(name, value) {
    let string = name + "=" + escape(value);
    let expires = new Date(2050, 1, 1);
    string += "; expires=" + expires.toGMTString();
    document.cookie = string;
}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}