<html>
<head>
<title>Min Kattklubb - Nyheter</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../min.css" type="text/css">
</head>
<body>
<?
error_reporting(0);
include("../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select id, författare, titel, text from nyhet where id = "."$id";
$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  print ("<H3><font color=red>$row[titel]</font></H3>
  <table><tr><td width=80><font size=2><b>F&ouml;rfattare</b></font></td>
  <td>$row[författare]</td></tr></table><br><br>
  $row[text]");
}	   
?>
</body>
</html>