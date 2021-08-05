<?
# stäng av felmeddelanden
 error_reporting(0);
?>
<HTML>
<HEAD>
<TITLE>Min Kattklubb - Stamnamn</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
<SCRIPT LANGUAGE="JavaScript" SRC="../../skript/common.js"></script>
</HEAD>
<BODY onLoad="MM_preloadImages('../../bilder/pawgreen.gif')">
<?
if ("$musik" == "på") {
  print ("<bgsound src=\"../data/jive.mid\">");} 
?>
<table width="522" border="0">
	<tr valign=center> 
    <td><img border="0" src="../../bilder/diplom30.jpg" width="30" height="46"></TD>
    <TD>Diplomerad uppf&ouml;dare</td>
    <td><img border="0" src="../../bilder/pawgray.gif" width="16" height="16"></TD><TD>kattungar</td>
    <td><img src="../../bilder/tinycat.gif" width="24" height="23"></TD><TD>avelshane</td>
    <td>&nbsp;<!--<img src="../bilder/email.gif" width="28" height="24">--></TD><TD>&nbsp;<!--= E-post--></td>
    <td><img src="../../bilder/namninfo.gif" width="10" height="11"></TD><TD>stamnamnsinfo</td>
  </tr>
</table>
<TABLE BORDER="0">
  <TR> 
    <td width="14">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <TD WIDTH="156" height="23"><B>Stamnamn / Uppf&ouml;dare</B></TD>
    <td width="32">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="24">&nbsp;</td>
    <TD WIDTH="38">&nbsp;</TD>
    <TD WIDTH="28">&nbsp;</TD>
    <TD WIDTH="250"><B>Ras(er)</B></TD>
  </TR>
