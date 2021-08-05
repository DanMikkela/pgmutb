<html>
<head>
<title>Min Kattklubb - Bild fr&aring;n aktivitet</title>
<script language="javascript">
<!--
function click()
{ if (event.button==2) {alert('This option is not available to you :-(');  }}
document.onmousedown=click
//-->
</SCRIPT>
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<LINK rel="stylesheet" href="../../min.css" type="text/css">
</head>
<!--<body style="background:white">-->
<body>
<center>
  <h2><B>Min Kattklubb - Bild fr&aring;n aktivitet</B></h2>
<?
 if (isset($bild) && $bild != null ) {
 $size = getimagesize ("bilder/$bild");
 if ("$size[0]" > 800) { }
 /*if ("$size[1]" > 400) {$size[1] = 400; }*/
 print ("<script>window.resizeTo($size[0]+80,$size[1]+250)</script>");
 $text = urldecode($text);
 print ("<img src=bilder/$bild $size[3] border=0>");
 print ("<br><b><font size=3>$text</font></b>
 <script>window.focus();</script>");
 } else {
 print ("<script>window.resizeTo(250,130)</script>");
 }
?></center>
</body>
</html>
