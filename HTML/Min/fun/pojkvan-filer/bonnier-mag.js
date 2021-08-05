/* v 2012-11-12 */

/*! A fix for the iOS orientationchange zoom bug.
Script by @scottjehl, rebound by @wilto.
MIT / GPLv2 License.
*/
(function (w) {

    // This fix addresses an iOS bug, so return early if the UA claims it's something else.
    var ua = navigator.userAgent;
    if (!(/iPhone|iPad|iPod/.test(navigator.platform) && /OS [1-5]_[0-9_]* like Mac OS X/i.test(ua) && ua.indexOf("AppleWebKit") > -1)) {
        return;
    }

    var doc = w.document;


    if (!doc.querySelector) { return; }

    var meta = doc.querySelector("meta[name=viewport]"),
        initialContent = meta && meta.getAttribute("content"),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;

    if (!meta) { return; }

    function restoreZoom() {
        meta.setAttribute("content", enabledZoom);
        enabled = true;
    }

    function disableZoom() {
        meta.setAttribute("content", disabledZoom);
        enabled = false;
    }

    function checkTilt(e) {
        aig = e.accelerationIncludingGravity;
        x = Math.abs(aig.x);
        y = Math.abs(aig.y);
        z = Math.abs(aig.z);

        // If portrait orientation and in one of the danger zones
        if ((!w.orientation || w.orientation === 180) && (x > 7 || ((z > 6 && y < 8 || z < 8 && y > 6) && x > 5))) {
            if (enabled) {
                disableZoom();
            }
        }
        else if (!enabled) {
            restoreZoom();
        }
    }

    w.addEventListener("orientationchange", restoreZoom, false);
    w.addEventListener("devicemotion", checkTilt, false);

})(this);

$(document).ready(function () {

    $('html').removeClass('no-js').addClass('js');

    /*
    $('#page-wrapper').waypoint(function(event, direction) {
    offset: '-100%'
    }).find('.main-nav').waypoint(function(event, direction) {
    $('.main-nav').toggleClass('sticky', direction === "down");
    event.stopPropagation();
    });

    /*	$('#page-wrapper').waypoint(function(event, direction) {
    offset: '-100%'
    }).find('.secondary-nav').waypoint(function(event, direction) {
    $('.secondary-nav').toggleClass('sticky', direction === "down");
    $('.secondary-nav .nav-label').animate({ opacity: 1 }, { duration: 500 }, direction === "up");
    event.stopPropagation();
    });
    */

    $.waypoints.settings.scrollThrottle = 30;
    $('#page-wrapper').find('.main-nav').waypoint(function (event, direction) {
        if (event === 'enter', direction === 'down') {
            $(this).addClass('sticky', direction === "down");
            $('.main-nav .nav-label').animate({ opacity: 100 }, { duration: 5000 });
            $('.secondary-nav .nav-label').animate({ opacity: 0 }, { duration: 500 });
            $('.secondary-nav').css({ zIndex: 100 });
        }
        else {
            $(this).removeClass('sticky', direction === "up");
            $('.main-nav .nav-label').animate({ opacity: 0 }, { duration: 500 });
        }
    });

    $('#page-wrapper').find('.secondary-nav').waypoint(function (event, direction) {
        if (event === 'enter', direction === 'down') {
            $(this).addClass('sticky', direction === "down");
            $('.secondary-nav').css({ zIndex: 200 });
        }
        else {
            $('.secondary-nav').removeClass('sticky', direction === "up");
            $('.secondary-nav .nav-label').animate({ opacity: 1 }, { duration: 500 });
        }
    });

    $('.social-links .share > a').click(function () {
        $(this).parent().toggleClass('active');
        return false;
    });

    $('.has-dropdown').hover(function () {
        $(this).addClass('active')
    }, function () {
        $(this).removeClass('active')
    });

    $('.has-dropdown a').click(function () {
        $(this).parent().toggleClass('active');
        return false;
    });

    $('.is-dropdown input[type=checkbox]').click(function () {
        $(this).closest('.has-dropdown').addClass('is-selected');
    });

    $('.is-dropdown input[type=checkbox][unchecked]').each(
	    function () {
	        $(this).closest('.has-dropdown').removeClass('is-selected')
	    }
	);

    $('a[href*=#]').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
		&& location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
            if ($target.length) {
                var targetOffset = $target.offset().top;
                $('html,body').animate({ scrollTop: targetOffset }, 1000);
                return false;
            }
        }
    });

    /*	
    $('.secondary-nav .search-wrapper').waypoint({ offset: 100 },function(event, direction) {
    if (direction === 'down') {
    $('.secondary-nav .nav-label').animate({ opacity: 0 }, { duration: 500 });
    }
    else {
    $('.secondary-nav .nav-label').animate({ opacity: 1 }, { duration: 500 });
    }
    });
    */

    var header = undefined;
    var menu = undefined;
    var menuButton = undefined;

    $(document).ready(function () {
        header = $('.header-wrapper');
        menu = $('.main-nav');
        menuButton = $('<div class="menu-button is-added"><a href="#">Meny</a></div>');
        menuButton.click(showMenu);
        header.append(menuButton);
    })

    function showMenu(event) {
        if (menu.is(":visible"))
            menu.slideUp({ complete: function () { $(this).css('display', '') } });
        else
            menu.slideDown();
    }

    var secHeader = undefined;
    var secMenu = undefined;
    var secMenuButton = undefined;

    $(document).ready(function () {
        secHeader = $('.secondary-nav');
        secMenu = $('.secondary-nav ul');
        secMenuButton = $('<div class="menu-button is-added"><a href="#">Meny</a></div>');
        secMenuButton.click(showSecMenu);
        secHeader.append(secMenuButton);
    })

    function showSecMenu(event) {
        if (secMenu.is(":visible"))
            secMenu.slideUp({ complete: function () { $(this).css('display', '') } });
        else
            secMenu.slideDown();
    }


});


