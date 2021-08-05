<?
#error_reporting(0);
if ( !isset($språkkod)) { $språkkod="s"; }
?>
<html>
<head>
<meta http-equiv=content-type content=text/html;charset=iso-8859-1>
<title>IBBA - Breed Standards </title>
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
<SCRIPT LANGUAGE="JavaScript" SRC="/skript/common.js"></script>
</head>

<body topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>
<?
include("/skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
$today = date("Y-m-d");
if ($row = mysql_fetch_array(mysql_db_query($db,
  "select std from rasstd where id = $in and kod = \"$f\"", $link)))
 {
  if ($kod = "acf") { print ("<H2>Australian Cat Federation (inc)</H2>");}
  print("$row[std]"); 
 } 
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!-- reklam  -->
<script language="JavaScript" src="http://impse.tradedoubler.com/imp/59966/963893" charset="ISO-8859-1"></script>
&nbsp;
<a href="http://tracker.tradedoubler.com/click?p=15237&a=963893&g=186154" target="main">
Gratis visitkort!</a>
&nbsp;	  
<img src="http://imp.double.se/imp.gif?a4842p87g1004" width="0" height="0" alt="">
<a href="http://www.double.se/reports/click.php?a=4842&p=87&g=1004" target="main">
<img src="http://www.tjitjing.com/Banners/GratisListan_Banner_Tavling_88x31.gif" width="88" height="31" border="0" alt=""></a>
			  
</body>

</html>
