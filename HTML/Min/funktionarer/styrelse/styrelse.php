<?
# stäng av felmeddelanden
 error_reporting(0);
 include("../../skript/common.php");
 $today = date("Y-m-d", "$now");
?>
<HTML>
<HEAD>
<TITLE>Min Kattklubb - styrelsen</TITLE>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
<SCRIPT LANGUAGE="JavaScript" SRC="../../skript/common.js"></script>
</HEAD>
<H1>Styrelsen</H1>
<table border="0">
  <?

$link = mysql_connect("localhost",$db,$dbpw);
$query = "select befattning, enamn, fnamn, adr, postnr, ort, tfn, mobil, nr, f.epost, f.beskr
          from medlem m, funktionar f
		  where m.nr=f.medlemsnr
		  and f.funktion = 'Styrelsen'
		  order by ordn";
$result = mysql_db_query($db, $query, $link);

  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td width=\"250\"><b>$row[befattning]</b>
	<A NAME=\"bm$row[nr]\"></A><br>");
	print ("$row[fnamn] $row[enamn]<br>$row[adr]<br>$row[postnr] $row[ort]
	<br>$row[tfn] / $row[mobil]<br><A HREF=mailto:$row[epost]>$row[epost]</A><br>&nbsp;");
	print ("</td><td><img src=\"/bilder/folk/");
	print ("$row[nr].jpg\" width=100></td><td>$row[beskr]&nbsp;</td></tr>");
  }
?>
</TABLE>

</BODY>
</HTML>
