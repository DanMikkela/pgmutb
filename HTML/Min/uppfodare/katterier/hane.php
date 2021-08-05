<?
# stäng av felmeddelanden
error_reporting(0);
?>
<HTML>
<HEAD>
<TITLE>Min Kattklubb - Kattungar</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
<SCRIPT LANGUAGE="JavaScript" SRC="../../skript/common.js"></script>
</HEAD>
<BODY>
<H1>Avelshanar</H1>
<?
include("../../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$today = date("Y-m-d");

$query1 = "select h.namn, h.ems, h.ras, fnamn, enamn, tfn, m.epost
 from medlem m, hane h, stamnamn s
 where m.nr = s.medlem
 and s.medlem = h.medlem
 and to_days(h.bestfore) > to_days(\""."$today"."\") 
 and m.aktiv = 1
 and m.PUL = 1
 order by h.ems";

$result = mysql_db_query($db, $query1, $link);
$x='';
while ($row = mysql_fetch_array($result)) {
 	 if ($x != "$row[ras]") { print ("<h2>$row[ras]</h2>"); }
   print ("<p><b>$row[namn], $row[ems]</b><br>");
	 if ("$row[epost]") {
	     print ("<A HREF=\"mailto:$row[epost]?Subject=Min's avelshanar:\">
           $row[fnamn] $row[enamn], $row[tfn]</A></p>");
	 } else { print ("$row[fnamn] $row[enamn], $row[tfn]</p>"); }
	 $x = "$row[ras]";
  }		   
?>
<br>
<font size="1">Listan omfattar endast aktiva medlemmar i klubben</font> 
<? if ($HTTP_SESSION_VARS['admin']) { ?>
<P>Anm&auml;l din hane :anmälningsformulär<br>
  <font size="2"><br>F&ouml;r uppgifternas riktighet ansvarar uppgiftsl&auml;mnaren.
  </font></P>
<? } ?>

</BODY>
</HTML>