var undoCarousel = function () {
    if (!$(".slider-container").length) {
        return;
    }
    $(".slider-container").cycle("destroy");
    $(".added").remove();
    $(".slide").replaceWith($('.slide').contents());
    $(".slider-container").replaceWith($('.slider-container').contents());
};

var initCarousel = function (imagesPerSlide) {
    var n = imagesPerSlide || 5;

    undoCarousel();

    var container = $(".teaser-group");
    var height = container.height();
    var width = container.width();
    var items = $(".nav-teaser");
    var end = Math.ceil(items.length / n);

    for (var j = 0; j < n * end - items.length; j++) {
        newItem = $(".nav-teaser:eq(" + j + ")").clone().addClass("added").appendTo(container);
    }

    container.wrapInner("<ul class='slider-container'/>");
    var gt = "";
    var slideGroups = [];
    for (var i = 0; i != end; i++) {
        if (i != 0) {
            // use jquery slice()
            gt = ":gt(" + (i * n - 1) + ")";
        }
        slideGroups[i] = $(".nav-teaser" + gt + ":lt(" + n + ")");
    }
    for (var i = 0; i != end; i++) {
        slideGroups[i].wrapAll("<li class='slide' />");
    }

    $(".slider-container").cycle({
        fit: 1,
        fx: "scrollHorz",
        prev: ".btn-left",
        next: ".btn-right",
        speed: 'fast',
        timeout: 0,
        width: n == 1 ? width : null
    });
};

$(document).ready(function () { //when the document is ready

    if ($(window).width() >= 980) {
        initCarousel(5);
    }
    else
        if (($(window).width() < 980) && ($(window).width() >= 748)) {
            initCarousel(4);
        }
        else
            if ($(window).width() < 748) {
                initCarousel(1);
            }

    $(".pagination a").hover(
  function () {
      $(this).addClass('hover-btn');
  },
  function () {
      $(this).removeClass('hover-btn');
  });

    window.onorientationchange = function () {

        if ($(window).width() >= 980) {
            initCarousel(5);
        } else if (($(window).width() < 980) && ($(window).width() >= 748)) {
            initCarousel(4);
        } else if ($(window).width() < 748) {
            initCarousel(1);
        }
    };

    if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
        var viewportmeta = document.querySelector('meta[name="viewport"]');
        if (viewportmeta) {
            viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
            document.body.addEventListener('gesturestart', function () {
                viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
            }, false);
        }


    }

});

/*
* jQuery Media Helper Utilities from jQuery Mobile: resolution and CSS media query related helpers and behavior
* Copyright (c) jQuery Project, Scott Jehl, Filament Group, Inc
* Dual licensed under the MIT (MIT-LICENSE.txt) and GPL (GPL-LICENSE.txt) licenses.
*/
(function (f, i, d) { var c = f(i), e = f("html"), k = i.document, h = [320, 480, 768, 1024]; f.mh = {}; f.mh.media = (function () { var m = {}, n = f("<div id='jquery-mediatest'>"), o = f("<body>").append(n); return function (q) { if (!(q in m)) { var p = f("<style type='text/css'>@media " + q + "{#jquery-mediatest{position:absolute;}}</style>"); e.prepend(o).prepend(p); m[q] = n.css("position") === "absolute"; o.add(p).remove() } return m[q] } })(); var a, b, g; f.event.special.orientationchange = a = { setup: function () { if ("orientation" in i) { return false } g = b(); c.bind("resize", l) }, teardown: function () { if (f.support.orientation) { return false } c.unbind("resize", l) }, add: function (m) { var n = m.handler; m.handler = function (o) { o.orientation = b(); return n.apply(this, arguments) } } }; function l() { var m = b(); if (m !== g) { g = m; c.trigger("orientationchange") } } a.orientation = b = function () { var m = k.documentElement; return m && m.clientWidth / m.clientHeight < 1.1 ? "portrait" : "landscape" }; function j() { var m = c.width(), q = "min-width-", o = "max-width-", s = [], p = [], r = "px", n; e.removeClass(q + h.join(r + " " + q) + r + " " + o + h.join(r + " " + o) + r); f.each(h, function (t, u) { if (m >= u) { s.push(q + u + r) } if (m <= u) { p.push(o + u + r) } }); if (s.length) { n = s.join(" ") } if (p.length) { n += " " + p.join(" ") } e.addClass(n) } f.mh.addResolutionBreakpoints = function (m) { if (f.type(m) === "array") { h = h.concat(m) } else { h.push(m) } h.sort(function (o, n) { return o - n }); j() }; c.bind("orientationchange.htmlclass resize.htmlclass", function (m) { if (m.orientation) { e.removeClass("portrait landscape").addClass(m.orientation) } j() }); c.trigger("orientationchange.htmlclass") })(jQuery, this);