<html>
<head>
<title>Min Kattklubb - Bilder från aktivitet</title>
<link rel="stylesheet" href="../../min.css" type="text/css">
<script>
big=window.open("pic.php","big","status=1,scrollbars=yes");
</script>
</head>
<body onclick='big=window.open("pic.php","big","status=1,scrollbars=1,resize=1");' onunload=big.close();>
<?
#error_reporting(0);
if ($fd = fopen("aktivitet.txt","r") ) {
  while (!feof ($fd)) {
	  $buffer = fgets($fd, 1000);
    print("<h2>$buffer</h2>");
  }
  fclose ($fd);
}
?>
<table>
<?
if ($fd = fopen("bilder.txt","r") ) {
  while (!feof ($fd)) {
    $buffer = fgets($fd, 256);
	$row = explode("#", $buffer);
    $size = getimagesize("tn/$row[0]");
    $text = urlencode("$row[1]");
    print ("<tr><td><FORM method=post action=pic.php target=big>
      <INPUT type=hidden name=bild value=$row[0]>
      <INPUT type=hidden name=text value=$text>
      <INPUT type=image src=tn/$row[0] $size[3] border=0>
	  </FORM></td><td>$row[1]</td></tr>");
  }
  fclose ($fd);
}
?>
</TABLE>
</body></html>