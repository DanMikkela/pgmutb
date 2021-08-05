<?
#error_reporting(0);
if ( !isset($språkkod)) { $språkkod="s"; }
?>
<html>
<head>
<meta http-equiv=content-type content=text/html;charset=iso-8859-1>
<title>IBBA - The full breed description with pictures of the  Cats.</title>
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<meta name=description content="IBBA - The full breed description with pictures of the  Cats.">
<meta-key>
<link href=/min.css rel=styleSheet type=text/css>
<link rel="Shortcut Icon" href="/Min.ico">
<SCRIPT LANGUAGE="JavaScript" SRC="../../skript/common.js"></script>
</head>

<body topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>
<?
include("../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$today = date("Y-m-d");

if ($row = mysql_fetch_array(mysql_db_query($db,
  "select namn, bild1, charact, care, beskr from rasbeskr where id = $in", $link)))
 {
  print ("<table border=0 cellpadding=0 cellspacing=0 width=90%><tr>"); 
  print ("<td width=100%><center><font size=3 face=Verdana><b>$row[namn]&nbsp;");
  print ("</b></font></center></td></tr><tr height=20><td width=100% height=20></td></tr>");
  print ("<tr><td width=100%><center><img border=0 src=/allaraser/bilder/$row[bild1] width=200></center></td></tr>");
  print ("<tr height=20><td width=100% height=20></td></tr><tr><td width=100%>"); 
  print ("<table border=1><tr><td><div align=left><font color=black size=2 face=Verdana><b>");
  print ("Character:</b></font></div></td><td><div align=left><font color=black size=2 face=Verdana>");
  print ("$row[charact]&nbsp;</font></div></td></tr><tr><td height=35><div align=left>");
  print ("<font color=black size=2 face=Verdana><b>Care:</b></font></div></td><td height=35><div align=left>");
  print ("<font color=black size=2 face=Verdana>$row[care]&nbsp;</font></div></td></tr></table>");
  print ("</td></tr><tr height=20><td width=100% height=20>&nbsp;</td></tr><tr><td width=100%>");
  print ("<font size=2 face=Verdana>$row[beskr]</font></td></tr><tr><td width=100%><center>"); 
  print ("&nbsp;</center>");
  print ("</td></tr></table>");
 } 
?>
<P><A href="mailto:info@miomi.se" style="color:#000000; text-decoration: none; font-size: 10px; line-height: 12px;">WebDesign</A>&nbsp; 
  <A href="http://www.miomi.se"><IMG src="../../bilder/miomi50.jpg" width="50" height="19" border="0"></A></P>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- reklam  -->
<script language="JavaScript" src="http://impse.tradedoubler.com/imp/59966/963893" charset="ISO-8859-1"></script>
&nbsp; <a href="http://tracker.tradedoubler.com/click?p=15237&a=963893&g=186154" target="main"> 
Gratis visitkort!</a> &nbsp; <img src="http://imp.double.se/imp.gif?a4842p87g1004" width="0" height="0" alt=""> 
<a href="http://www.double.se/reports/click.php?a=4842&p=87&g=1004" target="main"> 
<img src="http://www.tjitjing.com/Banners/GratisListan_Banner_Tavling_88x31.gif" width="88" height="31" border="0" alt=""></a> 
<BR>
<img src="http://imp.double.se/imp.gif?a4842p123g1738" width="0" height="0" alt="">
<a href="http://www.double.se/reports/click.php?a=4842&p=123&g=1738" target="main">NOD32 - Antivirus &amp; Antispyware</a>
<!--
http://www.miomi.se
http://www.dataskroten.se
http://www.worldwinner.se
http://www.worldwinner2007.com
http://www.
-->

</body>

</html>
