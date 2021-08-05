<!-- sätt generella parametrar -->
var curdate = new Date();
var limit = 14;  <!-- 2 veckor (14 dagar) för beräknad kull    -->
var kull  = 180; <!-- 6 månader (180 dagar) för nedkommen kull -->
var nytid  = 7;  <!-- max 7 dagar för att betraktas som nyhet  -->
var lev = 84;    <!-- 12 veckor ska ungarna vara vid leverans  -->
var curLayer = '';
<!-- datum-format mm/dd/åååå -->

<!-- tar datum som parameter, lägger till nytid, kollar om passerat datum -->
<!-- används främst för nyheter -->
function checknyhet(date) {
  expdate = new Date(date);
  expdate.setTime( expdate.getTime() + (1000*60*60*24*(nytid+1)) );
  if (expdate.getTime() > curdate.getTime() ) { return 1; } 
  else { return 0; }
  }  

<!-- datumtest mot dagens datum -->
function checknew(date) {
  expdate = new Date(date);
  expdate.setTime( expdate.getTime() + (1000*60*60*24) );
  if (expdate.getTime() > curdate.getTime() ) { return 1; } 
  else { return 0; }
  }  
<!-- tar datum som parameter, lägger till limit, kollar om passerat datum -->
<!--    används främst för beräknade kullar -->
function checkberaknad(date) {
  expdate = new Date(date);
  expdate.setTime( expdate.getTime() + (1000*60*60*24*limit) );
  if (expdate.getTime() > curdate.getTime() ) { return 1; } 
  else { return 0; }
  }  

<!-- beräknar datum för hur länge en kull skall presenteras -->
function checkkull(date) {
  expdate = new Date(date);
  expdate.setTime( expdate.getTime() + (1000*60*60*24*kull) );
  if (expdate.getTime() > curdate.getTime() ) { return 1; } 
  else { return 0; }
  }
<!--    används främst för att räkna ut leveransdatum -->
function calclev(date) {
  levdate = new Date(date);
  levdate.setTime( levdate.getTime() + (1000*60*60*24*lev) );
  var strUt = new String(levdate.getFullYear() + "-" + Pad(levdate.getMonth() + 1) + "-" + Pad(levdate.getDate()));
  return strUt;
  }  

<!--    används främst för att räkna ut leveransdatum med mySQL datumformat-->
<!-- js datum-format mm/dd/åååå --><!-- mySQL datum-format åååå-mm-dd -->
function kalklev(date) {
  d=date.split("-");
		date=d[1]+"/"+d[2]+"/"+d[0];
  levdate = new Date(date);
  levdate.setTime( levdate.getTime() + (1000*60*60*24*lev) );
  var strUt = new String(levdate.getFullYear() + "-" + Pad(levdate.getMonth() + 1) + "-" + Pad(levdate.getDate()));
		return strUt;
  }  

<!-- Kollar om det skall presenteras -->
function checkperiod(fran,tom) {
  startdate = new Date(fran);
  tom = tom + " 23:59";
  stopdate  = new Date(tom);
  if (startdate.getTime() > curdate.getTime() )  {
      return 0; }
  if (curdate.getTime()   > stopdate.getTime())  {
      return 0; } 
  return 1;
  }
<!--  -->
function bytsprak(nykod) {
	setCookie("språkkod",nykod,30*24*60);
	parent.location.href="/index.html";
}
function bytanim(nykod) {
	setCookie("anim",nykod,30*24*60);
	parent.location.href="/index.html";
}
function bytmusik(nykod) {
	setCookie("musik",nykod,30*24*60);
	parent.location.href="/index.html";
}
function bytbakgrund(nykod) {
	setCookie("bakgrund",nykod,30*24*60);
	parent.location.href="index.html";
}

// läs cookie, hitta sedan efterfrågad smula
function getCookie(s) {
  kaka=document.cookie;
  crumb=kaka.split("; ");
  for (i=0;i<crumb.length; i++) {
    sd=crumb[i].split("=");
    if (sd[0] == s ) {
      return sd[1];
      break;
    }
  }
  return "";
}

function setCookie (crumb,contents,expmin) {
  if (expmin > 0) {
    expdate=new Date();
    expmin = expmin * 60 * 1000;
    expdate.setTime( expdate.getTime() + expmin );
    document.cookie = crumb+"="+contents+"; expires="+expdate.toGMTString()+"path=/;";
  } else {
    document.cookie = crumb+"="+contents+"path=/;";
  }
}
function open_window(url,level) { 
  if (level="") { level="1"};
  stat=window.open(url,level,"scrollbars=1,resizable=1,status=1"); }
//
function Layer() { //v3.0
  var p,v,obj,args=Layer.arguments;
  if ((obj=MM_findObj(args[0]))!=null) { v=args[2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v;}
  curLayer=args[0];
}
// Layer("Layer1",'','hide');
// Layer("Layer1",'','show');

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
 // datum som är kostant uppdaterat
  var ratingresult=5;

  function ChangeIt(what, text) {
    text="<font size=1>"+text+"</font>";
	if (document.all) {
	  what.innerHTML = text; }
	else if (document.layers) {
	  what.document.open();
	  what.document.write(text);
	  what.document.close();
	}
  }
  function Pad(strIn) {
    var strUt = new String(strIn);
	if(strUt.length == 1)
		strUt = "0" + strUt;
	return strUt;
  }
  function MyTime() {
	var datNow = new Date();
	var strUt = new String(Pad(datNow.getHours()) + ":" + Pad(datNow.getMinutes())  );
	return strUt;
  }
  function MyDate() {
	var datNow = new Date();
	var strUt = new String(datNow.getFullYear() + "-" + Pad(datNow.getMonth() + 1) + "-" + Pad(datNow.getDate()));
	return strUt;
  }
  function StartWatch() {
	if (document.all) {
	    ChangeIt(window.time, MyTime());
	    ChangeIt(window.date, MyDate());
	  }
   	  else {
	    ChangeIt(document.time, MyTime());
	    ChangeIt(document.date, MyDate());
      }
    }
 // försök att fånga höger musknapp för att förhindra kopiering av bilder
  function click() { 
    if (event.button==2) {alert('This option is not available to you :-(');}}
  document.onmousedown=click
//-->
// kontrollera vilken läsare som används och byt till anpassad sida
  var ie=false
  var nn=false
  var nnversion=parseFloat(navigator.appVersion.substring(0,1))
  var ieversion=parseFloat(navigator.appVersion.substring(navigator.appVersion.indexOf("MSIE")+5, navigator.appVersion.indexOf("MSIE")+6))
  var nyURL='index-ie.htm'

//  if(navigator.appName=='Microsoft Internet Explorer') ie=true
//  if(navigator.appName=='Netscape') nn=true 

//  if(ie==true) {nyURL='index-ie.htm'} 
//  if(nn==true) {nyURL='index-nn.htm'} 
  // location=nyURL  
  -->
