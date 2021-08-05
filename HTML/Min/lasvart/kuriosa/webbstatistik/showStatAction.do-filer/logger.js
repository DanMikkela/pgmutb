var screensize = screen.width + "x" + screen.height;
var cookieDate = new Date ( );  
cookieDate.setTime ( cookieDate.getTime() +  2592000); //30 days
var loggerCookie = "screensize=" + escape(screensize) + "; expires=" + cookieDate.toGMTString() + "; path=\"/\"; ";
document.cookie = loggerCookie;