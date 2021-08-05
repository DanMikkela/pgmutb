<?
#error_reporting(0);
if ( !isset($språkkod)) { $språkkod="s"; }
?>
<html>
<head>
<meta http-equiv=content-type content=text/html;charset=iso-8859-1>
<title>IBBA - List all breeds </title>
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<meta name=description content="IBBA - The full breed description with pictures of the Abyssinian Cats.">
<meta name=keywords content="Abyssinian, abyssinian cats, cat, cats, kitten, kittens, feline, feral, Abyssinian,
 American Curl, American Shorthair, American Wirehair, Balinese, Bengal, Birman, Bombay, British Shorthair, Burmese,
 Chartreux, Colorpoint Longhair, Colorpoint Shorthair, Cornish Rex, Devon Rex, Egyptian Mau, European Shorthair,
 Exotic Shorthair, Havana Brown, Himalayan, Japanese Bobtail, Javanese, Korat, Maine Coon, Manx, Munchkin,
 Norwegian Forest Cat, Ocicat, Oriental, Persian, Ragamuffin, Ragdoll, Russian Blue, Scottish Fold, Selkirk Rex, Siamese,
 Singapura, Somali, Sphinx, Tonkinese, Turkish Angora, Turkish Van, resources, free email, books, supplies, food, magazines,
 videos, community, bulletin board, links">
<link href=/min.css rel=styleSheet type=text/css>
<SCRIPT LANGUAGE="JavaScript" SRC="../../allaraser/skript/common.js"></script>
</head>

<body topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>
<table border="1">
    <tr> 
      <td width="249"><b><u>Breed Name</u></b></td>
      <td width="43"><b><u>FIFe</u></b></td>
      <td width="43"><b><u>CFA</u></b></td>
      <td width="43"><b><u>GCCF</u></b></td>
      <td width="43"><B><U>CCA</U></B></td>
      <td width="43"><B><U>ACF</U></B></td>
    </tr>
<?
include("../skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$today = date("Y-m-d");

$query = "select r.id, namn, fifekod, cfakod, ticakod, idpkod, ccakod, acfkod,
 bild1, bild2, recip
 from ras r
 order by namn";

$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  print ("<tr><td>");
  if ($bes = mysql_fetch_array(mysql_db_query($db,"select 1 from rasbeskr where id = $row[id]", $link))) {
    print ("<a href=\"cat.php?in=$row[id]\">$row[namn]</a>"); } else {print ("<b>$row[namn]</b>");}
  print ("</TD><TD>");
    if ($std = mysql_fetch_array(mysql_db_query($db,"select 1 from rasstd where id = $row[id] and kod =\"fife\"", $link))) {
    print ("<a href=\"./standards/std.php?id=$row[id]&f=fife\">$row[fifekod]</a>"); } else {print ("<b>$row[fifekod]</b>");}
  print ("&nbsp;</TD><TD>");
  if ($std = mysql_fetch_array(mysql_db_query($db,"select 1 from rasstd where id = $row[id] and kod =\"cfa\"", $link))) {
    print ("<a href=\"./standards/std.php?id=$row[id]&f=cfa\">$row[cfakod]</a>"); } else {print ("<b>$row[cfakod]</b>");}
  print ("&nbsp;</TD><TD>");
  if ($std = mysql_fetch_array(mysql_db_query($db,"select 1 from rasstd where id = $row[id] and kod =\"gccf\"", $link))) {
    print ("<a href=\"./standards/std.php?id=$row[id]&f=gccf\">$row[gccfkod]</a>"); } else {print ("<b>$row[gccfkod]</b>");}
  print ("&nbsp;</TD><TD>");
  if ($std = mysql_fetch_array(mysql_db_query($db,"select 1 from rasstd where id = $row[id] and kod =\"cca\"", $link))) {
    print ("<a href=\"./standards/std.php?id=$row[id]&f=cca\">$row[ccakod]</a>"); } else {print ("<b>$row[ccakod]</b>");}
  print ("&nbsp;</TD><TD>");
  if ($std = mysql_fetch_array(mysql_db_query($db,"select 1 from rasstd where id = $row[id] and kod =\"acf\"", $link))) {
    print ("<a href=\"./standards/std.php?in=$row[id]&f=acf\">$row[acfkod]</a>"); } else {print ("<b>$row[acfkod]</b>");}
  print ("&nbsp;</TD>");
  print ("</TR>");
}
?>        
</table>
<!-- reklam  -->
<P>
  <script language="JavaScript" src="http://impse.tradedoubler.com/imp/59966/963893" charset="ISO-8859-1"></script>
  &nbsp; <a href="http://tracker.tradedoubler.com/click?p=15237&a=963893&g=186154" target="main"> 
  Gratis visitkort!</a> &nbsp; <img src="http://imp.double.se/imp.gif?a4842p87g1004" width="0" height="0" alt=""> 
  <a href="http://www.double.se/reports/click.php?a=4842&p=87&g=1004" target="main"> 
  <img src="http://www.tjitjing.com/Banners/GratisListan_Banner_Tavling_88x31.gif" width="88" height="31" border="0" alt=""></a> 
</P>
<script language="javascript">
var uri = 'http://impse.tradedoubler.com/imp/js/443837/963893?' + new String (Math.random()).substring (2, 11);
document.write('<sc'+'ript language="JavaScript" src="'+uri+'" charset="ISO-8859-1"></sc'+'ript>');
</script>
</body>

</html>
