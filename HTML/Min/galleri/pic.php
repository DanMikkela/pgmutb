<html>
<head>
<title>Min Kattklubb - Bildarkiv</title>
<script language="javascript">
<!--
function click()
{ if (event.button==2) {alert('This option is not available to you :-(');  }}
document.onmousedown=click
//-->
</SCRIPT>
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<link rel="stylesheet" href="../min.css" type="text/css">
</head>
<body>
<h2><b>Bilder ur Min Kattklubbs arkiv</b></h2>
<?
 if (isset($bild) && $bild != null ) {
   $size = getimagesize ("images/$bild");
   if ($size[0] < 300) {$size[0] = 300;}
   print ("<script>window.resizeTo($size[0]+50,$size[1]+280)</script>");
   $text = urldecode($text);
	 $namn = urldecode($namn);
   print ("<img src=images/$bild $size[3] border=0>");
   print ("<br>Så här skrev $namn om bilden :<br>$text<script>window.focus();</script>");
 } else {
   print ("<script>window.resizeTo(250,130)</script>");
 }
?>
</body>
</html>
