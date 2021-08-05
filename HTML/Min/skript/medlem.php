<?
error_reporting(10);
session_start();
//if (!$HTTP_SESSION_VARS['admin']) {  header("Location: ../base.htm");}
//$lvl =$HTTP_SESSION_VARS['behö'];
$lvl = 5;
?>
<html>
<head>
 <TITLE>Min Kattklubb - Matrikel</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
 <SCRIPT LANGUAGE="JavaScript" SRC="common.js"></script>
</head>

<body>
<h2>Min:s medlemmar <? echo date("Y-m-d") ?></h2>
<table border=0 cellspacing=0 cellpadding=0>
<?
include("common.php");
$link = mysql_connect("localhost",$db,$dbpw);

print("$link");

$query = "select typ, fnamn, enamn, adr, postnr, ort, tfn from medlem
  order by enamn, fnamn";
$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  print ("<tr><td width=30>$row[typ]</td><td width=170>$row[fnamn] $row[enamn]
  </td><td width=170>$row[adr]</td><td width=170>$row[postnr] $row[ort]</td>");
  if ($lvl > 4) { print("<td width=120>$row[tfn]</td>"); }
  print("</tr>");
}
		   
?>
</table>
<a href="vbscript:window.print()">Skriv ut</a> 
</body>
</html>
