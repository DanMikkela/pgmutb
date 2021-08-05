<?
# stäng av felmeddelanden
 error_reporting(0);
 $today = date("Y-m-d", "$now");
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
# stäng av felmeddelanden
 error_reporting(0);
if ("$musik"=="på"){ print ("<bgsound src=\"./data/jul1.mid\">");}
 ?>
<H1>Redaktionen</H1>
<table width="410" border="0">
  <?
if ("$anim" == "på") {print ("<img src=\"./bilder/typloop.gif\""); }
include("../../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select befattning, enamn, fnamn, adr, postnr, ort, tfn, mobil, nr, f.epost
          from medlem m, funktionar f
		  where m.nr=f.medlemsnr
		  and f.funktion = 'KattenMin'
		  order by ordn";
$result = mysql_db_query($db, $query, $link);

  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td width=\"250\"><b>$row[befattning]</b>
	<A NAME=\"bm$row[nr]\"></A><br>");
	print ("$row[fnamn] $row[enamn]<br>$row[adr]<br>$row[postnr] $row[ort]
	<br>$row[tfn] / $row[mobil]<br><A HREF=mailto:$row[epost]>$row[epost]</A><br>&nbsp;");
	print ("</td><td><img src=\"/bilder/folk/");
	print ("$row[nr].jpg\"></td></tr>");
  }
?>
</TABLE>

</BODY>
</HTML>
