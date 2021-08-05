<?
error_reporting(0);
include("./skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
?>
<HTML>
<HEAD>
<TITLE>Min Kattklubb - svensk bassida</TITLE>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<LINK REL="stylesheet" HREF="min.css" TYPE="TEXT/CSS">
<link rel="Shortcut Icon" href="/Min.ico">
<script language="JavaScript">
<!-- Kattklubb, katt, klubb, sverak, raskatt, bondkatt, hittekatt, innekatt, utekatt, vildkatt, min, Min, MIN, huskatt, Min Kattklubb -->
</script>
</HEAD>
<BODY>
<center>
  <h1>V&Auml;LKOMMEN !</h1>
  <p><b>Min Kattklubb &auml;r en aktiv f&ouml;rening f&ouml;r alla som har ett 
    intresse f&ouml;r katter.</b></p>
  <p><b>Vi vill verka f&ouml;r bra villkor f&ouml;r v&aring;ra katter, samtidigt 
    som kattens status som s&auml;llskapsdjur h&ouml;js.</b></p>
  <p><strong>Samtidigt vill vi vara den kattklubb d&auml;r medlemmarna med stolthet<br>
    kan svara p&aring; fr&aring;gan vilken klubb de &auml;r med i :</strong><strong><br>
    <font size="4">Jag &auml;r med i <u>MIN Kattklubb!!</u></font></strong></p>
</center>

<p align=center><b><font color="#FF0000" size="5">2016 &auml;r Raskattens &Aring;r</font></b>
<p align=center><b><font size="5" color="#FF0000">Min Kattklubb blev Royal Canin's 
  &quot;&Aring;rets kreativa kattklubb 2016&quot;</font></b>
<p align=center><font size="5"><a href="aktiviteter/2016-02-27/katalog2016.pdf" target="_blank">Katalog<img src="bilder/pdf_bild.gif" width="33" height="34" border="0"></a> 
  <br>
  <a href="http://minakatter.sverak.se/result.php?ExhibitId=10000404" target="_blank">Resultat 
  online</a></font> (Slutgiltiga ) 
<p align=center><a href="aktiviteter/2016-02-27/bilder.htm" target="_blank">Bilder 
  p&aring; BIS:arna</a>
<p align=center>&nbsp;
<table border="0" cellspacing="0" cellpadding="2" align="center">
  <tr> 
    <td colspan=5><font size="3"><b>Uppdaterat senaste veckan :</b></font></td>
  </tr>
  <tr height="2"> 
    <td width="40">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
  <?
$query = "select s.prefix, namn, uppd from stamnamn s, medlem m
          where uppd > '".$new."'
		  and m.aktiv = 'Y'  
		  and s.medlem = m.nr
		  and m.PUL = 1";
$result = mysql_db_query($db, $query, $link);
$num_rows = mysql_num_rows($result); 
  if ($num_rows > 0) { echo ("<tr><td colspan=4><font size=2><b>Stamnamn :</b></font></td><td><font size=2><b>Uppdaterat</b></font></td></tr>"); }
  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td colspan=4><a href='uppfodare/katterier/katteri.php' target='main'><font size=2><b>$row[prefix]$row[namn]</b></font></a></td><td><font size=1>");
	$a=substr($row[uppd],0,10);
	print ("$a</font></td></tr>");
  }

$query = "select distinct s.prefix, s.namn, k.uppd
          from kull k, stamnamn s, kattunge u, medlem m
		  where s.id = k.stamnamn and k.id = u.id and bestfore > '".$idag."'
		  and m.PUL = 1 and m.nr = s.medlem
		  and ((k.uppd > '".$new."') or (u.uppd > '".$new."') )";
$result = mysql_db_query($db, $query, $link);
$num_rows = mysql_num_rows($result); 
  if ($num_rows > 0) { echo ("<tr><td colspan=5><font size=2><b>Kull :</b></font></td></tr>"); }
  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td colspan=4><a href='uppfodare/katterier/kullar.php' target='main'><font size=2><b>$row[prefix]$row[namn]</b></font></a></td><td><font size=1>");
	$a=substr($row[uppd],0,10);
	print ("$a</font></td></tr>");
  }

$query = "select typ, namn, plats, datum, uppd from aktivitet where  datum >= \"".$idag."\" and uppd > '".$new."' order by datum, plats, namn";
$result = mysql_db_query($db, $query, $link);
$num_rows = mysql_num_rows($result); 
  if ($num_rows > 0) { echo ("<tr><td colspan=2><font size=2><b>Kommande aktiviteter :</b></font></td>
                              <td><font size=2><b>Plats</b></font></td>
                              <td><font size=2><b>Datum</b></font></td>
							  <td><font size=2><b>&nbsp;</b></font></td></tr>"); }
  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td><a href='aktiviteter/aktivitet.php' target='main'><font size=2><b>&nbsp;</b></font></a></td>");
	print ("<td><font size=2><b>$row[namn]</b></font></td><td><font size=2><b>$row[plats]</b></font></td><td><font size=2><b>$row[datum]</b></font></td><td><font size=2>");
	$a=substr($row[uppd],0,10);
	print ("$a</font></td></tr>");
  }

$query = "select typ, namn, datum, uppd from aktivitet where datum < \"".$today."\" and uppd > '".$new."' order by uppd desc, namn asc";
$result = mysql_db_query($db, $query, $link);
$num_rows = mysql_num_rows($result); 
  if ($num_rows > 0) { echo ("<tr><td colspan=3><font size=2><b>Tidigare aktiviteter :</b></font></td>
                              <td><font size=2><b>Datum</b></font></td>
							  <td><font size=2><b>&nbsp;</b></font></td></tr>"); }
  while ($row = mysql_fetch_array($result)) {
  	print ("<tr><td><a href='aktiviteter/historik.php' target='main'><font size=2><b>&nbsp;</b></font></a></td>");
	print ("<td colspan=2><font size=2><b>$row[namn]</b></font></td><td><font size=2><b>$row[datum]</b></font></td><td><font size=1>");
	$a=substr($row[uppd],0,10);
	print ("$a</font></td></tr>");
  }

?>
</table>
<p align="center">&nbsp;</p>
<p align="center">&nbsp; </p>
<!--<TABLE width="727" border="0" cellspacing="0" cellpadding="0" align="center">
  <TR>
    <TD width="344">Skicka vanlig post till:<BR>
      <strong>Min Kattklubb</strong>, c/o Palokangas<br>
        Skaver&aring;s 4<BR>
      SE-330 15 BOR</TD>
    <TD width="383">Skicka e-post till: <B><A href="mailto:info@minkattklubb.se">sekr@minkattklubb.se</a></b></TD>
  </TR>
</TABLE>
-->
</BODY>
</HTML>
