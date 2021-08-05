<HTML>
<HEAD>
 <TITLE>Min Kattklubb - Uppdaterat</TITLE>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <LINK REL="stylesheet" HREF="../min.css" TYPE="TEXT/CSS">
<SCRIPT LANGUAGE="JavaScript" SRC="../skript/common.js"></script>
</HEAD>

<? if ("$bakgrund" == "av") {
 print ("<BODY style=\"background-image: none;\">");
} else {
 print ("<BODY style=\"background-image: url(./bilder/kb.jpg);
background-repeat: no-repeat; background-attachment: fixed;\">");
}
?>
<H1>Uppdaterat</H1>
<table width="410" border="0">
  <TR> 
    <TD>Datum</TD>
    <TD>Ny</TD>
    <TD>Kommentar</TD>
  </TR>
  <TR> 
    <TD>&nbsp;</TD>
    <TD>&nbsp;</TD>
    <TD>&nbsp;</TD>
  </TR>
<?
include("../skript/common.php");
$nyhetsdatum = getnewdate(date("Y-m-d"), -8);
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select datum, sida, url from uppdaterat order by datum desc";
$result = mysql_db_query($db, $query, $link);

  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td>$row[datum]</td><td>");
	if ("$row[datum]" > $nyhetsdatum) {
	  print ("<img src=\"bilder/ball.gif\" width=\"14\" height=\"14\">"); }
	else {print ("&nbsp;"); }
	print ("</td><td>");
	if ("$row[url]" != null) { print ("<A href=\"$row[url]\">$row[sida]</A>"); }
	else 
	print ("$row[sida]&nbsp;</td></tr>");
  }
?>
</TABLE>

</BODY>
</HTML>
