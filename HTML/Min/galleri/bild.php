<html>
<head>
<title>Min Kattklubb - Galleri</title>
<link rel="stylesheet" href="../min.css" type="text/css">
<script>
big=window.open("pic.php","big","status=1,width=250,height=10"+
",scrollbars=yes");
function click()
{ if (event.button==2) {alert('This option is not available to you :-(');  }}
document.onmousedown=click

</script>
</head>
<body onclick='big=window.open("pic.php","big","status=1,width=250"+
",height=10,scrollbars=1");' onunload=big.close();>
<H3>Bildgalleri f&ouml;r bilder som medlemmarna sj&auml;lva laddat upp.</H3>
<B>Observera att alla texter &auml;r medlemmens egna ansvar!</B>
<BR>
<table>
<?php
error_reporting(0);
include("../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);  # anslut till databasen
$query = "select * from bildinfo";
$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  $text = urlencode("$row[text]");
  $namn = urlencode("$row[namn]");
  print ("<tr><td><FORM method=post action=pic.php target=big>
          <INPUT type=hidden name=bild value=$row[bildnamn]>
          <INPUT type=hidden name=text value=$text>
					<INPUT type=hidden name=namn value=$namn>
          <INPUT type=image src=images/tn/$row[bildnamn] border=0>
	        </FORM></td><td>$row[text]</td></tr>");
}
?>
</TABLE>

</body></html>