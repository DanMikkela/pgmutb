<html>
<head>
<title>Min Kattklubb - Artiklar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../min.css" type="text/css">
<link rel="Shortcut Icon" href="/Min.ico">
</head>
<body>
<?
#error_reporting(0);
include("../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select titel, författare, foto1, foto2, skriven, publ , kbpubl,webbpubl, text
from artikel where id = "."$id";
$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  print ("<H1>$row[titel]</H1>
  <table><tr><td width=80><font size=2><b>F&ouml;rfattare</b></font></td><td>$row[författare]</td>
  <td>");
  if ("$row[foto1]") echo "<img src=\"$row[foto1]\">"; else echo "&nbsp";
  if ("$row[foto2]") echo "<img src=\"$row[foto2]\">"; else echo "&nbsp";
  print ("</td></tr>
  <tr><td><font size=2><b>Skriven</b></font></td><td>$row[skriven]</td><td>&nbsp;</td></tr>
  </table><br><br><font size=2>
  $row[text]</font>
  <table>
  <tr><td width=150><font size=2><b>F&ouml;rfattare</b></font></td>
  <td><font size=2><b>$row[författare]</b></font></td></tr>
  <tr><td><font size=2><b>Skriven</b></font></td>
  <td><font size=2><b>$row[skriven]</b></font></td></tr>
  <tr><td><font size=2><b>Publicerad</b></font></td>
  <td><font size=2><b>$row[publ]</b></font></td></tr>
  <tr><td><font size=2><b>Publicerad i KM</b></font></td>
  <td><font size=2><b>$row[kbpubl]</b></font></td></tr>
  <tr><td><font size=2><b>Publicerad på webben</b></font></td>
  <td><font size=2><b>$row[webbpubl]</b></font></td></tr>
  </table>");
}	   
?>

</body>
</html>
