<?
# stäng av felmeddelanden
# error_reporting(0);
?>
<HTML>
<HEAD>
<TITLE>Min Kattklubb - Kattungar</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
<SCRIPT LANGUAGE="JavaScript" SRC="../../skript/common.js"></script>
</HEAD>
<BODY>
<H1>Kattungar</H1>
<H2>F&ouml;dda</H2>
<?
include("../../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$today = date("Y-m-d");
 
$query1 = "select prefix, s.namn, fnamn, enamn, tfn, mobil, s.epost, neddatum, levdatum, far, mor, kn, k.ras, u.sex, u.ems, u.status, k.id, h_med, medlem2
 from medlem m, kull k, kattunge u, stamnamn s
 where k.status =  'F'
 and m.aktiv = 1
 and m.PUL = 1
 and k.id = u.id
 and k.stamnamn = s.id
 and s.medlem = m.nr
 and to_days(k.bestfore) > to_days(\""."$today"."\") 
 order  by neddatum, k.id, u.nr";

$query2 = "select prefix, s.namn, fnamn, enamn, tfn, mobil, s.epost,
 neddatum, levdatum, far, mor, k.ras, h_med, medlem2
 from medlem m, kull k, stamnamn s
 where k.status ='B'
 and k.stamnamn = s.id
 and s.medlem = m.nr
 and to_days(k.bestfore) > to_days(\""."$today"."\") 
order by neddatum, k.id";

$result = mysql_db_query($db, $query1, $link);
$x='';
while ($row = mysql_fetch_array($result)) {
 	 if ($x != "$row[id]") {
	   if ($x != '') { print("</table>");}
	   if ("$row[h_med]" == "M") {
	     $query3 = "select fnamn, enamn, tfn, mobil, m.epost from medlem m,
		 stamnamn where $row[medlem2] = m.nr";
         $result2 = mysql_db_query($db, $query3, $link);
	     $row2 = mysql_fetch_array($result2);
		 print ("<p><b><A HREF=\"mailto:$row2[epost]?Subject=Min kattungar:\">
		 $row[prefix]$row[namn]</A></b>,
	     $row2[fnamn] $row2[enamn] $row2[tfn] / $row2[mobil]<br>");
	   } else {	 
	     print ("<p><b><A HREF=\"mailto:$row[epost]?Subject=Min kattungar:\">
		 $row[prefix]$row[namn]</A></b>,
	     $row[fnamn] $row[enamn] $row[tfn] / $row[mobil]<br>");
	   }
	 print ("<b>F&ouml;dd : $row[neddatum], $row[ras]</b><br>
	         tidigast leveransklara: <b>$row[levdatum]</b><br>
	         Far : $row[far]<br>Mor : $row[mor]<br><table border=0 cellpadding=2>");
	 }
#     print ("<tr><td width=60>$row[kn]</td><td width=50>$row[sex]</td><td width=120>$row[ems]&nbsp;</td><td width=80><font color=red>$row[status]</font></td></tr>");
     print ("<tr><td>$row[kn]</td><td>$row[sex]</td><td>$row[ems]&nbsp;</td><td><font color=red>$row[status]</font></td></tr>");
	 $x = "$row[id]";
  }		 
  if ($x != '') { print("</table>");}
  
?>
<H2>Ber&auml;knade</H2>
<?
$result = mysql_db_query($db, $query2, $link);
while ($row = mysql_fetch_array($result)) {
	   if ("$row[h_med]" == "M") {
	     $query3 = "select fnamn, enamn, tfn, mobil, m.epost from medlem m,
		 stamnamn where $row[medlem2] = m.nr";
         $result2 = mysql_db_query($db, $query3, $link);
	     $row2 = mysql_fetch_array($result2);
		 print ("<p><b><A HREF=\"mailto:$row2[epost]?Subject=Min kattungar:\">$row[prefix]$row[namn]</A></b>,
	     $row2[fnamn] $row2[enamn] $row2[tfn] / $row2[mobil]<br>");
	   } else {	 
	     print ("<p><b><A HREF=\"mailto:$row[epost]?Subject=Min kattungar:\">$row[prefix]$row[namn]</A></b>,
	     $row[fnamn] $row[enamn] $row[tfn] / $row[mobil]<br>");
	   }
	  print ("<b>Ber&auml;knad : $row[neddatum], $row[ras]</b><br>
	  ber. leveransklara: <b>$row[levdatum]</b><br>
	  Far : $row[far]<br>Mor : $row[mor]<br>");
}		   
?>
<br>
<font size="1">Listan omfattar endast aktiva medlemmar i klubben</font> 
<P>Anm&auml;l din parning/kull till <A HREF="mailto:kattunge@minkattklubb.se">kattunge@minkattklubb.se</A><br>
	<font size="2"><br>
	F&ouml;r uppgifternas riktighet ansvarar uppgiftsl&auml;mnaren.<br>
	<br>
	Alla uppgifter m&auml;rks med ett &quot;b&auml;st f&ouml;re&quot;-datum. F&ouml;r 
	en planerad kull &auml;r det &quot;ber&auml;knat nedkomstdatum&quot; plus 1 
	vecka. F&ouml;dda kullar f&aring;r nedkomstdatum plus sex (6) m&aring;nader 
	om inget annat &ouml;verenskommits. Uppgifterna f&ouml;rsvinner automatiskt efter 
utg&aring;nget &quot;b&auml;st f&ouml;re&quot;-datum. </font></P>

</BODY>
</HTML>
