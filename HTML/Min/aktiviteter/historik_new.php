<?php
error_reporting(10);
include("../skript/common.php");
global $wpdb;
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
<?php
$sql = "select a.datum, a.plats, a.namn, a.foto_link, info_link, a.uppd
 from aktivitet a
 where a.datum < \"".$today."\"
 order by a.datum desc";
 
 print($sql);
 
?>
<p><font size="6"><b>Tidigare aktiviteter:</b></font></p>
<table border="0">
  <tr> 
    <td width="15">&nbsp;</td>
    <td width="80"> 
      <h5>Datum</h5>    </td>
    <td width="170"> 
      <h5>Arrangemang</h5>    </td>
    <td width="195"> 
      <h5>Plats</h5>    </td>
    <td colspan="2"> 
      <h5>Mer info</h5>    </td>
  </tr>
<?php
$result = $wpdb->get_results($sql);
if ($result)
  {
  foreach ($result as $post)
    {
    print ("<tr><td>");
	 if ($wpdb->uppd > $new	) { echo ("<img src='/bilder/ball.gif' width=14 height=14>"); } else { echo ("&nbsp;");} 
    print ("</td><td><font size=2>$wpdb->datum</td>
    <td><font size=2>$wpdb->namn</td>
    <td><font size=2>$wpdb->plats</td>
    <td><font size=2>");
    if ($wpdb->foto_link != "") { echo ("<a href=akt.php?a=$wpdb->datum target=main><img src='../bilder/camera.gif' width=25 height=20 border='0'></a>");} else {echo ("&nbsp;");}
    if ($wpdb->info_link != "") { echo ("<a href=$wpdb->info_link target=main><img src='../bilder/i.gif' border='0'></a>");} else {echo ("&nbsp;");}
    print ("</td><td><font size=2>&nbsp;</td>
    </tr>");
  }
else { 
  print("<TR><TD colspan=5>inga aktiviteter hittades</TD></TR>"); }
  }
  
?>
</TABLE>

</BODY>
</HTML>