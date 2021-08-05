<?
error_reporting(0);
?>
<HTML>
<HEAD>
<TITLE>Min Kattklubb - redaktionen</TITLE>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
<SCRIPT LANGUAGE="JavaScript" SRC="file:///E|/wwwroot/skript/common.js"></script>
</HEAD>
<? 
if ("$musik" == "på") {
  print ("<bgsound src=\"data/jul2.mid\">");} 
?>
<H1>&Ouml;vriga funktion&auml;rer</H1>
<table width="410" border="0">
  <?
include("../../skript/common.php");

$link = mysql_connect("localhost",$db,$dbpw);
$query = "select befattning, enamn, fnamn, adr, postnr, ort, tfn, mobil, nr, f.epost
          from medlem m, funktionar f
		  where m.nr=f.medlemsnr
		  and f.funktion != 'Styrelsen'
		  and f.funktion != 'KattenMin'
		  order by ordn";
$result = mysql_db_query($db, $query, $link);

  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td width=\"250\"><b>$row[befattning]</b>
	<A NAME=\"bm$row[nr]\"></A><br>");
	print ("$row[fnamn] $row[enamn]<br>$row[adr]<br>$row[postnr] $row[ort]
	<br>$row[tfn] / $row[mobil]<br><A HREF=mailto:$row[epost]>$row[epost]</A><br>&nbsp;");
	print ("</td><td><img src=\"/bilder/folk/");
	print ("$row[nr].jpg\" width=110></td></tr>");
  }
?>
</TABLE>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p><a href="http://tracker.tradedoubler.com/click?p=15402&a=963893&g=101793" target="main" class="ad"> 
  <font color="#FFFF80">Bra och billigt webb-hotell - best&auml;ll h&auml;r</font></a></p>
</BODY>
</HTML>
