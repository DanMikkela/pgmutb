<?
# st?ng av felmeddelanden
 error_reporting(0);
 include("../skript/common.php");
 $today = date("Y-m-d", "$now");
?><HTML>
<HEAD>
 <TITLE>Min Kattklubb bli medlem</TITLE>
 <!-- Min kattklubb, den personliga klubben i s?dra Sverige  -->
<!-- Kattklubb, katt, klubb, sverak, raskatt, bondkatt, hittekatt, innekatt, utekatt, vildkatt, min, Min, MIN, huskatt, Min Kattklubb -->
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <LINK REL="stylesheet" HREF="../min.css" TYPE="TEXT/CSS">
 <link rel="Shortcut Icon" href="/Min.ico">
</HEAD>
<P>&nbsp;</P>
<h1>V&Auml;LKOMMEN till klubben!</h1>
<P><B><FONT size="3">Hj&auml;rtligt v&auml;lkommen som medlem i Min Kattklubb.<br>
  Vi har v&aring;rt s&auml;te i Kristianstad, Sk&aring;ne, men alla &auml;r lika v&auml;lkomna 
oavsett var i landet Du bor.</FONT></B></P>
<P><FONT size="2"><B><FONT size="3">Medlemskap i klubben inneb&auml;r att man 
  blir ansluten &auml;ven till SVERAK, <br>
  Sveriges kattklubbars riksf&ouml;rbund. Detta ger Dig m&ouml;jlighet att delta 
  i<br>
  f&ouml;rbundsaktiviteter och att st&auml;lla ut Din(a) katt(er) om Du vill. 
  <br>
  F&ouml;rbundstidningen &auml;r inkluderad i medlemsavgiften, liksom v&aring;r 
  egen lilla publikation, &quot;<i>Katten Min</i>&quot;.</FONT></B></FONT></P>
<P><FONT size="3"><B>Medlemsavgifter 2016 :<BR>
  Medlem betalar 300 kr / &aring;r. (200 kr om du g&aring;r med under andra halv&aring;ret, 
  g&auml;ller endast vid ett tillf&auml;lle.)<BR>
  Den som vill st&auml;lla ut betalar en serviceavgift p&aring; 75 kr / &aring;r.<br>
  Den som vill ha uppf&ouml;dning och avel betalar en serviceavgift p&aring; 25 
  kr / &aring;r. <BR>
  Familjemedlem 100 kr / &aring;r (ytterligare medlem i samma hush&aring;ll).<BR>
  <br>
  Medlemskapet l&ouml;per per kalender&aring;r.<BR>
  </B></FONT></P>
<P><FONT size="3"><B><br>
  Avgiften s&auml;tts in p&aring; <u>bankgiro 351-8198</u>. <font color="#FF0000">OBS 
  ! Bankgiro!</font><br>
  P&aring; talongen skriver Du : Namn, adress, telefonnr, ras(er) och <br>
  Ja/Nej om vi f&aring;r l&auml;gga ut uppgiften h&auml;r p&aring; n&auml;tet. 
  <br>
  Ange &auml;ven dina f&ouml;delsedata, endast &Aring;&Aring;MMDD. <br>
  L&auml;mna g&auml;rna ocks&aring; din e-post adress.<br>
  Ange &auml;ven att inbetalningen avser medlemskap och eventuella servicetill&auml;gg.</B></FONT></P>
<P><FONT size="3"><B>Vill Du kontakta oss postledes &auml;r v&aring;r adress (sekreterarens):</B></FONT></P>
<P><FONT size="3"><B>Min Kattklubb, c/o 
  <?
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select enamn, adr, postnr, ort, medlemsnr
          from medlem m, funktion?r f
		  where m.nr=f.medlemsnr
		  and f.befattning = 'Sekreterare'";
$result = mysql_db_query($db, $query, $link);
  while ($row = mysql_fetch_array($result)) {
  	print ("$row[enamn],&nbsp;$row[adr],&nbsp;$row[postnr]&nbsp;$row[ort]");
  }
?>
</B></FONT></P>
<P><FONT size="3"><B>E-post : <a href="mailto:info@minkattklubb.se">sekr@minkattklubb.se</a> 
  Hemsida : http://www.minkattklubb.se (h&auml;r &auml;r Du ju redan)</B></FONT></P>
<P>&nbsp;</P>
<P>&nbsp;</P>
</BODY>
</HTML>
