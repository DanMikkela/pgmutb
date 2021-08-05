<HTML>
<HEAD>
 <TITLE>Min Kattklubb - Viktiga nyheter</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <LINK REL="stylesheet" HREF="../min.css" TYPE="TEXT/CSS">
 <script LANGUAGE="JavaScript">
 <!--
 function open_window(url) { stat=window.open(url,"nyhet","scrollbars=1,resizable=1,status=1"); }
 //-->
 </script>
</HEAD>
<?
error_reporting(0);
include("../skript/common.php");
$idag = date("Y-m-d", time());
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select id, författare, titel from nyhet"; /*
          where borja <= '".$idag."' and sluta >= '".$idag."'"; */
$result = mysql_db_query($db, $query, $link);
?>

<BODY>
<H1>Viktiga nyheter</H1>
<P>H&auml;r presenteras de saker som vi vill po&auml;ngtera lite extra.</P>
<TABLE WIDTH="514" BORDER="0">
  <TR> 
    <TD WIDTH="20"></TD>
    <TH WIDTH="237" align=left>Rubrik</TH>
    <TH WIDTH="243" align=left>F&ouml;rfattare</TH>
  </TR>
<?
while ($row = mysql_fetch_array($result)) {
  print ("<tr><td>&nbsp;</TD>
  <TD><A HREF=\"javascript:open_window('nyhet.php?id=$row[id]')\">
  $row[titel]</A></TD><TD>$row[författare]</TD></TR>");
}
?>
</TABLE>
</BODY>
</HTML>