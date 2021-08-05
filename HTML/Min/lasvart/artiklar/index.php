<HTML>
<HEAD>
 <TITLE>Min Kattklubb - Artiklar</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
 <script LANGUAGE="JavaScript">
 <!--
 function open_window(url) { stat=window.open(url,"art","scrollbars=1,resizable=1,status=1"); }
 //-->
 </script>
</HEAD>
<?
error_reporting(0);
include("../../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select språkkod,titel,författare,id from artikel order by titel";
$result = mysql_db_query($db, $query, $link);
?>

<BODY>
<H1>Artiklar</H1>
<TABLE WIDTH="514" BORDER="0">
  <TR> 
    <TD WIDTH="20"></TD>
    <TH WIDTH="237" align=left>Titel</TH>
    <TH WIDTH="243" align=left>F&ouml;rfattare</TH>
  </TR>
<?
while ($row = mysql_fetch_array($result)) {
  print ("<tr><td><IMG SRC=\"../../bilder/flag_$row[språkkod].gif\"></TD>
  <TD><A HREF=\"javascript:open_window('artikel.php?id=$row[id]')\">
  $row[titel]</A></TD><TD><font style='background-color: #eeeeee ;'>$row[författare]</font></TD></TR>");
}
?>
</TABLE>
</BODY>
</HTML>