<?
include("../../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$today = date("Y-m-d");

$query = 'select s.id, prefix,  s.namn, s.epost, s.medlem snr, s.medlem2,
 s.hemsida, s.hane, s.raser, s.regdat, s.visamedinneh, m.nr, m.fnamn, m.enamn, m.adr, m.postnr, m.ort, m.tfn, m.mobil, m.karta, s.uppd, s.diplom, m.diplom md, m.epost me
 from stamnamn s, medlem m
 where m.aktiv =  1 
 and m.PUL = 1
 and s.medlem = m.nr 
 order by s.namn';
$query2 = "select m.namn, m.adr, m.postnr, m.ort, m.tfn, m.mobil, m.diplom md
 from medlem m where s.medlem2 = m.nr";

$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
# börja med att skapa en rad och 1:a kolumnen
  print ("<tr><td height=23>");
  if ($row[uppd] > $new) { echo ("<img src='../../bilder/ball.gif' width=14 height=14>"); }
  print ("&nbsp;</td>");
  print ("<td><A href=\"");
  print ("\" onmouseover=\"Layer(curLayer,'','hide');");
  print ("Layer('Div$row[id]','','show');\"");
  print ("><img src=\"../../bilder/namninfo.gif\" width=\"15\" height=\"15\" border=0></A>");
# start kod för adressfönster 
  print ("<div id='Div$row[id]' class='win'>");
  print ("<table border=0 cellspacing=0><tr><td height=8 width=8>&nbsp;</td>");
  print ("<td width=334>&nbsp;</td><td width=8>");
  print ("<A HREF=\"javascript:Layer(curLayer,'','hide');\"><img border=0 ");
  print ("src='../../bilder/closeX.gif' width=8 height=8></a></td>");
  print ("</tr><tr><td>&nbsp;</td><td>");
  print ("<b>$row[prefix]$row[namn]</b>");
  if ("$row[regdat]" != "0000-00-00") {
    print (" ( reg : $row[regdat] )");}
  if ("$row[md]"==1) {print ("<br><i><b>Diplomerad Uppf&ouml;dare</b></i>");};
  print ("<br>$row[fnamn] $row[enamn]");
  print ("<br>$row[adr]<br>$row[postnr] $row[ort]<br>$row[tfn]&nbsp;/&nbsp;$row[mobil]<br>");
  print ("<A href=\"mailto:$row[me]?Subject=Min_hemsida:stamnamn\">$row[me]</A><br>");
  print ("<A href=\"$row[hemsida]\" target=\"_blank\">$row[hemsida]</A></td><td>&nbsp;</td></tr>");
  if ("$row[visamedinneh]" == "Y") {
  	$row2=mysql_fetch_array(mysql_db_query($db,
    "select fnamn, enamn, adr, postnr, ort, tfn, mobil, epost, diplom from medlem where nr = $row[medlem2] and aktiv=1", $link));
    print ("<tr><td>&nbsp;</td><td><b>Medinnehavare</b></td><td>&nbsp;</td></tr>");
    print ("<tr><td>&nbsp;</td><td>");
    if ("$row[diplom]"==1) {print ("<br><i><b>Diplomerad Uppf&ouml;dare</b></i><br>");};
    print ("$row2[fnamn] $row2[enamn]<br>"); 
    print ("$row2[adr]<br>$row2[postnr] $row2[ort]<br>$row2[tfn]&nbsp;/&nbsp;$row2[mobil]<br>");
    print ("<A href=\"mailto:$row2[epost]?Subject=Min_hemsida:stamnamn\">$row2[epost]</A></td><td>&nbsp;</td></tr>");
		}
  if ("$row[karta]" != "") {
    print ("<tr><td>&nbsp;</td><td><A href=\"$row[karta]\" target=\"main\">Karta</A></td><td>&nbsp;</td></tr>");
		}
  print ("<tr><td height=8>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>");
  print ("</table></div></TD><TD>");
  if ("$row[hemsida]") { print ("<A href=\"$row[hemsida]\" target='_blank'>$row[prefix]$row[namn]</A>");
	  } else { if ("$row[epost]") {
		  print ("<A href=\"mailto:$row[epost]?Subject=Min_hemsida:stamnamn\">$row[prefix]$row[namn]</A>");
	  } else { print("$row[prefix]$row[namn]"); }
	}
  print ("</td><td>");
# 
  if ($row[diplom]) {
   print ("<img src=\"../../bilder/diplom30.jpg\" width=20 height=30>"); } 
  print ("</td><td>");
# 
  if ($kull = mysql_fetch_array(mysql_db_query($db,
   "select 1 from kull where stamnamn = $row[id]
	  and to_days(bestfore) > to_days(\""."$today"."\")
		", $link))) {
   print ("<a href=\"kullar.php\" onMouseOut=\"MM_swapImgRestore()\"
    onMouseOver=\"MM_swapImage('Image$row[id]','','../../bilder/pawgreen.gif',1)\">
	<img name=\"Image$row[id]\" border=0 src=\"../../bilder/pawgray.gif\"></a>"); } 
  print ("</td><td>");
# 
  if ($hane = mysql_fetch_array(mysql_db_query($db,
   "select 1 from hane where medlem = $row[snr]
	  and to_days(bestfore) > to_days(\""."$today"."\")
		", $link))) {
   print ("<a href=\"hane.php\">
	<img name=\"Image$row[id]\" border=0 src=\"../../bilder/tinycat.gif\"></a>"); } 
#  if ("$row[hane]"){ 
#    print ("<a href=\"avelshanar.htm\">
#    <img src=\"../../bilder/tinycat.gif\" border=0></a>"); }
  print ("</td><TD>");
  print ("</TD><TD>");
  print ("</TD><TD>$row[raser]</TD>
	</TD></tr>");
}
?>        
<tr>
    <TD WIDTH="156" height="23" colspan="7"><A HREF="javascript:Layer(curLayer,'','hide');"><img border="0" src="../../bilder/closeX.gif" width="7" height="10"></a> 
      <font size="1"><b>= St&auml;ng adressf&ouml;nster</b></font></TD>
  </TR>
</TABLE>
<br>
<font size="1">Listan omfattar endast aktiva medlemmar i klubben</font>
<p><table width="522" border="0">
	<tr valign=center> 
    <td><img border="0" src="../../bilder/diplom30.jpg" width="30" height="46"></TD>
    <TD>Diplomerad uppf&ouml;dare</td>
    <td><img border="0" src="../../bilder/pawgray.gif" width="16" height="16"></TD><TD>kattungar</td>
    <td><img src="../../bilder/tinycat.gif" width="24" height="23"></TD><TD>avelshane</td>
    <td>&nbsp;<!--<img src="../bilder/email.gif" width="28" height="24">--></TD><TD>&nbsp;<!--= E-post--></td>
    <td><img src="../../bilder/namninfo.gif" width="10" height="11"></TD><TD>stamnamnsinfo</td>
  </tr>
</table>

</BODY>
</HTML>
