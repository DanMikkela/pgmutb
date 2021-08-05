<?
error_reporting(0);
include("../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
?>

<HTML>
<HEAD>
 <TITLE>Min Kattklubb - Aktiviteter</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <LINK REL="stylesheet" HREF="../min.css" TYPE="TEXT/CSS">
 <SCRIPT LANGUAGE="JavaScript" SRC="../skript/common.js"></script>
</HEAD>

<BODY>
<TABLE BORDER="0">
  <TR> 
    <TD WIDTH="160"><B><FONT SIZE="6">Aktiviteter</FONT></B></TD>
    <TD WIDTH="32">&nbsp;</TD>
    <TD WIDTH="111">&nbsp;</TD>
    <TD WIDTH="112">&nbsp;</TD>
    <TD WIDTH="89">&nbsp;</TD>
  </TR>
  <TR> 
    <TD width="160">&nbsp;</TD>
    <TD width="32"><u><font size="2"><b>Typ</b></font></u></TD>
    <TD width="111"><u><font size="2"><b>Ansvarig(a)</b></font></u></TD>
    <TD width="112"><u><font size="2"><b>Planerat till</b></font></u></TD>
    <TD width="89"><b><font size="2">anm&auml;lan<br>
      start/slut</font></b></TD>
  </TR>
  <TR> 
    <td width="160"><u><font size="3"><b>Styrelsem&ouml;ten</b></font></u></td>
    <TD width="32">&nbsp;</TD>
    <TD width="111">&nbsp;</TD>
    <TD width="112">&nbsp;</TD>
    <TD width="89">&nbsp;</TD>
  </TR>
<? 
#
# först styrelsemöten
#
$sql = "select a.namn, a.datum, a.tid, a.anmalfrom,
 a.anmaltom, a.anmaltill, m.fnamn, m.enamn, a.text, a.uppd, a.plats
 from aktivitet a, medlem m 
 where a.typ = 'smote' and m.nr = a.ansvarig and a.datum >= \"".$today."\"
 order by a.datum";
$result = mysql_db_query($db, $sql, $link);
$num_rows = mysql_num_rows($result);
if ("$num_rows" == 0) {
  print("<TR><TD colspan=5>inget styrelsem&ouml;te &auml;r 
  planerat f&ouml;r tillf&auml;llet</TD></TR>"); }
else { 
  while ($row = mysql_fetch_array($result)) {
    print ("
    <tr>
    <td><font size=2>");
 if ($uppd > $new	) { echo ("<img src='/bilder/ball.gif' width=14 height=14>"); } 
	print("$row[plats]</font></td>
    <td><font size=2>&nbsp;</td>
    <td><font size=2><A href=\"mailto:$row[anmaltill]\">$row[fnamn] $row[enamn]</A></font></td>
    <td><font size=2>$row[datum] $row[tid]</font></td>
    <td><font size=2><b>$row[anmaltom]</b></font></td>
    </tr><tr><td>&nbsp;</td><td colspan=4>$row[text]</td></tr>
	<tr><td colspan=5><hr></td></tr>");
  }
}  
?>
  <tr><td colspan=5><hr></td></tr>
  <TR> 
    <TD width="160"> <u><font size="3"><b>F&ouml;reningsm&ouml;ten</b></font></u></TD>
    <TD width="32"><b><font size="2">&nbsp;</font></b></TD>
    <TD width="111"><font size="2">&nbsp;</font></TD>
    <TD width="112"><font size="2">&nbsp;</font></TD>
    <TD width="89"><b><font size="2">&nbsp;</font></b></TD>
  </TR>
<?
#
# sedan föreningsmöten
#
$tomorrow = getnewdate($today, 1);
$sql = "select a.namn, a.kortnamn, a.datum, a.tid, a.anmalfrom, a.karta, a.kallelse,
 a.anmaltom, a.anmaltill, a.text, m.fnamn, m.enamn, m.epost, a.uppd, a.plats
 from aktivitet a, medlem m
 where a.typ = 'fmote' and m.nr = a.ansvarig and a.datum >= \"".$today."\"
 order by a.datum, a.tid";
$result = mysql_db_query($db, $sql, $link);
$num_rows = mysql_num_rows($result);
if ("$num_rows" == 0) {
  print("<TR><TD colspan=5>inget f&ouml;reningsm&ouml;te &auml;r 
  planerat f&ouml;r tillf&auml;llet</TD></TR>"); }
else { 
  while ($row = mysql_fetch_array($result)) {
  print ("<tr><td>");
  if ("$row[text]" != NULL) {
    if ($row[uppd] > $new	) { echo ("<img src='/bilder/ball.gif' width=14 height=14>"); } 
	print ("$row[namn]<br>$row[plats]");
  print ("</td>
  <td><font size=2><b>m&ouml;te</b></font></td>
  <td><font size=2><A href=\"mailto:$row[epost]\">$row[fnamn] $row[enamn]</A></font></td>
  <td><font size=2>$row[datum] $row[tid]</font></td>
  <td><font size=2><b>");
    if ("$row[anmaltill]" != NULL) {
		  if ("$tomorrow > $row[anmaltom]") {
    	  print ("$row[anmalfrom]<br>$row[anmaltom]");
      } else {
	      print ("ingen f&ouml;ranm&auml;lan");
      } 
		} else {
		  print ("avslutad");
		}
    print ("</b></font></td></tr>");
		print ("<tr><td>&nbsp;</td><td colspan=4>$row[text]</td></tr>
		<tr><td><font size=2>&nbsp;</font></td>
            <td><font size=2>");
	    if ("$row[karta]" != NULL) { print ("<A href=\"$row[karta]\" target=\"_blank\">Karta</A>");}
		print ("&nbsp;</font></td>
            <td><font size=2>&nbsp;</font></td>
            <td><font size=2>");
		    if ("$row[kallelse]" != NULL) { print ("<A href=\"$row[kallelse]\" target=\"_blank\">Kallelse</A>");}
		print ("&nbsp;</font></td>
		</tr><tr><td colspan=5><hr></td></tr>");
    } else { print ("<font size=2>$row[namn]</font>"); }
  }
}	
?>
  <tr><td colspan=5><hr></td></tr>
  <TR> 
    <TD width="160"> <u><font size="3"><b>Tr&auml;ffar/kurser</b></font></u></TD>
    <TD width="32"><b><font size="2"></font></b></TD>
    <TD width="111"><font size="2"></font></TD>
    <TD width="112"><font size="2"> </font></TD>
    <TD width="89"><b><font size="2"></font></b></TD>
  </TR>
<? 
#
# och sedan övriga aktiviteter
#
$sql = "select a.namn, a.kortnamn, a.typ, a.assistent, a.datum, a.tid, a.anmalfrom,
 a.anmaltom, a.anmaltill, a.text, m.fnamn, m.enamn , m.epost, a.uppd, a.karta, a.plats, a.pdf_link
 from aktivitet a, medlem m 
 where a.typ != 'föreningsmöte' and a.typ != 'styrelsemöte' and m.nr = a.ansvarig and a.datum >= \"".$today."\"
  order by a.datum, a.tid";
$result = mysql_db_query($db, $sql, $link);
$num_rows = mysql_num_rows($result);
if ("$num_rows" == 0) { print("<TR><TD colspan=5>inga aktiviteter &auml;r 
  planerade f&ouml;r tillf&auml;llet</TD></TR>"); }
else { 
  while ($row = mysql_fetch_array($result)) {
    print ("<tr><td>");
    if ($row[uppd] > $new ) { echo ("<img src='/bilder/ball.gif' width=14 height=14>"); } 
	print ("$row[namn]<br>$row[plats]");
    print ("</td><td><font size=2><b><br>");
 	if ($row[typ] == "träff") { print ("tr&auml;ff"); } else { print ($row[typ]); }
	print ("</b></font></td>
    <td><font size=2><A href=\"mailto:$row[anmaltill]\">$row[fnamn] $row[enamn]</A>");
    if ( is_numeric($row[assistent])) {
      $row2 = mysql_fetch_array(mysql_db_query($db, "select fnamn,enamn,epost from medlem
	  where nr = $row[assistent]" , $link));
      print ("<br><A href=\"mailto:$row2[anmaltill]\">$row2[fnamn] $row2[enamn]</A>");
    }
    print ("</font></td><td><font size=2>$row[datum] $row[tid]</font></td>
	<td><font size=2><b>");
    if ("$row[anmaltom]" != NULL) {
	  print ("$row[anmalfrom]<br>$row[anmaltom]");
    } else {
	  print ("ingen f&ouml;ranm&auml;lan");
    }  
    print ("</b></font></td></tr>");
		print ("<tr><td>&nbsp;</td><td colspan=4>$row[text]</td></tr>");
        print ("<tr><td>&nbsp;</td><td colspan=4><font size=2>");
	    if ("$row[karta]" != NULL) { print ("<A href=\"$row[karta]\" target=\"_blank\">Karta</A>");}
	    if ("$row[pdf_link]" != NULL) { print ("<A href=\"$row[pdf_link]\" target=\"_blank\">\tInfo</A>");}
		print ("&nbsp;</font></td></tr>");
		print ("<tr><td colspan=5><hr></td></tr>");
  }
}  
?>
</TABLE>
<p><font size="2">Typer: <b>m&ouml;te</b> = klubben arrangerar, <b>tr&auml;ff</b> 
  = medlemmar arrangerar till sj&auml;lvkostnadspris<br>
  <b>kurs</b> = avgift f&ouml;r att delta och f&ouml;r material</font></p>
</BODY>
</HTML>