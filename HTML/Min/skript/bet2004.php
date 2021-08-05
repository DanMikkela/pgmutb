<?
error_reporting(0);
include("../skript/common.php");
session_start();
$lvl =$HTTP_SESSION_VARS['behö'];
# behörighet krävs för att få uppdatera databasen ...
if (!isset($lvl) || "$lvl" < 6) { header("location:../base.htm"); exit;}
?>
<HTML>
<HEAD>
 <TITLE>Min Kattklubb svensk bassida</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <script language="JavaScript" src="common.js"> </script>
 <LINK REL="stylesheet" HREF="../min.css" TYPE="TEXT/CSS">
</HEAD>

<BODY>
<?
if ("$nr" != "") {
  # öppna databasen (kattklubb_se)
  $link = mysql_connect("localhost",$db,$dbpw);
  # uppdatera medlem (?nr=medlemsnr)
  $sql = "update medlem set bet2004 = 'Ja' where nr = $nr";
  #echo "$sql";
  # skicka sql-satsen 
  $result = mysql_db_query($db, $sql, $link);
  echo "Medlem $nr uppdaterades " ;
  if ("$result"== 1) { echo "ok";} else {echo "inte korrekt";}
  echo "<br>";
  # stäng databasen (kattklubb_se)
  mysql_close($link);
}
?>
<form name="form1" method="post" action="">
  <input type="text" name="nr">
  Medlemsnummer 
</form>
</BODY>
</HTML>
