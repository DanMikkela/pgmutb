<? ERROR_REPORTING(0);
include("../skript/common.php");
$kaka  = date("Y-m-d", $UpDate-60*60*36);
$new   = date("Y-m-d", $now-60*60*24*8);
$link  = mysql_connect("localhost",$db,$dbpw);
$query = "select datum, sida, url from uppdaterat
 where datum > \"".$kaka."\"
 order by datum desc, sida";
$result = mysql_db_query($db, $query, $link);
$num_rows = mysql_num_rows($result);
if ($num_rows < 1) { echo "<script language=JavaScript>self.close()</script>"; exit;}
?>
<HTML>
<HEAD>
 <TITLE>Min Kattklubb - Uppdaterat</TITLE>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <LINK REL="stylesheet" HREF="../min.css" TYPE="TEXT/CSS">
</HEAD>

<BODY>

<H1>Uppdaterat sedan <? echo $kaka ?></h1>
<table width="410" border="0">
  <TR> 
    <TD>Datum</TD>
    <TD>Ny</TD>
    <TD>Uppdaterad sida</TD>
  </TR>
  <TR> 
    <TD>&nbsp;</TD>
    <TD>&nbsp;</TD>
    <TD>&nbsp;</TD>
  </TR>
<? 
while ($row = mysql_fetch_array($result)) {
  print ("<tr><td>$row[datum]</td><td>");
  if ("$row[datum]" > $new) {
	  print ("<img src=\"bilder/ball.gif\" width=\"14\" height=\"14\">"); }
  print ("&nbsp;</td><td>");
  if ("$row[url]" != null) { print ("<A href=$row[url] target=main>$row[sida]</A>"); }
  else { print ("$row[sida]"); }
  print("&nbsp;</td></tr>");
  }
?>
</TABLE>

</BODY>
</HTML>

