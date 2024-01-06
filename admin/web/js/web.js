$(function(){
	
	var charts = $('.graph-container'),
	highcharts = [],
	i = 0,
	stop = false;
    
    if (getCookie('menu-show')) {
        var $this = $('.hidden-menu');
        $this.addClass('active');
        $this.find('i').removeClass('fa-chevron-circle-left');
        $this.find('i').addClass('fa-chevron-circle-right');
        $('.menu-right').css('margin-left', '-250px');
        $('.body-content').css('padding-left', '0px');
    }
	
	$('.hidden-menu').on('click', function(){
		var $this = $(this);
		
		if ($this.hasClass('active')) {
			$this.removeClass('active');
			$this.find('i').removeClass('fa-chevron-circle-right');
			$this.find('i').addClass('fa-chevron-circle-left');
			
			$('.menu-right').animate({
				'margin-left': 0
			}, {
				duration: 400
			});

			$('.body-content').animate({
				'padding-left': 250
			}, {
				duration: 400,
				start: function() {firstUpdate()},
				complete: function() {stopUpdate(); chartUpdate();}
			});
            deleteCookie('menu-show');
			
		} else {
			$this.addClass('active');
			
			$this.find('i').removeClass('fa-chevron-circle-left');
			$this.find('i').addClass('fa-chevron-circle-right');
			
			$('.menu-right').animate({
				'margin-left': -250
			}, {
				duration: 400
			});

			$('.body-content').animate({
				'padding-left': 0
			}, {
				duration: 400,
				start: function() {firstUpdate()},
				complete: function() {stopUpdate(); chartUpdate();}
			});
            setCookie('menu-show', 1, 2050, 1, 1);
		}
	});
	
	$( window ).resize(function() {
		chartUpdate();
	});

	setTimeout(function() { 
		
		if (charts.length) {
			for (i = 0; i<charts.length; i++) {
				highcharts[i] = [];
				highcharts[i]['highchart'] = $(charts[i]).highcharts();
				highcharts[i]['parent'] = $(charts[i]).parent();
			}
		}
		
	}, 500);
	
	function chartUpdate() {
		for (i = 0; i < highcharts.length; i++) {
			var $parent  = $(highcharts[i]['parent']);
			highcharts[i]['highchart'].setSize($parent.width(), $parent.height(), false);
		}
	}
	
	function firstUpdate() {
		chartUpdate();
		if (!stop) {
			setTimeout(function() { firstUpdate() }, 15);
		} else {
			stop = false;
		}
	}
	
	function lastUpdate() {
		chartUpdate();
        if (!stop) {
            setTimeout(function () {
                firstUpdate()
            }, 15);
        } else {
            stop = false;
        }
    }

    function stopUpdate() {
        stop = true;
    }

    function setCookie(name, value) {

    }

    function setCookie(name, value, exp_y, exp_m, exp_d) {
        var cookie_string = name + "=" + escape(value);
        var expires = new Date(exp_y, exp_m, exp_d);
        cookie_string += "; expires=" + expires.toGMTString();
        document.cookie = cookie_string;
    }

    function deleteCookie(name) {
        var cookie_string = name + "=0";
        var expires = new Date(0);
        cookie_string += "; expires=" + expires.toGMTString();
        document.cookie = cookie_string;
    }

    function getCookie(cookie_name) {
        var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
        return results ? unescape(results[2]) : null;
    } 
	
});