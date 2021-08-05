<?
error_reporting(0);
include("./skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
?>
<html>
<head>
<title>Min Kattklubb - Aktuellt</title>
<link rel="stylesheet" href="min.css" type="text/css">
</head>
<body>
<?
#error_reporting(0);
$f="./nyheter/aktuellt.txt";
if (!$fd = fopen($f,"r") ) {
  print ("vvv");
}
?>
<center>
  <font size="2">Aktuellt</font>
</center>
<TABLE cellSpacing=0 width="160px" border=0 cellpadding=3>
<?
  while (!feof ($fd)) {
    $buffer = fgets($fd, 1000);
	$row2 = explode("#", $buffer);
    print ("<tr><td><b>$row2[0]</b><br>$row2[1]</td></tr>");
	print ("<tr><td height=15px><IMG style='WIDTH: 140px;HEIGHT: 2px' src=/bilder/content-div.gif></td></tr>");
  };
  fclose ($fd);
?>
</TABLE>
</body>
</html>