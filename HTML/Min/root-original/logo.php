<?
ERROR_REPORTING(0);
$lastVisit = $UpDate;
$now = time();
setcookie("UpDate","$now",time()+60*60*24*30);
?>
<HTML>
<HEAD>
 <TITLE>Min K@ttklubb - logo</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
<meta name="verify-v1" content="SaNpYTErSgN3NDySYw9HMueHq/JZeWjb4s2TcX9G1Zs=" /> 
<LINK REL="stylesheet" HREF="min.css" TYPE="TEXT/CSS">
<link rel="Shortcut Icon" href="/Min.ico">
 <script language="JavaScript" src="skript/common.js"> </script>
 <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:100px;
	height:80px;
	z-index:0;
	left: 28px;
	top: 16px;
	visibility: visible;
	background-image: url(bilder/Min_logo100.gif);
}
#Layer2 {
	position:absolute;
	width:80px;
	height:60px;
	z-index:1;
	left: 35px;
	top: 16px;
	visibility: visible;
	background-image: url(bilder/a-cat014.gif);
}
-->
 </style>
<script type="text/javascript" src="http://susnet.se/susnetstat.js"></script>
<script type="text/javascript">susnet_counter_id = 30026;susnet_security_code = '3aa50';
susnet_node=0;register();</script>
</HEAD>
<STYLE>
A {color: black; text-decoration: none;}
A:Hover {color: black; text-decoration: none;}
</STYLE>
<BODY onLoad="window.setInterval('StartWatch();',1000)" style="background-image:none">
<div id="Layer1"></div>
<!--<div id="Layer2"></div>-->
<table cellpadding=0 width="120">
  <tr>
    <td width="17"><? if ("$anim" == "på") { 
	print ("<IMG SRC=\"bilder/arrow1.gif\">");} else { echo "&nbsp;";} ?></td>
	<td width="95" rowspan=6 align="center">&nbsp;</td>
  </tr><tr>
	<td><? if ("$musik" == "på") { 
	print ("<IMG SRC=\"bilder/speaker.gif\">");} else { echo "&nbsp;";} ?></td>
  </tr><tr>
    <td><? if ("$bakgrund" == "av") {
    print ("&nbsp;");} else { print ("<img src=\"bilder/tv.gif\">");} ?> </td>
  </tr><tr height="10">
    <td><font size="1"><script type="text/javascript">susnet_counter_id = 30026;susnet_security_code = '3aa50';susnet_node=0;getOnlineVisitors();</script></font></td>
  </tr><tr height="10">
    <td><font size="1"><script type="text/javascript">susnet_counter_id = 30026;susnet_security_code = '3aa50';susnet_node=0;getTodayUniqueVisitors();</script></font></td>
  </tr><tr height="10">
    <td><font size="1"><script type="text/javascript">susnet_counter_id = 30026;susnet_security_code = '3aa50';susnet_node=0;getMonthUniqueVisitors();</script></font></td>
  </tr>
</table>
<div id=date style="position: absolute; left: 17px; top: 5px; width: 78px; height: 10";	visibility: visible; class=time></div>
<div id=time style="position: absolute; left: 100px; top: 5px; width: 50; height: 10"; visibility: visible; class=time></div>
<!-- <layer name=time class=time></layer>
<layer name=date class=time left="9" top="12"></layer> -->
<div id=count style="position: absolute; left: 34px; top: 93px; width: 112px; height: 8px" class=time><font size="1"><A HREF="lasvart/kuriosa/webbstatistik/index.htm" TARGET="main">Bes&ouml;kare</A> 
  : 
  <?
if ($fd = fopen("min.txt","r") ) { $count = fgets($fd, 10); fclose ($fd); }
//if ($lastVisit < time()-180) {   # räkna inte om < 3 minuter reload
  $LogDate=date("Y-m-d H:i");
  $fh = fopen("min.txt","w"); fwrite($fh, ++$count); fclose($fh);
#  $fh = fopen("log.txt","a");
#  fwrite($fh, "$count\t".$HTTP_SERVER_VARS["REMOTE_ADDR"]."\t$LogDate\n");
#  fclose($fh);
//}
print ("$count");
?>
  </font></div>

<?
/*if ($UpDate) {
  print('<script language="JavaScript">');
  print('updwin=window.open("uppdatwin.php","upd","scrollbars=1,');
  print('resizable=1,status=1,height=300,width=500");</script>');
} */
?>
<? if ("$anim" == "på") { } ?>

</BODY>
</HTML>