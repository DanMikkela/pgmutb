<?
# stäng av felmeddelanden
# error_reporting(0);
include("../common.php");
$link = mysql_connect("localhost",$db,$dbpw);
?>
<html>
<head>
<title>Min Kattklubb - Rapportera in kull</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?
$medlem = 101;
#function baseform() {
# hämta stamnamn
  $query = "select id, medlem from stamnamn
		          where medlem = $medlem or medlem2=$medlem";
  $result = mysql_db_query($db, $query, $link);
  while ($row = mysql_fetch_array($result)) {
		  $stamnamn="$row[id]";
    if ("$row[medlem]" == "$medlem") { $hmedl = "H"; }
			 else { $hmedl = "M"; }
		}
# visa befintliga kullar
  $query = "select neddatum, levdatum, far, mor, k.ras, u.sex, u.ems,
		          u.status, u.nr, k.id, h_med, k.status kstatus
            from kull k, kattunge u
            where k.id = u.id
            and k.stamnamn = $stamnamn";
#            and to_days(k.bestfore) > to_days(\""."$today".
# 											"\") order by levdatum, k.id, u.nr";
  $result = mysql_db_query($db, $query, $link);
  $x='';
  while ($row = mysql_fetch_array($result)) {
 	  if ($x != "$row[id]") {
 	    print ("<b>F&ouml;dd : $row[neddatum], $row[ras]</b><br>
	             tidigast leveransklara: <b>$row[levdatum]</b><br>
	             Far : $row[far]<br>Mor : $row[mor]<br>");
				}
	 }
  print ("$row[sex] $row[ems] <font color=red>$row[status]</font><br>");
	 $x = "$row[id]";
#}		   
#    print ("<tr><td width=50>$row[neddatum]</td><td width=50>$row[levdatum]
#            </td><td width=50>$row[ras]</td><td>$row[kstatus]</td></tr>");
#    print ("<tr><td>$row[far]</td><td>$row[mor]
#            </td><td>$row[ras]</td><td>$row[kstatus]</td></tr>");
#    print ("<tr><td>$row[neddatum]</td><td>$row[levdatum]
#            </td><td>$row[ras]</td><td>$row[kstatus]</td></tr>");
/*
if ($steg) {
	switch ($steg) {
		case "1" :
#  1 betyder att medlemmen INTE har stamnamn, inte heller "tillfälligt"			
#  dvs SKAPA stamnamn
			skapastamnamn($medlem);
#inget	break eftersom vi "bara" fixat ett stamnamn
		case "2" :
#  2 Uppdatera befintlig kull (ej kattungar)
			print ("");
			break;
		case "3" :
#  3 lägg upp ny 
			kasta eller lagra
			break;
		case default :
		
	}
else {
# lägg ut basformuläret baserat på medlemsnr  
# visa stamnamn och upplagda kullar för medlemmen
		 baseform(); }
*/
?>

</body>
</html>
