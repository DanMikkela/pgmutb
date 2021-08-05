<?
error_reporting(10);
include("./skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
?>
<html>
<head>
<title>Min Kattklubb - Aktuellt</title>
<link rel="stylesheet" href="min.css" type="text/css">
</head>
<body>
<p>dasdadadad<br>
<? 
if ($idag > "2016-01-21") 
   print ("<a href='http://minakatter.sverak.se/MailRegister.php?ExhibitId=10000404' target='_blank'>Anm&auml;lan Online - l&auml;nk kommer h&auml;r p&aring; <font size=5 color='#FF0000'>FREDAG 22/1 </font></a>");
else
   print ("Anm&auml;lan Online - l&auml;nk kommer h&auml;r p&aring; <font size=5 color='#FF0000'>FREDAG 22/1 </font>");
?>
</body>
</html>