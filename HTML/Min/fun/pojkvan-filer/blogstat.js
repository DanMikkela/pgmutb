var listen = function(evnt, elem, func) {
    if (elem.addEventListener)  // W3C DOM
    	{
        elem.addEventListener(evnt,func,false);
    	}
    else if (elem.attachEvent) { // IE DOM
        var r = elem.attachEvent("on"+evnt, func);
        return r;
    }
    else window.alert('I\'m sorry Dave, I\'m afraid I can\'t do that.');
};
listen('readystatechange', document, function() {
    if (document.readyState != "complete") {
        return;
    }
    var statarea = document.getElementById('blogportalstats');
    var blogid = statarea.getAttribute('title');
    if (!blogid) {
    	blogid = statarea.getAttribute('name');
   	}
    var statlink = document.createElement('a');
    statlink.href ="http://www.bloggportalen.se/BlogPortal/view/BlogDetails?id=" + blogid;
    var statpic = document.createElement('img');
    statpic.src= "http://www.bloggportalen.se/BlogPortal/view/Statistics?blog_url=" + location.href + "&old_referrer=" + document.referrer + "&v=2&id=" + blogid;
    statpic.border=0;
    statlink.appendChild(statpic);
    statarea.appendChild(statlink);
});